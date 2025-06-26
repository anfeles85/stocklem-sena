@extends('templates.base')
@section('title', 'Crear artículo')
@section('header', 'Crear artículo')
@section('content')
@include('templates.validation_errors')
<form action="{{ route('article.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="name" class="form-label">Nombre</label>
            <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required value="{{ old('quantity') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="photo" class="form-label">Foto</label>
            <input type="file" name="photo" id="photo" class="form-control" value="{{ old('photo') }}">
        </div>
        <div class="col-md-6">
            <label for="technical_sheet" class="form-label">Ficha técnica</label>
            <input type="file" name="technical_sheet" id="technical_sheet" class="form-control" value="{{ old('technical_sheet') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-4 mb-3 mb-md-0">
            <label for="presentation_id" class="form-label">Presentación</label>
            <select name="presentation_id" id="presentation_id" class="form-control form-select" required>
                <option value="">Seleccione</option>
                @foreach($presentations as $presentation)
                <option value="{{ $presentation['id'] }}"
                    @if(old('presentation_id') == $presentation->id) selected @endif>
                    {{ $presentation['description'] }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4 mb-3 mb-md-0">
            <label for="category_id" class="form-label">Categoría</label>
            <select name="category_id" id="category_id" class="form-control form-select" required>
                <option value="">Seleccione</option>
                @foreach($categories as $category)
                <option value="{{ $category['id'] }}"
                    @if(old('category_id') == $category['id']) selected @endif>
                    {{ $category['name'] }}
                </option>
                @endforeach
            </select>
        </div>

        <div class="col-md-4">
            <label for="supplier_id" class="form-label">Proveedor</label>
            <select name="supplier_id" id="supplier_id" class="form-control form-select" required>
                <option value="">Seleccione</option>
                @foreach($suppliers as $supplier)
                <option value="{{ $supplier['id'] }}" 
                @if(old('supplier_id') == $supplier['id']) selected @endif>
                    {{ $supplier['name'] }}
                </option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 d-grid">
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
        <div class="col-md-6 d-grid">
            <a href="{{ route('article.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>
@endsection