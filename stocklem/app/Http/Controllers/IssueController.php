<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Issue;
use App\Models\Person;
use Illuminate\Database\QueryException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IssueController extends Controller
{
    private $rules = [
        'sena_code' => 'max:70',
        'date_issue' => 'required|date|date_format:Y-m-d',
        'quantity' => 'required|integer|min:1|max:9999999999',
        'observations' => 'string|min:3|max:100',
        'article_id' => 'required|numeric|min:1|max:99999999999999999999',
        'person_id' => 'required|numeric|min:1|max:99999999999999999999'
    ];

    private $traductionAttributes = [
        'sena_code' => 'codigo sena',
        'date_issue' => 'fecha salida',
        'quantity' => 'cantidad',
        'observations' => 'observaciones',
        'article_id' => 'artículo',
        'person_id' => 'persona'
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
        $articles = Article::all();
        $persons = Person::all();
        $issue = Issue::all();

        return view('issue.create', compact('articles', 'persons', 'issue'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('issue.create')->withInput()->withErrors($errors);
        }
        
        try {
            Issue::create($request->all());
            return redirect()->route('issue.index')->with('success', 'Salida creada exitosamente');
        } catch (QueryException $e) {
            if ($e->getCode() == '45000') {
                return redirect()->route('issue.create')->withInput()->with('error', 'Stock insuficiente: No hay suficientes unidades disponibles para realizar esta salida.');
            }
            throw $e;
        }
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
        if ($issue) {
            $articles = Article::all();
            $persons = Person::all();

            return view('issue.edit', compact('issue', 'articles', 'persons'));
        } else {
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
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('issue.edit', $id)->withInput()->withErrors($errors);
        }
        $issue = Issue::find($id);
        if ($issue) {
            try {
                $issue->update($request->all());
                return redirect()->route('issue.index')->with('success', '¡Salida actualizada correctamente!');
            } catch (\Illuminate\Database\QueryException $e) {
                if ($e->getCode() == '45000') {
                    return redirect()->route('issue.edit', $id)->withInput()->with('error', 'Stock insuficiente: Al editar esta salida, el stock quedaría en negativo.');
                }
                throw $e;
            }
        }
        return redirect()->route('issue.index')->with('error', 'Ha ocurrido un problema al actualizar la salida.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $issue = Issue::find($id);

        if ($issue) {
            $issue->delete();
            return redirect()->route('issue.index')->with('success', '¡Salida eliminada correctamente!');
        } else {
            return redirect()->route('issue.index')->with('error', 'Ha ocurrido un problema al eliminar la salida.');
        }
    }
}
