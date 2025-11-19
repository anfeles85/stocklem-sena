@extends('templates.base')
@section('title', 'Editar unidad')
@section('header', 'Editar unidad')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('unit.update', $unit->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $unit->name }}" required placeholder="Ej: Kilogramo">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ACTIVO" {{ $unit->status == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $unit->status == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('unit.index') }}" class="btn btn-info btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
