@extends('templates.base')
@section('title', 'Crear proveedor')
@section('header', 'Crear proveedor')
@section('content')
    @include('templates.validation_errors')
<form action="{{ route('supplier.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="col-md-6">
            <label for="phone" class="form-label">Teléfono</label>
            <input type="number" name="phone" id="phone" class="form-control" required value="{{ old('phone') }}">
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-grid">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <div class="col-md-6 d-grid">
            <a href="{{ route('supplier.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>

@endsection