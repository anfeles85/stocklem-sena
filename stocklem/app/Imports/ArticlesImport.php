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

    /**
     * @param array $row
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        // Crear o buscar las relaciones
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

    /**
     * Reglas de validación para cada fila del Excel
     * @return array
     */
    public function rules(): array
    {
        return [
            'nombre'          => 'required|string|max:255|unique:article,name',
            'cantidad'        => 'required|numeric|min:1',
            'cantidad_minima' => 'required|numeric|min:1',
            'categoria'       => 'required|string|max:255',
            'proveedor'       => 'required|string|max:255',
            'presentacion'    => 'required|string|max:255',
            'unidad'          => 'required|string|max:255',
        ];
    }

    /**
     * Mensajes de error personalizados
     */
    public function customValidationMessages()
    {
        return [
            'nombre.required' => 'El nombre es obligatorio.',
            'nombre.unique'   => 'El artículo ":input" ya existe en el sistema.',
            'cantidad.required' => 'La cantidad es obligatoria.',
            'cantidad_minima.required' => 'La cantidad mínima es obligatoria.',
        ];
    }

    /**
     * Maneja los errores de validación de forma optimizada
     */
    public function onFailure(Failure ...$failures)
    {
        foreach ($failures as $failure) {
            $row = $failure->row();
            $attribute = $failure->attribute();
            $error = $failure->errors()[0];

            // Agrupar errores por columna
            if (!isset($this->errors[$attribute])) {
                $this->errors[$attribute] = [
                    'rows' => [],
                    'message' => $error
                ];
            }
            $this->errors[$attribute]['rows'][] = $row;
        }
    }

    /**
     * Obtiene los errores agrupados
     */
    public function getGroupedErrors()
    {
        return $this->errors;
    }
}