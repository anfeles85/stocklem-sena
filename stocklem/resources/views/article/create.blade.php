@extends('templates.base')
@section('title', 'Crear artículo')
@section('header', 'Crear artículo')
@section('content')
    @include('templates.validation_errors')

    <form action="{{ route('article.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        {{-- Nombre y Cantidad --}}
        <div class="row mb-3">
            <div class="col-md-4">
                <label for="name" class="form-label">Nombre</label>
                <input type="text" name="name" id="name" class="form-control" required value="{{ old('name') }}">
            </div>
            <div class="col-md-4">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required
                    value="{{ old('quantity') }}">
            </div>
            <div class="col-md-4">
                <label for="min_quantity" class="form-label">Cantidad mínima</label>
                <input type="number" name="min_quantity" id="min_quantity" class="form-control" min="1"
                    maxlength="9999999999" max="9999999999" required value="{{ old('min_quantity') }}">
            </div>
        </div>

        {{-- Foto y Ficha técnica --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="photo" class="form-label">Foto</label>
                <input type="file" name="photo" id="photo" class="form-control" value="{{ old('photo') }}">
            </div>
            <div class="col-md-6">
                <label for="technical_sheet" class="form-label">Ficha técnica</label>
                <input type="file" name="technical_sheet" id="technical_sheet" class="form-control"
                    accept="application/pdf" value="{{ old('technical_sheet') }}">
            </div>
        </div>

        {{-- Presentation and Category --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="presentation_id" class="form-label">Presentación</label>
                <select name="presentation_id" id="presentation_id" class="form-control js-example-placeholder-single"
                    required>
                    <option></option>
                    @foreach ($presentations as $presentation)
                        <option value="{{ $presentation->id }}" @if (old('presentation_id') == $presentation->id) selected @endif>
                            {{ $presentation->description }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="category_id" class="form-label">Categoría</label>
                <select name="category_id" id="category_id" class="form-control js-example-placeholder-single"
                    required>
                    <option></option>
                    @foreach ($categories as $category)
                        <option value="{{ $category->id }}" @if (old('category_id') == $category->id) selected @endif>
                            {{ $category->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        {{-- Proveedor y Unidad --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="supplier_id" class="form-label">Proveedor</label>
                <select name="supplier_id" id="supplier_id" class="form-control js-example-placeholder-single"
                    required>
                    <option></option>
                    @foreach ($suppliers as $supplier)
                        <option value="{{ $supplier->id }}" @if (old('supplier_id') == $supplier->id) selected @endif>
                            {{ $supplier->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="col-md-6">
                <label for="unit_id" class="form-label">Unidad</label>
                <select name="unit_id" id="unit_id" class="form-control js-example-placeholder-single"
                    required>
                    <option></option>
                    @foreach ($units as $unit)
                        <option value="{{ $unit->id }}" @if (old('unit_id') == $unit->id) selected @endif>
                            {{ $unit->name }}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <br>

        {{-- Botones --}}
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

@section('scripts')
    <script>
        $(document).ready(function() {
            $('.js-example-placeholder-single').select2({
                placeholder: "Seleccione",
                allowClear: true
            });
        });
    </script>
@endsection
