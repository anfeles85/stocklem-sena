@extends('templates.base')
@section('title', 'Crear categoria')
@section('header', 'Crear categoria')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('category.store') }}" method="POST">
                @csrf
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input for="name" class="form-control" name="name" id="name" required
                            value="{{ old('name') }}">
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" required
                            value="{{ old('description') }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('category.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                    
                </div>
            </form>
        </div>
    </div>

@endsection
