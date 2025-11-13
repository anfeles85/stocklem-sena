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
        return redirect()->route('unit.index')->with('success','¡Unidad creada exitosamente!');
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
            return redirect()->route('unit.index')->with('error', 'No se encontró la unidad');
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
        if($unit)
        {
            $unit->update($request->all());
            return redirect()->route('unit.index')->with('success','¡Unidad actualizada correctamente!');
        }
        else
        {
            return redirect()->route('unit.index')->with('error','Ha ocurrido un problema al actualizar la unidad');
        }   
    }

    /**
     * Alternar estado de la unidad (ACTIVO <-> INACTIVO).
     */
    public function toggleStatus(string $id)
    {
        $unit = Unit::find($id);

        if ($unit) {
            $newStatus = $unit->status == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
            $unit->update(['status' => $newStatus]);
            
            $message = $newStatus == 'ACTIVO' ? 'Unidad activada exitosamente' : 'Unidad inactivada exitosamente';
            return redirect()->route('unit.index')->with('success', $message);
        } else {
            return redirect()->route('unit.index')->with('error', 'No se encontró la unidad');
        }
    }

    /**
     * Eliminar unidad permanentemente.
     */
    public function forceDelete(string $id)
    {
        $unit = Unit::find($id);

        if ($unit) {
            $unit->delete();
            return redirect()->route('unit.index')->with('success', 'Unidad eliminada permanentemente');
        } else {
            return redirect()->route('unit.index')->with('error', 'No se encontró la unidad');
        }
    }
}
