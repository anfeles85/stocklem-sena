<?php

namespace App\Imports;

use App\Models\Article;
use App\Models\Category;
use App\Models\Presentation;
use App\Models\Supplier;
use App\Models\Unit;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;

class ArticlesImport implements
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure
{
    private $errors = [];
    private $skipped = [];
    private $imported = 0;

    public function model(array $row)
    {
        // Verificar si el artículo ya existe
        $exists = Article::where('name', $row['nombre'])->exists();
        
        if ($exists) {
            $this->skipped[] = $row['nombre'];
            return null;
        }

        $category = Category::firstOrCreate(
            ['name' => $row['categoria']],
            ['description' => 'Creado automáticamente desde importación']
        );

        $supplier = Supplier::firstOrCreate(
            ['name' => $row['proveedor']],
            ['phone' => '']
        );

        $presentation = Presentation::firstOrCreate(
            ['description' => $row['presentacion']]
        );

        $unit = Unit::firstOrCreate(
            ['name' => $row['unidad']]
        );

        $this->imported++;

        return new Article([
            'name'            => $row['nombre'],
            'quantity'        => $row['cantidad'],
            'min_quantity'    => $row['cantidad_minima'],
            'category_id'     => $category->id,
            'supplier_id'     => $supplier->id,
            'presentation_id' => $presentation->id,
            'unit_id'         => $unit->id,
        ]);
    }

    public function rules(): array
    {
        return [
            'nombre'          => 'required|string|max:255',
            'cantidad'        => 'required|numeric|min:1',
            'cantidad_minima' => 'required|numeric|min:1',
            'categoria'       => 'required|string|max:255',
            'proveedor'       => 'required|string|max:255',
            'presentacion'    => 'required|string|max:255',
            'unidad'          => 'required|string|max:255',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'nombre.required'          => 'El nombre es obligatorio.',
            'cantidad.required'        => 'La cantidad es obligatoria.',
            'cantidad.min'             => 'La cantidad debe ser mayor a 0.',
            'cantidad_minima.required' => 'La cantidad mínima es obligatoria.',
            'cantidad_minima.min'      => 'La cantidad mínima debe ser mayor a 0.',
            'categoria.required'       => 'La categoría es obligatoria.',
            'proveedor.required'       => 'El proveedor es obligatorio.',
            'presentacion.required'    => 'La presentación es obligatoria.',
            'unidad.required'          => 'La unidad es obligatoria.',
        ];
    }

    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            $row = $failure->row();
            $attribute = $failure->attribute();
            $error = $failure->errors()[0];

            if (!isset($this->errors[$attribute])) {
                $this->errors[$attribute] = [
                    'rows' => [],
                    'message' => $error
                ];
            }
            $this->errors[$attribute]['rows'][] = $row;
        }
    }

    public function getGroupedErrors()
    {
        return $this->errors;
    }

    public function getSkipped()
    {
        return $this->skipped;
    }

    public function getImported()
    {
        return $this->imported;
    }
}