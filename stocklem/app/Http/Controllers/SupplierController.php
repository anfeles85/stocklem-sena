<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SupplierController extends Controller
{
    private $rules = [
        'name' => 'required|string|min:3|max:100',
        'phone' => 'required|string|min:3|max:20',
        'status' => 'required|in:ACTIVO,INACTIVO'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'phone' => 'teléfono',
        'status' => 'estado'
    ];
    public function index()
    {
        $suppliers = Supplier::orderByRaw("FIELD(status, 'ACTIVO', 'INACTIVO')")->get();
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
        return redirect()->route('supplier.index')->with('success', '¡Proveedor creado exitosamente!');
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
            return redirect()->route('supplier.index')->with('Error', 'No se encontró el proveedor');
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
            return redirect()->route('supplier.index')->with('success', '¡Proveedor actualizado correctamente!');
        }
        return redirect()->route('supplier.index')->with('error', 'Ha ocurrido un problema al actualizar el proveedor.');

    }

    /**
     * Alternar estado del proveedor (ACTIVO <-> INACTIVO).
     */
    public function toggleStatus(string $id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $newStatus = $supplier->status == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
            $supplier->update(['status' => $newStatus]);
            
            $message = $newStatus == 'ACTIVO' ? 'Proveedor activado exitosamente' : 'Proveedor inactivado exitosamente';
            return redirect()->route('supplier.index')->with('success', $message);
        } else {
            return redirect()->route('supplier.index')->with('error', 'No se encontró el proveedor');
        }
    }

    /**
     * Eliminar proveedor permanentemente.
     */
    public function forceDelete(string $id)
    {
        $supplier = Supplier::find($id);

        if ($supplier) {
            $supplier->delete();
            return redirect()->route('supplier.index')->with('success', 'Proveedor eliminado permanentemente');
        } else {
            return redirect()->route('supplier.index')->with('error', 'No se encontró la proveedor');
        }
    }
}
