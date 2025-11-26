@extends('templates.base')
@section('title', 'Editar usuario')
@section('header', 'Editar usuario')
@section('content')
    @include('templates.validation_errors')

    <form action="{{ route('users.update', $user->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        {{-- Nombre --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required
                    value="{{ old('name', $user->name) }}" placeholder="Ej: María López">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electrónico</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user->email) }}" placeholder="Ej: usuario@sena.edu.co">
            </div>
        </div>

        {{-- Rol --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="role_id" class="form-label">Rol</label>
                <select name="role_id" id="role_id" class="form-control" required>
                    <option>Seleccione el rol</option>
                    @foreach ($roles as $role)
                        <option value="{{ $role->id }}"
                            @if (old('role_id', $user->role_id) == $role->id) selected @endif>
                            {{ $role->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="status" class="form-label">Estado</label>
                <select name="status" id="status" class="form-control">
                    <option value="ACTIVO" {{ old('status', $user->status) == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                    <option value="INACTIVO" {{ old('status', $user->status) == 'INACTIVO' ? 'selected' : '' }}>INACTIVO
                    </option>
                </select>
            </div>
        </div>

        <br>

        {{-- Botones --}}
        <div class="row">
            <div class="col-md-6 d-grid">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <div class="col-md-6 d-grid">
                <a href="{{ route('users.index') }}" class="btn btn-info">Cancelar</a>
            </div>
        </div>
    </form>
@endsection

@push('scripts')
    <script src="{{ asset('js/select2.js') }}"></script>
@endpush
