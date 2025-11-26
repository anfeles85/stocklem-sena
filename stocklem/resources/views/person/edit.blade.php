@extends('templates.base')
@section('title', 'Editar persona')
@section('header', 'Editar persona')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('person.update', $person->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-3 mb-4">
                        <label for="document">Documento</label>
                        <input type="text" id="document" name="document" required value="{{ $person->document }}"
                            class="form-control" placeholder="Ej: 1234567890">
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" id="name" name="name" required value="{{ $person->name }}"
                            class="form-control" placeholder="Ej: Juan Pérez">
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="phone">Teléfono</label>
                        <input type="text" name="phone" id="phone" required value="{{ $person->phone }}"
                            class="form-control" placeholder="Ej: 3001234567">
                    </div>
                    <div class="col-md-3 mb-4">
                        <label for="status">Estado</label>
                        <select name="status" id="status" class="form-control" required>
                            <option value="ACTIVO" {{ $person->status == 'ACTIVO' ? 'selected' : '' }}>ACTIVO</option>
                            <option value="INACTIVO" {{ $person->status == 'INACTIVO' ? 'selected' : '' }}>INACTIVO</option>
                        </select>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('person.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
