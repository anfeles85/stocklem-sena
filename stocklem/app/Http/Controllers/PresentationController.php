<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresentationController extends Controller
{

    private $rules = [
        'description' => 'required|string|min:3|max:100',
        'status' => 'required|in:ACTIVO,INACTIVO'
    ];

    private $traductionAttributes = [
        'description' => 'descripcion',
        'status' => 'estado'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $presentations = Presentation::orderByRaw("FIELD(status, 'ACTIVO', 'INACTIVO')")->get();
        return view('presentation.index',compact('presentations'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('presentation.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),$this->rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if($validator->fails()){
            $errors = $validator->errors();
            return redirect()->route('presentation.create')->withInput()->withErrors($errors);
        }
        $presentation = Presentation::create($request->all());
        return redirect()->route('presentation.index')->with('success', '¡Presentación creada exitosamente!');
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
        $presentation = Presentation::find($id);

        if($presentation){
            return view('presentation.edit',compact('presentation'));
        }
        else{
            return redirect()->route('presentation.index')->with('error', 'No se encontró la presentación');
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
            return redirect()->route('presentation.edit',$id)->withInput()->withErrors($errors);
        }
        $presentation = Presentation::find($id);
        if($presentation){
            $presentation->update($request->all());
            return redirect()->route('presentation.index')->with('success', '¡Presentación actualizada correctamente!');
        }
        return redirect()->route('presentation.index')->with('error', 'Ha ocurrido un problema al actualizar la presentación');
    }

    /**
     * Alternar estado de la presentación (ACTIVO <-> INACTIVO).
     */
    public function toggleStatus(string $id)
    {
        $presentation = Presentation::find($id);

        if ($presentation) {
            $newStatus = $presentation->status == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
            $presentation->update(['status' => $newStatus]);
            
            $message = $newStatus == 'ACTIVO' ? 'Presentación activada exitosamente' : 'Presentación inactivada exitosamente';
            return redirect()->route('presentation.index')->with('success', $message);
        } else {
            return redirect()->route('presentation.index')->with('error', 'No se encontró la presentación');
        }
    }

    /**
     * Eliminar presentación permanentemente.
     */
    public function forceDelete(string $id)
    {
        $presentation = Presentation::find($id);

        if ($presentation) {
            $presentation->delete();
            return redirect()->route('presentation.index')->with('success', 'Presentación eliminado permanentemente');
        } else {
            return redirect()->route('presentation.index')->with('error', 'No se encontró la presentación');
        }
    }
}
