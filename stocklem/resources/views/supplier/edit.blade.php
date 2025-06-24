@extends('templates.base')
@section('title', 'Editar proveedor')
@section('header', 'Editar proveedor')
@section('content')
    @include('templates.validation_errors')

<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('supplier.update', $supplier->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" required 
                        value="{{ old('name', $supplier->name) }}" class="form-control">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" required 
                        value="{{ old('phone', $supplier->phone) }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
                <div class="col-md-6 mb-4 d-grid">
                    <a href="{{ route('supplier.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection