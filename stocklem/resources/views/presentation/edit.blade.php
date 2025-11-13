@extends('templates.base')
@section('title', 'Editar presentación')
@section('header', 'Editar presentación')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('presentation.update', $presentation->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description"
                            value="{{ $presentation->description }}" required>
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ACTIVO" {{ $presentation->status == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $presentation->status == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('presentation.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>

@endsection
