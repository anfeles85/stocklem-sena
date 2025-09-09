@extends('templates.base')
@section('title', 'Presentaciones')
@section('header', 'Presentaciones')
@section('content')
    @can('administrador')
    <div class="mb-3">
        <a href="{{ route('presentation.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear presentación
        </a>
    </div>
    @endcan

    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>DESCRIPCIÓN</th>

                        @can('administrador')
                        <th>ACCIONES</th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    @foreach ($presentations as $presentation)
                        <tr class="text-center">
                            <td>{{ $presentation->id }}</td>
                            <td>{{ $presentation->description }}</td>

                            @can('administrador')
                            <td class="text-center">
                                <a href="{{ route('presentation.edit', $presentation->id) }}"
                                    class="btn btn-warning btn-circle btn-sm" title="Editar"><i class="far fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $presentation->id }}" action="{{ route('presentation.destroy', $presentation->id) }}" 
                                     method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm btn-delete" title="Eliminar" 
                                         onclick="removeId({{ $presentation->id }})">
                                        <i class="fa-solid fa-trash-can"></i>
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