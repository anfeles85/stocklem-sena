@extends('templates.base')
@section('title', 'Editar artículo')
@section('header', 'Editar artículo')
@section('content')
@include('templates.validation_errors')
<form action="{{ route('article.update', $article->id) }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name', $article->name) }}">
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required value="{{ old('quantity', $article->quantity) }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="photo" class="form-label">Foto</label>
            @if($article->photo)
                <div class="mb-2">
                    <img src="{{ $article->photo }}" alt="Foto actual" class="img-fluid" style="max-width: 60px">
                </div>
            @endif
            <input type="file" name="photo" id="photo" class="form-control">
        </div>
        <div class="col-md-6">
            <label for="technical_sheet" class="form-label">Ficha técnica</label>
            @if($article->technical_sheet)
                <div class="mb-2">
                    <a href="{{ $article->technical_sheet }}" target="_blank">Ver ficha actual</a>
                </div>
            @endif
            <input type="file" name="technical_sheet" id="technical_sheet" class="form-control">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4 mb-3 mb-md-0">
            <label for="presentation_id" class="form-label">Presentación</label>
            <select name="presentation_id" id="presentation_id" class="form-control" required>
                <option value="">Seleccione una presentación</option>
                @foreach($presentations as $presentation)
                    <option value="{{ $presentation->id }}" {{ old('presentation_id', $article->presentation_id) == $presentation->id ? 'selected' : '' }}>
                        {{ $presentation->description }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4 mb-3 mb-md-0">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-control" required>
                <option value="">Seleccione una categoría</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id', $article->category_id) == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
        </div>
        <div class="col-md-4">
            <label for="supplier_id" class="form-label">Proveedor</label>
            <select name="supplier_id" id="supplier_id" class="form-control" required>
                <option value="">Seleccione un proveedor</option>
                @foreach($suppliers as $supplier)
                    <option value="{{ $supplier->id }}" {{ old('supplier_id', $article->supplier_id) == $supplier->id ? 'selected' : '' }}>
                        {{ $supplier->name }}
                    </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-grid">
            <button type="submit" class="btn btn-success">Guardar</button>
        </div>
        <div class="col-md-6 d-grid">
            <a href="{{ route('article.index') }}" class="btn btn-info">Cancelar</a>
        </div>
    </div>
</form>
@endsection
