@extends('templates.base')
@section('title', 'Unidades')
@section('header', 'Unidades')
@section('content')
    <div class="mb-3">
        <a href="{{ route('unit.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear unidad
        </a>
    </div>
    <div class="card">
        <div class="table-responsive">
            <table class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th class="text-center">ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($units as $unit)
                    <tr>
                        <td>{{ $unit->id }}</td>
                        <td>{{ $unit->name }}</td>
                        <td class="text-center">
                            <a href="{{ route('unit.edit', $unit->id) }}"
                                    class="btn btn-warning btn-circle btn-sm" title="Editar"><i class="far fa-edit"></i>
                            </a>
                            <form id="form-delete-{{ $unit->id }}" action="{{ route('unit.destroy', $unit->id) }}" 
                                 method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" title="Eliminar" 
                                        onclick="removeId({{ $unit->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
                                    </button>
                                </form>
                        </td>
                    </tr>
                    @endforeach
                    @if($units->isEmpty())
                        <tr>
                            <td colspan="5" class="text-center text-muted">No hay unidades registradas.</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
