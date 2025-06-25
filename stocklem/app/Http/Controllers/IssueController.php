<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Person;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller
{
    private $rules = [
        'date_issue' => 'required|date|date_format:Y-m-d',
        'quantity' => 'required|numeric|min:1|max:9999999999',
        'observations' => 'string|min:3|max:100',
        'article_id' => 'required|numeric|min:1|max:99999999999999999999',
        'person_id' => 'required|numeric|min:1|max:99999999999999999999',
        'unit_id' => 'required|numeric|min:1|max:99999999999999999999'
    ];

    private $traductionAttributes = [
        'date_issue' => 'fecha salida',
        'quantity' => 'cantidad',
        'observations' => 'observaciones',
        'article_id' =>  'artículo',
        'person_id' => 'persona',
        'unit_id' => 'unidad'
    ];
    public function index()
    {
        $issues = Issue::all();
        return view('issue.index', compact('issues'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('issue.create');
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
             return redirect()->route('issue.create')->withInput()->withErrors($errors);
        }
        $issue = Issue::create($request->all());
        return redirect()->route('issue.index')->with('success', 'Salida creada exitosamente');
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
        $issue = Issue::find($id);
        if($issue){
            $articles = Article::all();
            $persons = Person::all();
            $units = Unit::all();
            return view('issue.edit', compact('issue', 'articles', 'persons', 'units'));
        }
        else{
            session()->flash('error', 'No se encontró la salida.');
            return redirect()->route('issue.index');
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
            return redirect()->route('issue.edit', $id)->withInput()->withErrors($errors);
        }
        $issue= Issue::find($id);
        if($issue){
        $issue->update($request->all());
            return redirect()->route('issue.index')->with('success', '¡Salida actualizada correctamente!');
        }
        return redirect()->route('issue.index')->with('error', 'Ha ocurrido un problema al actualizar la salida.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::find($id);
        if($issue)
        {
            $issue->delete();
            return redirect()->route('issue.index')->with('success', '¡Salida eliminada correctamente!');
        }
        else
        {
            return redirect()->route('issue.index')->with('error', 'Ha ocurrido un problema al eliminar la Salida.');
        }
    }
}
