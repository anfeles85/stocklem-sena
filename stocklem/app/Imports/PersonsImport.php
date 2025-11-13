<?php

namespace App\Imports;

use App\Models\Person;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Maatwebsite\Excel\Concerns\SkipsOnFailure;
use Maatwebsite\Excel\Validators\Failure;
use Maatwebsite\Excel\Concerns\WithBatchInserts;

class PersonsImport implements
    ToModel,
    WithHeadingRow,
    WithValidation,
    SkipsOnFailure
{
    private $errors = [];
    private $skipped = [];
    private $imported = 0;

    public function prepareForValidation($data)
    {
        // Convertir el teléfono a cadena de texto antes de la validación
        if (isset($data['telefono']) && $data['telefono'] !== null && $data['telefono'] !== '') {
            $data['telefono'] = (string)$data['telefono'];
        }
        
        return $data;
    }

    public function model(array $row)
    {
        // Convertir el documento a entero
        $document = (int)$row['documento'];
        
        // Verificar si la persona ya existe por documento
        $exists = Person::where('document', $document)->exists();
        
        if ($exists) {
            $this->skipped[] = $document . ' - ' . $row['nombre'];
            return null;
        }

        $this->imported++;

        return new Person([
            'document'    => $document,
            'name'        => $row['nombre'],
            'phone'       => $row['telefono'] ?? null,
        ]);
    }

    public function rules(): array
    {
        return [
            'documento'  => 'required|numeric|min:1|digits_between:3,20',
            'nombre'     => 'required|string|min:3|max:255',
            'telefono'   => 'nullable|string|max:255',
        ];
    }

    public function customValidationMessages()
    {
        return [
            'documento.required'  => 'El documento es obligatorio.',
            'documento.numeric'   => 'El documento debe ser un número.',
            'documento.min'       => 'El documento debe ser mayor a 0.',
            'documento.digits_between' => 'El documento debe tener entre 3 y 20 dígitos.',
            'nombre.required'     => 'El nombre es obligatorio.',
            'nombre.min'         => 'El nombre debe tener al menos 3 caracteres.',
            'nombre.max'         => 'El nombre no debe exceder los 255 caracteres.',
            'telefono.max'       => 'El teléfono no debe exceder los 255 caracteres.',
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