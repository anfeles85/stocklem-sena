@extends('templates.base')
@section('title', 'Editar unidad')
@section('header', 'Editar unidad')
@section('content')
    <div class="row">
         <div class="col-lg-12 mb-4">
            <form action="{{ route('unit.update',$unit['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $unit['name'] }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('unit.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
         </div>
    </div>

@endsection