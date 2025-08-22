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
                    value="{{ old('name', $user->name) }}">
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" name="email" id="email" class="form-control"
                    value="{{ old('email', $user->email) }}">
            </div>
        </div>

        {{-- Rol --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="role_name" class="form-label">Rol</label>
                <div class="position-relative">
                    <input type="text" id="role_name" class="form-control pe-5" required placeholder="Seleccione">
                    <span id="role_clear" class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                        style="right: 2.2rem; display: none; z-index: 2;">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                        <i id="role_arrow" class="fas fa-chevron-down"></i>
                    </span>
                </div>
                <input type="hidden" name="role_id" id="role_id" value="{{ old('role_id', $user->role_id ?? '') }}">
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

@section('scripts')
    <script>
        const roles = @json($roles);
    </script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
@endsection
