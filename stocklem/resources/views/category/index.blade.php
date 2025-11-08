@extends('templates.base')
@section('title', 'Categorías')
@section('header', 'Categorías')
@section('content')
    @can('administrador')
        <div class="mb-3">
            <a href="{{ route('category.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear Categoría
            </a>
        </div>
    @endcan

    <div class="card">
        <div class="table-responsive">
            <table id="table_active_inactive" data-status-column="3" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>DESCRIPCIÓN</th>
                        <th>ESTADO</th>
                        @can('administrador')
                            <th>ACCIONES</th>
                        @endcan
                    </tr>
                </thead>

                <tbody>
                    @foreach ($categories as $category)
                        <tr class="text-center">
                            <td>{{ $category->id }}</td>
                            <td>{{ $category->name }}</td>
                            <td>{{ $category->description }}</td>
                            <td>
                                <span class="badge {{ $category->status == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $category->status }}
                                </span>
                            </td>
                            @can('administrador')
                                <td class="text-center">
                                    <a href="{{ route('category.edit', $category->id) }}" class="btn btn-warning btn-sm me-1"
                                        title="Editar"><i class="fas fa-edit"></i>
                                    </a>
                                    @if ($category->status == 'ACTIVO')
                                        <form id="form-toggle-{{ $category->id }}"
                                            action="{{ route('category.toggleStatus', $category->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary btn-sm me-1" title="Inactivar">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form id="form-toggle-{{ $category->id }}"
                                            action="{{ route('category.toggleStatus', $category->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm me-1" title="Activar">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form id="form-delete-{{ $category->id }}"
                                        action="{{ route('category.forceDelete', $category->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar permanentemente"
                                            onclick="removeId({{ $category->id }})">
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

@push('scripts')
    <script src="{{ asset('js/table-filter-by-status.js') }}"></script>
@endpush