<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    private $rules = [
        'name' => 'required|string|min:3|max:100',
        'phone' => 'required|string|min:3|max:20'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'phone' => 'teléfono'
    ];
    public function index()
    {
        $suppliers = Supplier::all();
        return view('supplier.index', compact('suppliers'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('supplier.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('supplier.create')->withInput()->withErrors($errors);
        }
        $supplier = Supplier::create($request->all());
        session()->flash('message', 'El Proveedor se creo correctamente');
        return redirect()->route('supplier.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $supplier = Supplier::find($id);
        if($supplier){
            return view('supplier.edit', compact('supplier'));
        }
        else{
            session()->flash('error', 'No se encontró el proveedor');
            return redirect()->route('supplier.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('supplier.edit', $id)->withInput()->withErrors($errors);
        }
        $supplier = Supplier::find($id);
        if($supplier){
            $supplier->update($request->all());
            session()->flash('success', 'Se actualizo correctamente');
        }
        else{
            session()->flash('error', 'Ha ocurrido un problema al actualizar el proveedor');
        }
        return redirect()->route('supplier.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $supplier = Supplier::find($id);
        if($supplier){
            $supplier->delete();
            session()->flash('success', 'El proveedor se elimino correctamente');
        }
        else{
            session()->flash('error', 'Ha ocurrido un problema al eliminar el proveedor');
        }
        return redirect()->route('supplier.index');
    }
}
