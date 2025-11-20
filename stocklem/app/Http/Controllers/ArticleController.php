<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use App\Models\Presentation;
use App\Models\Supplier;
use App\Models\Unit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

use App\Imports\ArticlesImport;
use Maatwebsite\Excel\Facades\Excel;

class ArticleController extends Controller
{
    private $rules = [
        'name' => 'required|string|min:3|max:100',
        'quantity' => 'required|integer|min:0',
        'min_quantity' => 'required|integer|min:0',
        'photo' => 'nullable|image|max:10240',
        'technical_sheet' => 'nullable|mimes:pdf|max:5120',
        'status' => 'required|in:ACTIVO,INACTIVO',
        'presentation_id' => 'nullable|exists:presentation,id',
        'category_id' => 'nullable|exists:category,id',
        'supplier_id' => 'nullable|exists:supplier,id',
        'unit_id' => 'nullable|exists:unit,id'
    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'quantity' => 'cantidad',
        'min_quantity' => 'cantidad mínima',
        'photo' => 'foto',
        'technical_sheet' => 'ficha técnica',
        'status' => 'estado',
        'presentation_id' => 'presentación',
        'category_id' => 'categoría',
        'supplier_id' => 'proveedor',
        'unit_id' => 'unidad'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::orderByRaw("FIELD(status, 'ACTIVO', 'INACTIVO')")->get();
        $lowStockArticles = $articles->filter(fn($article) => $article->isBelowMinimum());

        return view('article.index', compact('articles', 'lowStockArticles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $presentations = Presentation::where('status', 'ACTIVO')->get();
        $categories = Category::where('status', 'ACTIVO')->get();
        $suppliers = Supplier::where('status', 'ACTIVO')->get();
        $units = Unit::where('status', 'ACTIVO')->get();

        return view('article.create', compact('presentations', 'categories', 'suppliers', 'units'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $rules = $this->rules;
        $rules['name'] .= '|unique:article,name';

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('article.create')->withInput()->withErrors($validator);
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

        Article::create($data);
        return redirect()->route('article.index')->with('success', 'Artículo creado exitosamente');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $article = Article::find($id);
        if ($article) {
            $presentations = Presentation::all();
            $categories = Category::all();
            $suppliers = Supplier::all();
            $units = Unit::all();

            return view('article.edit', compact(
                'article',
                'presentations',
                'categories',
                'suppliers',
                'units'
            ));
        } else {
            return redirect()->route('article.index')->with('error', 'No se encontró el artículo.');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $article = Article::find($id);
        
        if (!$article) {
            return redirect()->route('article.index')->with('error', 'No se encontró el artículo para actualizar.');
        }

        $rules = $this->rules;
        $rules['name'] .= '|unique:article,name,' . $id;
        
        if (!$request->has('min_quantity')) {
            unset($rules['min_quantity']);
        }

        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($this->traductionAttributes);

        if ($validator->fails()) {
            return redirect()->route('article.edit', $id)->withInput()->withErrors($validator);
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

        $article->update($data);
        return redirect()->route('article.index')->with('success', '¡Artículo actualizado correctamente!');
    }

    /**
     * Alternar estado del artículo (ACTIVO <-> INACTIVO).
     */
    public function toggleStatus(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            $newStatus = $article->status == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
            $article->update(['status' => $newStatus]);

            $message = $newStatus == 'ACTIVO' ? 'Artículo activado exitosamente' : 'Artículo inactivado exitosamente';
            return redirect()->route('article.index')->with('success', $message);
        } else {
            return redirect()->route('article.index')->with('error', 'No se encontró el artículo');
        }
    }

    /**
     * Eliminar artículo permanentemente.
     */
    public function forceDelete(string $id)
    {
        $article = Article::find($id);

        if ($article) {
            $article->delete();
            return redirect()->route('article.index')->with('success', 'Artículo eliminado permanentemente');
        } else {
            return redirect()->route('article.index')->with('error', 'No se encontró el artículo');
        }
    }

    /**
     * Muestra la vista del formulario de importación.
     */
    public function showImportForm()
    {
        return view('article.import');
    }

    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:xls,xlsx'
        ], [
            'file.required' => 'Debes seleccionar un archivo.',
            'file.mimes' => 'El archivo debe ser de tipo .xls o .xlsx'
        ]);

        try {
            $import = new ArticlesImport;
            Excel::import($import, $request->file('file'));

            $groupedErrors = $import->getGroupedErrors();
            $skipped = $import->getSkipped();
            $imported = $import->getImported();

            if (!empty($groupedErrors)) {
                return redirect()->route('article.import.form')
                    ->with('grouped_errors', $groupedErrors);
            }

            $message = "¡Importación completada! Artículos importados: {$imported}";

            if (count($skipped) > 0) {
                $message .= " | Omitidos (ya existen): " . count($skipped);
            }

            return redirect()->route('article.import.form')
                ->with('loaded', $message)
                ->with('skipped', $skipped);
        } catch (\Exception $e) {
            return redirect()->route('article.import.form')
                ->with('error', 'Error al procesar el archivo: ' . $e->getMessage());
        }
    }
}