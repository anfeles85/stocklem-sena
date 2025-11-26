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
                        <th>CÓDIGO SENA</th>
                        <th>FECHA SALIDA</th>
                        <th>CANTIDAD</th>
                        <th>ARTÍCULO</th>
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
                                <button type="button" class="btn btn-info btn-sm" title="Ver" data-bs-toggle="modal" data-bs-target="#viewModal{{ $issue->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                            @endcan
                        </tr>
                    {{-- Modal con detalles de la entrada --}}
                            <div class="modal fade" id="viewModal{{ $issue->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-lg border-0"
                                        style="width: fit-content; min-width: 300px; max-width: 600px; margin: 0 auto;">
                                        <div class="modal-header" style="background-color: #198754;">
                                            <h5 class="modal-title text-white">
                                                <i class="fas fa-info-circle me-2"></i>Detalles de la salida
                                            </h5>
                                            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-black">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-2"><strong>ID: </strong>{{ $issue->id }}</p>
                                                        <p class="mb-2"><strong>Codigo SENA: </strong>{{ $issue->sena_code ?? 'Sin codigo SENA' }}</p>
                                                        <p class="mb-2"><strong>Fecha de salida: </strong>{{ $issue->date_issue }}</p>
                                                        <p class="mb-2"><strong>Articulo: </strong>{{ $issue->article->name}}</p>
                                                        <p class="mb-2"><strong>Cantidad: </strong>{{ $issue->quantity}}</p>
                                                        <p class="mb-2"><strong>Persona: </strong>{{ $issue->person->name}}</p>
                                                        <p class="mb-2"><strong>Observación: </strong>{{ $issue->observations ?? 'Sin observación' }}</p>
                                                        <p class="mb-2"><strong>Usuario: </strong>{{ $issue->user->name}}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                    @endforeach       
                </tbody>
            </table>
        </div>
    </div>
@endsection
