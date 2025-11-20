@extends('templates.base')
@section('title', 'Usuarios')
@section('header', 'Usuarios')
@section('content')
    @can('administrador')
        <div class="mb-3">
            <a href="{{ route('users.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear usuario
            </a>
        </div>
    @endcan
    <div class="card">
        <div class="table-responsive">
            <table id="table_active_inactive" data-status-column="4" class="table table-hover align-middle mb-0 text-center">
                <thead class="table-light">
                    <tr class="text-center">
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>CORREO</th>
                        <th>ROL</th>
                        <th>ESTADO</th>

                        @can('administrador')
                            <th>ACCIONES</th>
                        @endcan

                    </tr>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                        <tr class="text-center">
                            <td>{{ $user->id }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->role->name ?? 'Sin rol' }}</td>
                            <td>
                                <span class="badge {{ $user->status == 'ACTIVO' ? 'bg-success' : 'bg-secondary' }}">
                                    {{ $user->status }}
                                </span>
                            </td>
                            @can('administrador')
                                <td>
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn btn-warning btn-circle btn-sm"
                                        title="Editar"><i class="far fa-edit"></i>
                                    </a>
                                    @if ($user->status == 'ACTIVO')
                                        <form id="form-toggle-{{ $user->id }}"
                                            action="{{ route('users.toggleStatus', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-secondary btn-sm me-1" title="Inactivar">
                                                <i class="fas fa-ban"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form id="form-toggle-{{ $user->id }}"
                                            action="{{ route('users.toggleStatus', $user->id) }}" method="POST"
                                            class="d-inline">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-success btn-sm me-1" title="Activar">
                                                <i class="fas fa-check"></i>
                                            </button>
                                        </form>
                                    @endif

                                    <form id="form-delete-{{ $user->id }}"
                                        action="{{ route('users.forceDelete', $user->id) }}" method="POST"
                                        class="d-inline delete-form">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar permanentemente"
                                            onclick="removePermanently({{ $user->id }})">
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
