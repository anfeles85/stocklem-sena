@extends('templates.base')
@section('title', 'Artículos')
@section('header', 'Artículos')
@section('content')
    @can('administrador')
    <div class="mb-3">
        <a href="{{ route('article.create') }}" class="btn btn-primary">
            <i class="fas fa-plus"></i> Crear artículo
        </a>

        <a href="{{ route('article.import.form') }}" class="btn btn-success">
            <i class="fas fa-file-excel"></i> Importar desde Excel
        </a>
        </div>
    @endcan
    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CANTIDAD</th>
                        <th>PRESENTACIÓN</th>
                        <th>CATEGORÍA</th>
                        @can('administrador')
                        <th>ACCIONES</th>
                        @endcan
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr class="text-center {{ $article->isBelowMinimum() ? 'table-danger' : '' }}">
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->quantity }}</td>
                            <td>{{ $article->presentation->description ?? 'Sin presentación' }}</td>
                            <td>{{ $article->category->name ?? 'Sin categoría' }}</td>
                            @can('administrador')
                            <td>
                                <a href="{{ route('article.edit', $article->id) }}" class="btn btn-warning btn-sm me-1"
                                    title="Editar">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <form id="form-delete-{{ $article->id }}"
                                    action="{{ route('article.destroy', $article->id) }}" method="POST"
                                    class="d-inline delete-form">
                                    @csrf
                                    @method('DELETE')
                                    <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                        onclick="removeId({{ $article->id }})">
                                        <i class="fas fa-trash"></i>
                                    </button>
                                </form>
                                <button type="button" class="btn btn-info btn-sm" title="Ver" data-bs-toggle="modal" data-bs-target="#viewModal{{ $article->id }}">
                                    <i class="fa-solid fa-eye"></i>
                                </button>
                            </td>
                            @endcan
                        </tr>
                        {{-- Modal con detalles del artículo --}}
                        <div class="modal fade" id="viewModal{{ $article->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-lg modal-dialog-centered">
                                <div class="modal-content shadow-lg border-0">
                                    <div class="modal-header" style="background-color: #198754;">
                                        <h5 class="modal-title text-white">
                                            <i class="fas fa-info-circle me-2"></i>Detalles del artículo
                                        </h5>
                                        <button type="button" class="btn-close btn-close-black" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body text-black">
                                        <div class="row">
                                            <div class="col-12 col-md-8">
                                                <p class="mb-2"><strong>ID: </strong>{{ $article->id }}</p>
                                                <p class="mb-2"><strong>Nombre: </strong>{{ $article->name }}</p>
                                                <p class="mb-2"><strong>Cantidad: </strong>{{ $article->quantity }}</p>
                                                <p class="mb-2"><strong>Cantidad mínima: </strong>{{ $article->min_quantity }}</p>
                                                <p class="mb-2"><strong>Presentación: </strong>{{ $article->presentation->description ?? 'Sin presentación' }}</p>
                                                <p class="mb-2"><strong>Categoría: </strong>{{ $article->category->name ?? 'Sin categoría' }}</p>
                                                <p class="mb-2"><strong>Proveedor: </strong>{{ $article->supplier->name ?? 'Sin proveedor' }}</p>
                                                <p class="mb-2"><strong>Unidad: </strong>{{ $article->unit->name ?? 'Sin unidad'}}</p>
                                                
                                                @if($article->technical_sheet)
                                                    <p class="mb-0">
                                                        <strong>Ficha técnica: </strong><br>
                                                        <a href="{{ $article->technical_sheet }}" target="_blank" class="btn btn-outline-primary btn-sm mt-2">
                                                            <i class="fas fa-file-pdf me-1"></i>Ver ficha técnica
                                                        </a>
                                                    </p>
                                                @else
                                                    <p class="mb-0"><strong>Ficha técnica: </strong>Sin ficha técnica</p>
                                                @endif
                                            </div>
                                            <div class="col-12 col-md-4">
                                                @if($article->photo)
                                                    <div class="text-center">
                                                        <strong>Foto:</strong><br>
                                                        <img src="{{ $article->photo }}" alt="Foto del artículo" class="img-fluid mt-2" style="max-width: 100%; border-radius: 8px;">
                                                    </div>
                                                @else
                                                    <p class="mb-2"><strong>Foto: </strong>Sin foto</p>
                                                @endif
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

<style>
    .modal-dialog.modal-lg.modal-dialog-centered {
        margin-left: auto;
        margin-right: auto; 
    }
    /* Tamaño recomendado para la foto dentro de la modal: 150px x 150px (responsive) */
    .article-photo {
        width: 150px;
        height: 150px;
        object-fit: cover;
        border-radius: 8px;
        display: inline-block;
    }
    @media (max-width: 576px) {
        .article-photo {
            width: 200px;
            height: 200px;
        }
    }
</style>