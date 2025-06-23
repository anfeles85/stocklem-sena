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
        session()->flash('message','Registro creado exitosamente');
        return redirect()->route('presentation.index');
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
             session()->flash('message','Registro actualizado exitosamente');
        }
        else
        {
            session()->flash('warning','No se encuentra el registro solicitado');
        }
        return redirect()->route('presentation.index');
    
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $presentation = Presentation::find($id);

        if($presentation){
            $presentation->delete();
             session()->flash('message','Registro eliminado exitosamente');
        }
        else{
             session()->flash('warning','No se encuentra el registro solicitado');
        }
           return redirect()->route('presentation.index');
    }
}
