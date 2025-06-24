<?php

namespace App\Http\Controllers;

use App\Models\Presentation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PresentationController extends Controller
{

    private $rules = [
        'description' => 'required|string|min:3|max:100'
    ];

    private $traductionAttributes = [
        'description' => 'descripcion'
    ];
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         $presentations = Presentation::all();
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
        return redirect()->route('presentation.index')->with('success', 'Se ha creado exitosamente la presentación: ');
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
            return redirect()->route('presentation.index')->with('success', 'Se ha actualizado exitosamente la presentación');
        }
        else
        {
            return redirect()->with('error', 'No se encontró la presentación');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $presentation = Presentation::find($id);

        if($presentation){
            $presentation->delete();
            return redirect()->route('presentation.index')->with('success','Registro eliminado exitosamente');
        }
        else{
            return redirect()->route('presentation.index')->with('error','No se encuentra el registro solicitado');
        }
    }
}
