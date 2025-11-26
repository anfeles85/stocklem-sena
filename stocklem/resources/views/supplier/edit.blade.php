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
                    <div class="col-md-4 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" required value="{{ $supplier->name }}"
                            class="form-control" placeholder="Ej: Distribuidora XYZ">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" id="phone" required
                            value="{{ $supplier->phone }}" class="form-control" placeholder="Ej: 6012345678">
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ACTIVO" {{ $supplier->status == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $supplier->status == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('supplier.index') }}" class="btn btn-info btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
