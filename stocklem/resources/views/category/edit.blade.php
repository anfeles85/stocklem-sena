@extends('templates.base')
@section('title', 'Editar categoria')
@section('header', 'Editar categoria')
@section('content')
   <div class="row">
         <div class="col-lg-12 mb-4">
            <form action="{{ route('category.update',$category['id']) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-lg-6 mb-4">
                        <label for="name">Nombre</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $category['name'] }}" required>
                    </div>
                    <div class="col-lg-6 mb-4">
                        <label for="description">Descripción</label>
                        <input type="text" class="form-control" name="description" id="description" value="{{ $category['description'] }}" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-lg-6">
                        <a href="{{ route('category.index') }}" class="btn btn-danger btn-block">Cancelar</a>
                    </div>
                </div>
            </form>
         </div>
    </div>

@endsection
