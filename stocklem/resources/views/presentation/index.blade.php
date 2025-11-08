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
            <table id="table_active_inactive" data-status-column="2" class="table table-hover align-middle mb-0">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>DESCRIPCIÓN</th>
                        <th>ESTADO</th>

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
                            <td>
                                <span class="badge {{ $presentation->status == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $presentation->status }}
                                </span>
                            </td>

                            @can('administrador')
                            <td class="text-center">
                                <a href="{{ route('presentation.edit', $presentation->id) }}"
                                    class="btn btn-warning btn-circle btn-sm" title="Editar"><i class="far fa-edit"></i>
                                </a>
                                @if ($presentation->status == 'ACTIVO')
                                        <form id="form-toggle-{{ $presentation->id }}"
                                            action="{{ route('presentation.toggleStatus', $presentation->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary btn-sm me-1" title="Inactivar">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form id="form-toggle-{{ $presentation->id }}"
                                            action="{{ route('presentation.toggleStatus', $presentation->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm me-1" title="Activar">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form id="form-delete-{{ $presentation->id }}"
                                        action="{{ route('presentation.forceDelete', $presentation->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar permanentemente"
                                            onclick="removeId({{ $presentation->id }})">
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