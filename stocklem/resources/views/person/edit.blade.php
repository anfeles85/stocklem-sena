@extends('templates.base')
@section('title', 'Editar persona')
@section('header', 'Editar persona')
@section('content')

<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('person.update', $person->id) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col-md-4 mb-4">
                    <label for="document">Documento</label>
                    <input type="text" id="document" name="document" required 
                        value="{{ old('document', $person->document) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="name">Nombre</label>
                    <input type="text" id="name" name="name" required 
                        value="{{ old('name', $person->name) }}" class="form-control">
                </div>
                <div class="col-md-4 mb-4">
                    <label for="phone">Teléfono</label>
                    <input type="text" name="phone" id="phone" required 
                        value="{{ old('phone', $person->phone) }}" class="form-control">
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 mb-4 d-grid">
                    <button type="submit" class="btn btn-primary btn-block">Guardar</button>
                </div>
                <div class="col-md-6 mb-4 d-grid">
                    <a href="{{ route('person.index') }}" class="btn btn-secondary btn-block">Cancelar</a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection