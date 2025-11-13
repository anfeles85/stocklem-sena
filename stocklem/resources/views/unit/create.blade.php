@extends('templates.base')
@section('title', 'Crear unidad')
@section('header', 'Crear unidad')
@section('content')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('unit.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-md-6 mb-4">
                        <label for="name">Nombre</label>
                        <input for="name" class="form-control" name="name" id="name" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-md-6 mb-4">
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
                        <a href="{{ route('unit.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
