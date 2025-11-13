@extends('templates.base')
@section('title', 'Crear persona')
@section('header', 'Crear persona')
@section('content')
    @include('templates.validation_errors')

<form action="{{ route('person.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-3 mb-3 mb-md-0">
            <label for="document" class="form-label">Documento</label>
            <input type="text" name="document" id="document" class="form-control" required value="{{ old('document') }}">
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="col-md-3 mb-3 mb-md-0">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="number" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
        </div>
        <div class="col-md-3">
            <label for="status" class="form-label">Estado</label>
            <select name="status" id="status" class="form-control" required>
                <option value="ACTIVO" {{ old('status') == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                <option value="INACTIVO" {{ old('status') == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
            </select>
        </div>
    </div>
    <br>
    <div class="row">
        <div class="col-md-6 d-grid">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        <div class="col-md-6 d-grid">
            <a href="{{ route('person.index') }}" class="btn btn-info">Cancelar</a>
        </div>
    </div>
</form>

@endsection