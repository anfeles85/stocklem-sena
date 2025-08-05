@extends('templates.base')
@section('title', 'Salidas')
@section('header', 'Salidas')
@section('content')
    @can('administrador')
    <div class="mb-3">
        <a href="{{ route('issue.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear salida
        </a>
    </div>
    @endcan

    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>CODIGO SENA</th>
                        <th>FECHA SALIDA</th>
                        <th>CANTIDAD</th>
                        <th>ARTICULO</th>
                        <th>PERSONA</th>

                        @can('administrador')
                        <th>ACCIONES</th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    @foreach ($issues as $issue)
                        <tr class="text-center">
                            <td>{{ $issue->id }}</td>
                            <td>{{ $issue->sena_code }}</td>
                            <td>{{ $issue->date_issue }}</td>
                            <td>{{ $issue->quantity }}</td>
                            <td>{{ $issue->article->name }}</td>
                            <td>{{ $issue->person->name }}</td>
                            
                            @can('administrador')
                            <td class="text-center">
                                <a href="{{ route('issue.edit', $issue->id) }}" class="btn btn-warning btn-sm me-1"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $issue->id }}" action="{{ route('issue.destroy', $issue->id) }}"
                                     method="POST" class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" title="Eliminar" 
                                     onclick="removeId({{ $issue->id }})">
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
