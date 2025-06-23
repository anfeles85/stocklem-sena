@extends('templates.base')
@section('title', 'Personas')
@section('header', 'Personas')
@section('content')
    <div class="mb-3">
        <a href="{{ route('person.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear persona
        </a>
    </div>

    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>DOCUMENTO</th>
                        <th>NOMBRE</th>
                        <th>TELÉFONO</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($persons as $person)
                        <tr>
                            <td>{{ $person->id }}</td>
                            <td>{{ $person->document }}</td>
                            <td>{{ $person->name }}</td>
                            <td>{{ $person->phone }}</td>
                            <td class="text-center">
                                <a href="{{ route('person.edit', $person->id) }}"
                                    class="btn btn-warning btn-sm me-1" title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form action="{{ route('person.destroy', $person->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger btn-sm" title="Eliminar"
                                        onclick="return confirm('¿Seguro que desea eliminar esta persona?')">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    @if($persons->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay personas registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection