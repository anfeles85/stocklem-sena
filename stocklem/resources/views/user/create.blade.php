@extends('templates.base')
@section('title', 'Crear usuario')
@section('header', 'Crear usuario')
@section('content')
    @include('templates.validation_errors')

    <form id="createUserForm" action="{{ route('users.store') }}" method="POST">
        @csrf

        {{-- Nombre y Cantidad --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required>
            </div>
            <div class="col-md-6">
                <label for="email" class="form-label">Correo electronico</label>
                <input type="email" name="email" id="email" class="form-control" required>
            </div>
        </div>

        <div class="row mb-3">
            <div class="col-md-6">
                <label for="password" class="form-label-sena">
                    <i class="fas fa-lock me-2"></i>
                    Contraseña
                </label>
                <div class="position-relative">
                    <input type="password" name="password" id="password" class="form-control form-control-sena"
                        placeholder="Ingresa tu contraseña" required>
                    <button type="button" class="toggle-password-sena" data-target="password">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
            
            <div class="col-md-6">
                <label for="password_confirmation" class="form-label-sena">
                    <i class="fas fa-lock me-2"></i>
                    Confirmar contraseña
                </label>
                <div class="position-relative">
                    <input type="password" name="password_confirmation" id="password_confirmation"
                        class="form-control form-control-sena" placeholder="Confirma tu contraseña" required>
                    <button type="button" class="toggle-password-sena" data-target="password_confirmation">
                        <i class="fas fa-eye"></i>
                    </button>
                </div>
            </div>
        </div>

        {{-- Rol --}}
        <div class="row mb-3">
            <div class="col-md-12">
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
                <input type="hidden" name="role_id" id="role_id">
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
    <script src="{{ asset('js/change-password.js') }}"></script>
@endsection
