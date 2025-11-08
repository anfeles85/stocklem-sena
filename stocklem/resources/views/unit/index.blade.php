@extends('templates.base')
@section('title', 'Unidades')
@section('header', 'Unidades')
@section('content')
    @can('administrador')
        <div class="mb-3">
            <a href="{{ route('unit.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear unidad
            </a>
        </div>
    @endcan

    <div class="card">
        <div class="table-responsive">
            <table id="table_active_inactive" data-status-column="2" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>ESTADO</th>
                        @can('administrador')
                            <th>ACCIONES</th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    @foreach ($units as $unit)
                        <tr class="text-center">
                            <td>{{ $unit->id }}</td>
                            <td>{{ $unit->name }}</td>
                            <td>
                                <span class="badge {{ $unit->status == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $unit->status }}
                                </span>
                            </td>
                            @can('administrador')
                                <td>
                                    <a href="{{ route('unit.edit', $unit->id) }}" class="btn btn-warning btn-circle btn-sm"
                                        title="Editar"><i class="far fa-edit"></i>
                                    </a>
                                    @if ($unit->status == 'ACTIVO')
                                        <form id="form-toggle-{{ $unit->id }}"
                                            action="{{ route('unit.toggleStatus', $unit->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary btn-sm me-1" title="Inactivar">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form id="form-toggle-{{ $unit->id }}"
                                            action="{{ route('unit.toggleStatus', $unit->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm me-1" title="Activar">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form id="form-delete-{{ $unit->id }}"
                                        action="{{ route('unit.forceDelete', $unit->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar permanentemente"
                                            onclick="removePermanently({{ $unit->id }})">
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