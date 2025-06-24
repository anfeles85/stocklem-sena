<?php

namespace App\Http\Controllers;

use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UnitController extends Controller
{

    private $rules = [
        'name' => 'required|string|min:3|max:100'
    ];

    private $traductionAttributes = [
        'name' => 'nombre'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $units = Unit::all();
        return view('unit.index',compact('units'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('unit.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('unit.create')->withInput()->withErrors($errors);
        }
        $unit = Unit::create($request->all());
        return redirect()->route('unit.index')->with('success','Registro creado exitosamente');
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
        $unit = Unit::find($id);

        if($unit){
            return view('unit.edit',compact('unit'));
        }
        else{
            return redirect()->with('error', 'No se encontró la unidad');
            return redirect()->route('unit.index');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(),$this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('unit.edit',$id)->withInput()->withErrors($errors);
        }
        $unit = Unit::find($id);

        if($unit){
            $unit->update($request->all());
            return redirect()->with('success','Registro actualizado exitosamente');
        }
        else
        {
            return redirect()->route('unit.index')->with('error','No se encuentra el registro solicitado');
        }
        return redirect()->route('unit.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $unit = Unit::find($id);

        if($unit){
            $unit->delete();
            return redirect()->with('success','Registro eliminado exitosamente');
        }
        else{
            return redirect()->route('unit.index')->with('error','No se encuentra el registro solicitado');
        }
    }
}
