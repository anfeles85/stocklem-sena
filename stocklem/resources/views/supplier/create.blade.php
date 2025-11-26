@extends('templates.base')
@section('title', 'Crear proveedor')
@section('header', 'Crear proveedor')
@section('content')
    @include('templates.validation_errors')
<form action="{{ route('supplier.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-4">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}" placeholder="Ej: Distribuidora XYZ">
        </div>
        <div class="col-md-4">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="number" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}" placeholder="Ej: 6012345678">
        </div>
        <div class="col-md-4">
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
            <a href="{{ route('supplier.index') }}" class="btn btn-info">Cancelar</a>
        </div>
    </div>
</form>

@endsection