<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    
    private $rules = [
        'name' => 'required|string|min:3|max:80',
        'description' => 'required|string|min:31|max:100',
        'status' => 'required|in:ACTIVO,INACTIVO'

    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'description' => 'descripción',
        'status' => 'estado'
    ];

   public function index()
    {
        $categories = Category::orderByRaw("FIELD(status, 'ACTIVO', 'INACTIVO')")->get();
        return view('category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames(($this->traductionAttributes));
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('category.create')->withInput()->withErrors($errors);
        }
        $category = Category::create($request->all());
        return redirect()->route('category.index')->with('success', '¡Categoria creada correctamente!');
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
        $category = Category::find($id);
        if($category){
            return view('category.edit', compact('category'));
        }
        else {
            return redirect()->route('category.index')->with('error', 'No se encontró la categoria');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames(($this->traductionAttributes));
        if($validator->fails())
        {
            $errors = $validator->errors();
            return redirect()->route('category.edit', $id)->withInput()->withErrors($errors);
        }
        $category = Category::find($id);
        if($category){
            $category->update($request->all());
            return redirect()->route('category.index')->with('success', 'La categoría se actualizó correctamente');
        }
        else
        {
            return redirect()->route('category.index')->with('error', 'Ha ocurrido un problema al actualizar');
        }
    }

    /**
     * Alternar estado de la categoría (ACTIVO <-> INACTIVO).
     */
    public function toggleStatus(string $id)
    {
        $category = Category::find($id);

        if ($category) {
            $newStatus = $category->status == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
            $category->update(['status' => $newStatus]);
            
            $message = $newStatus == 'ACTIVO' ? 'Categoría activada exitosamente' : 'Categoría inactivada exitosamente';
            return redirect()->route('category.index')->with('success', $message);
        } else {
            return redirect()->route('category.index')->with('error', 'No se encontró la categoría');
        }
    }

    /**
     * Eliminar categoría permanentemente.
     */
    public function forceDelete(string $id)
    {
        $category = Category::find($id);

        if ($category) {
            $category->delete();
            return redirect()->route('category.index')->with('success', 'Categoría eliminado permanentemente');
        } else {
            return redirect()->route('category.index')->with('error', 'No se encontró la categoría');
        }
    }
}
