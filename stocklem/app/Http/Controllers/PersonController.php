<?php

namespace App\Http\Controllers;

use App\Models\Person;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\Imports\PersonsImport;
use Maatwebsite\Excel\Facades\Excel;

class PersonController extends Controller
{

    private $rules = [
        'phone' => 'max:255',
        'name' => 'required|string|min:3|max:255',
        'status' => 'required|in:ACTIVO,INACTIVO'
    ];

    private $traductionAttributes = [
        'document' => 'documento',
        'phone' => 'telefono',
        'name' => 'nombre',
        'status' => 'estado'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $persons = Person::orderByRaw("FIELD(status, 'ACTIVO', 'INACTIVO')")->get();
        return view('person.index', compact('persons'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('person.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->rules['document'] = 'required|numeric|unique:person|min:3|max:99999999999999999999';
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('person.create')->withInput()->withErrors($errors);
        }
        $person = Person::create($request->all());
        return redirect()->route('person.index')->with('success', '¡Persona creada exitosamente!');
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
        $person = Person::find($id);
        if ($person) //la persona existe
        {
            return view('person.edit', compact('person'));
        } else {
            return redirect()->route('person.index')->with('error', 'No se encuentró la persona');
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $this->rules['document'] = 'required|numeric|unique:person,document,' . $id . '|min:3|max:99999999999999999999';
        $validator = Validator::make($request->all(), $this->rules);
        $validator->setAttributeNames($this->traductionAttributes);
        if ($validator->fails()) {
            $errors = $validator->errors();
            return redirect()->route('person.edit', $id)->withInput()->withErrors($errors);
        }
        $person = Person::find($id);
        if ($person) //la persona existe
        {
            $person->update($request->all());
            return redirect()->route('person.index')->with('success', '¡Registro actualizado correctamente!');
        } else {
            return redirect()->route('person.index')->with('error', 'Ha ocurrido un problema al acttualizar la persona');
        }
    }

    /**
     * Alternar estado de la persona (ACTIVO <-> INACTIVO).
     */
    public function toggleStatus(string $id)
    {
        $person = Person::find($id);

        if ($person) {
            $newStatus = $person->status == 'ACTIVO' ? 'INACTIVO' : 'ACTIVO';
            $person->update(['status' => $newStatus]);
            
            $message = $newStatus == 'ACTIVO' ? 'Persona activada exitosamente' : 'Persona inactivada exitosamente';
            return redirect()->route('person.index')->with('success', $message);
        } else {
            return redirect()->route('person.index')->with('error', 'No se encontró la persona');
        }
    }

    /**
     * Eliminar persona permanentemente.
     */
    public function forceDelete(string $id)
    {
        $person = Person::find($id);

        if ($person) {
            $person->delete();
            return redirect()->route('person.index')->with('success', 'Persona eliminada permanentemente');
        } else {
            return redirect()->route('person.index')->with('error', 'No se encontró la persona');
        }
    }

    /**
     * Muestra la vista del formulario de importación.
     */
    public function showImportForm()
    {
        return view('person.import');
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
            $import = new PersonsImport;
            Excel::import($import, $request->file('file'));

            $groupedErrors = $import->getGroupedErrors();
            $skipped = $import->getSkipped();
            $imported = $import->getImported();

            if (!empty($groupedErrors)) {
                return redirect()->route('person.import.form')
                    ->with('grouped_errors', $groupedErrors);
            }

            $message = "¡Importación completada! Personas importadas: {$imported}";

            if (count($skipped) > 0) {
                $message .= " | Omitidas (ya existen): " . count($skipped);
            }

            return redirect()->route('person.import.form')
                ->with('loaded', $message)
                ->with('skipped', $skipped);
        } catch (\Exception $e) {
            return redirect()->route('person.import.form')
                ->with('error', 'Error al procesar el archivo: ' . $e->getMessage());
        }
    }
}
