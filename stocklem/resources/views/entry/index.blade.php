@extends('templates.base')
@section('title', 'Entradas')
@section('header', 'Entradas')
@section('content')
    @can('administrador')
        <div class="mb-3">
            <a href="{{ route('entry.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear entrada
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
                        <th>FECHA</th>
                        <th>CANTIDAD</th>
                        <th>ARTÍCULO</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($entries as $entry)
                        <tr class="text-center">
                            <td>{{ $entry->id }}</td>
                            <td>{{ $entry->sena_code }}</td>
                            <td>{{ $entry->date_entry }}</td>
                            <td>{{ $entry->quantity }}</td>
                            <td>{{ $entry->article->name ?? 'Sin artículo' }}</td>

                            <td>
                                <button type="button" class="btn btn-info btn-sm" title="Ver" data-bs-toggle="modal"
                                    data-bs-target="#viewModal{{ $entry->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                                @can('administrador')
                                    <a href="{{ route('entry.edit', $entry->id) }}" class="btn btn-warning btn-sm me-1"
                                        title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="form-delete-{{ $entry->id }}" action="{{ route('entry.destroy', $entry->id) }}"
                                        method="POST" class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                            onclick="removeId({{ $entry->id }})">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                @endcan
                            </td>
                        </tr>
                        {{-- Modal con detalles de la entrada --}}
                            <div class="modal fade" id="viewModal{{ $entry->id }}" tabindex="-1" aria-hidden="true">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content shadow-lg border-0"
                                        style="width: fit-content; min-width: 300px; max-width: 600px; margin: 0 auto;">
                                        <div class="modal-header" style="background-color: #198754;">
                                            <h5 class="modal-title text-white">
                                                <i class="fas fa-info-circle me-2"></i>Detalles de la entrada
                                            </h5>
                                            <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body text-black">
                                            <div class="container-fluid">
                                                <div class="row">
                                                    <div class="col-12">
                                                        <p class="mb-2"><strong>Codigo SENA: </strong>{{ $entry->sena_code ?? 'Sin codigo SENA' }}</p>
                                                        <p class="mb-2"><strong>Fecha de entrada: </strong>{{ $entry->date_entry }}</p>
                                                        <p class="mb-2"><strong>Articulo: </strong>{{ $entry->article->name}}</p>
                                                        <p class="mb-2"><strong>Fecha de expiración: </strong>{{ $entry->expiration_date ?? 'Sin fecha de expiración' }}</p>
                                                        <p class="mb-2"><strong>Cantidad: </strong>{{ $entry->quantity}}</p>
                                                        <p class="mb-2"><strong>Observación: </strong>{{$entry->observations ?? 'Sin observación' }}</p>
                                                        <p class="mb-2"><strong>Usuario: </strong>{{ $entry->user->name}}</p>
                                                    </div>
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
