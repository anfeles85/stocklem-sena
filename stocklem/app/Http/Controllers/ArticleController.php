<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Issue;
use App\Models\Person;
use App\Models\Presentation;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{

    private $rules = [
        'name' => 'required|string|min:3|max:100',
        'quantity' => 'required|numeric|min:1|max:9999999999',
        'photo' => 'max:255',
        'technical_sheet' => 'mimes:pdf|max:5120',
        'presentation_id' => 'max:9999999999999999999',
        'category_id' => 'max:9999999999999999999',
        'supplier_id' => 'max:9999999999999999999'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'quantity' => 'cantidad',
        'min_quantity' => 'cantidad minima',
        'photo' => 'foto',
        'technical_sheet' => 'ficha técnica',
        'presentation_id' => 'presentación',
        'category_id' => 'categoría',
        'supplier_id' => 'proveedor'

    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::all();
        $lowStockArticles = $articles->filter(fn($article) => $article->isBelowMinimum());

        return view('article.index', compact('articles','lowStockArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $presentations = Presentation::all()->map(function ($item) {
            return ['label' => $item->description, 'value' => $item->id];
        });

        $categories = Category::all()->map(function ($item) {
            return ['label' => $item->name, 'value' => $item->id];
        });

        $suppliers = Supplier::all()->map(function ($item) {
            return ['label' => $item->name, 'value' => $item->id];
        });

        $units = Unit::all()->map(function ($item) {
            return ['label' => $item->name, 'value' => $item->id];
        });

        return view('article.create', compact('presentations', 'categories', 'suppliers', 'units'));
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
            return redirect()->route('article.create')->withInput()->withErrors($errors);
        }
        $data = $request->all();

    if ($request->hasFile('technical_sheet')) {
        $path = $request->file('technical_sheet')->store('technical_sheets', 'public');
        $data['technical_sheet'] = Storage::url($path);
    }
    if ($request->hasFile('photo')) {
        $path = $request->file('photo')->store('photos', 'public');
        $data['photo'] = Storage::url($path);
    }
        $article = Article::create($data);
        return redirect()->route('article.index')->with('success', 'Artículo creado exitosamente');
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
        $article = Article::find($id);
        if ($article) {
            $presentations = Presentation::all()->map(fn($item) => ['label' => $item->description, 'value' => $item->id]);
            $categories = Category::all()->map(fn($item) => ['label' => $item->name, 'value' => $item->id]);
            $suppliers = Supplier::all()->map(fn($item) => ['label' => $item->name, 'value' => $item->id]);
            $units = Unit::all()->map(fn($item) => ['label' => $item->name, 'value' => $item->id]);

            return view('article.edit', compact(
                'article',
                'presentations',
                'categories',
                'suppliers',
                'units'
            ));
        } else {
            session()->flash('error', 'No se encontró el artículo.');
            return redirect()->route('article.index');
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
            return redirect()->route('article.edit', $id)->withInput()->withErrors($errors);
        }
        $article = Article::find($id);
        if ($article) {
            $data = $request->all();

            if($request->hasFile('technical_sheet')) {
                $path = $request->file('technical_sheet')->store('technical_sheets', 'public');
                $data['technical_sheet'] = Storage::url($path);
            }
            if($request->hasFile('photo')) {
                $path = $request->file('photo')->store('photos', 'public');
                $data['photo'] = Storage::url($path);
            }
            $article->update($data);
            return redirect()->route('article.index')->with('success', '¡Artículo actualizado correctamente!');
        }
        return redirect()->route('article.index')->with('error', 'Ha ocurrido un problema al actualizar el artículo.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $article = Article::find($id);
        if ($article) {
            $article->delete();
            return redirect()->route('article.index')->with('success', '¡Artículo eliminado correctamente!');
        } else {
            return redirect()->route('article.index')->with('error', 'Ha ocurrido un problema al eliminar el artículo.');
        }
    }
}
