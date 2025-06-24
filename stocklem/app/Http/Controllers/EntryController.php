<?php

namespace App\Http\Controllers;


use App\Models\Entry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class EntryController extends Controller
{


    private $rules = [
        'sena_code' => 'string|max:70',
        'date_entry' => 'required |date|date_format:Y-m-d',
        'expiration_date' => 'date|date_format:Y-m-d',
        'quantity' => 'required|numeric|min:1|max:9999999999',
        'observations' => 'string|min:3|max:100',
        'article_id' => 'required|numeric|min:1|max:99999999999999999999'
    ];

    private $traductionAttributes = [
        'sena_code' => 'codigo sena',
        'date_entry' => 'fecha entrada',
        'expiration_date' => 'fecha expiracion',
        'quantity' => 'cantidad',
        'observations' => 'observaciones',
        'article_id' => 'articulo'
    ];



    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $entries = Entry::all();
         return view('entry.index', compact('entries'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
         return view('entry.create');
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
            return redirect()->route('entry.create')->withInput()->withErrors($errors);
        }
        $entry = Entry::create($request->all());
        return redirect()->route('entry.index')->with('success', 'Entrada creada exitosamente');
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
        $entry = Entry::find($id);
        if($entry)
        {
            return view('entry.edit', compact('entry'));
        }
        else
        {
            return redirect()->route('entry.index')->with('Error', 'No se encontró la entrada');
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
            return redirect()->route('entry.edit', $id)->withInput()->withErrors($errors);
        }
        $entry= Entry::find($id);
        if($entry){
        $entry->update($request->all());
            return redirect()->route('entry.index')->with('success', '¡Entrada actualizada correctamente!');
        }
        return redirect()->route('entry.index')->with('error', 'Ha ocurrido un problema al actualizar la entrada.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $entry = Entry::find($id);
        if($entry)
        {
            $entry->delete();
            return redirect()->route('entry.index')->with('success', '¡Entrada eliminada correctamente!');
        }
        else
        {
            return redirect()->route('entry.index')->with('error', 'Ha ocurrido un problema al eliminar la entrada.');
        }
    }
}
