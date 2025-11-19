@extends('templates.base')
@section('title', 'Crear presentación')
@section('header', 'Crear presentación')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('presentation.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="description" >Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" required
                            value="{{ old('description') }}" placeholder="Ej: Caja x 12 unidades">
                    </div>
                    <div class="col-md-6">
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
                        <a href="{{ route('presentation.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

@endsection
