@extends('templates.base')
@section('title', 'Crear categoría')
@section('header', 'Crear categoría')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-md-4 mb-4">
                        <label for="name">Nombre</label>
                        <input for="name" class="form-control" name="name" id="name" required
                            value="{{ old('name') }}" placeholder="Ej: Herramientas">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" required
                            value="{{ old('description') }}" placeholder="Ej: Herramientas de mano y eléctricas">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="status" class="form-label">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ACTIVO" {{ old('status') == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ old('status') == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('category.index') }}" class="btn btn-info">Cancelar</a>
                    </div>

                </div>
            </form>
        </div>
    </div>

@endsection
