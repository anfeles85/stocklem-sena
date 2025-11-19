@extends('templates.base')
@section('title', 'Editar categoría')
@section('header', 'Editar categoría')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('category.update', $category->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-4 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name"
                            value="{{ $category->name }}" required placeholder="Ej: Herramientas">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description"
                            value="{{ $category->description }}" required placeholder="Ej: Herramientas de mano y eléctricas">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ACTIVO" {{ $category->status == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $category->status == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('category.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
