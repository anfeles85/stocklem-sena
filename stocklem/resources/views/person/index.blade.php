@extends('templates.base')
@section('title', 'Personas')
@section('header', 'Personas')
@section('content')
    @can('administrador')
    <div class="mb-3">
        <a href="{{ route('person.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear persona
        </a>
    </div>
    @endcan

    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>

                        @can('administrador')
                        <th>ACCIONES</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $person)
                        <tr class="text-center">
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->document }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->phone }}</td>

                            @can('administrador')
                            <td class="text-center">
                                <a href="{{ route('person.edit', $person->id) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $person->id }}" action="{{ route('person.destroy', $person->id) }}"
                                     method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" title="Eliminar" 
                                     onclick="removeId({{ $person->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                            @endcan
                            
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection