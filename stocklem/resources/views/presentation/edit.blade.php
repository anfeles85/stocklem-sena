@extends('templates.base')
@section('title', 'Editar presentación')
@section('header', 'Editar presentación')
@section('content')
    <div class="row">
         <div class="col-lg-12 mb-4">
            <form action="{{ route('presentation.update',$presentation['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $presentation['description'] }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-2">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-lg-2">
                        <a href="{{ route('presentation.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
         </div>
    </div>

@endsection
