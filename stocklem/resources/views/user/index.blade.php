@extends('templates.base')
@section('title', 'Usuarios')
@section('header', 'Usuarios')
@section('content')
    @can('administrador')
        <div class="mb-3">
            <a href="{{ route('user.create') }}" class="btn btn-primary">
                <i class="fas fa-plus"></i> Crear usuario
            </a>
        </div>
    @endcan
    <div class="card">
        <div class="table-responsive">
            <table id="table_data" class="table table-hover align-middle mb-0 text-center">
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
                            <td>{{ $user->role->name ?? 'Sin rol'}}</td>
                            <td>{{ $user->status }}</td>

                            @can('administrador')
                                <td>
                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-warning btn-sm me-1"
                                        title="Editar">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <form id="form-delete-{{ $user->id }}"
                                        action="{{ route('user.destroy', $user->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button" class="btn btn-danger btn-sm" title="Eliminar"
                                            onclick="removeId({{ $user->id }})">
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
