<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class CategoryController extends Controller
{
    
    private $rules = [
        'name' => 'required|string|min:3|max:80',
        'description' => 'required|string|min:31|max:100'

    ];

    private $traductionAttributes = [
        'name' => 'nombre',
        'description' => 'descripción'
    ];

   public function index()
    {
        $categories = Category::all();
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
        return redirect()->route('category.index')->with('success', 'La categoria se creo correctamente');
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
            return redirect()->route('category.index')->with('error', 'No se encontró el registro');
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
            return redirect()->route('category.update', $id)->withInput()->withErrors($errors);
        }

        $category = Category::find($id);
        if($category){
            $category->update($request->all());
            return redirect()->with('success', 'La categoria se actualizo correctamente');
        }
        else{
            return redirect()->with('error', 'Ha ocurrido un problema al actualizar');
        }
        return redirect()->route('category.index')->with('error', 'Ha ocurrido un problema al actualizar la categoria.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $category = Category::find($id);
        if($category){
            $category->delete();
            return redirect()->with('auccess', 'Eliminado Correctamente');
        }
        else{
            return redirect()->with('error', 'Ha ocurrido un problema al eliminar la categoria');
        }
        return redirect()->route('category.index');
    }
}
