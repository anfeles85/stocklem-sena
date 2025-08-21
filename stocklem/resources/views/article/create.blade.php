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
                <label for="min_quantity" class="form-label">Cantidad minima</label>
                <input type="number" name="min_quantity" id="min_quantity" class="form-control"
                 min="1" maxlength="9999999999" max="9999999999" required
                    value="{{ old('min_quantity') }}">
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
                <input type="file" name="technical_sheet" id="technical_sheet" class="form-control" accept="application/pdf"
                    value="{{ old('technical_sheet') }}">
            </div>
        </div>

        {{-- Presentación y Categoría --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="presentation_description" class="form-label">Presentación</label>
                <div class="position-relative">
                    <input type="text" id="presentation_description" class="form-control pe-5" required
                        placeholder="Seleccione">
                    <span id="presentation_clear"
                        class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                        style="right: 2.2rem; display: none; z-index: 2;">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                        <i id="presentation_arrow" class="fas fa-chevron-down"></i>
                    </span>
                </div>
                <input type="hidden" name="presentation_id" id="presentation_id" value="{{ old('presentation_id') }}">
            </div>

            <div class="col-md-6">
                <label for="category_name" class="form-label">Categoría</label>
                <div class="position-relative">
                    <input type="text" id="category_name" class="form-control pe-5" required placeholder="Seleccione">
                    <span id="category_clear" class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                        style="right: 2.2rem; display: none; z-index: 2;">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                        <i id="category_arrow" class="fas fa-chevron-down"></i>
                    </span>
                </div>
                <input type="hidden" name="category_id" id="category_id" value="{{ old('category_id') }}">
            </div>
        </div>

        {{-- Proveedor y Unidad --}}
        <div class="row mb-3">
            <div class="col-md-6">
                <label for="supplier_name" class="form-label">Proveedor</label>
                <div class="position-relative">
                    <input type="text" id="supplier_name" class="form-control pe-5" required placeholder="Seleccione">
                    <span id="supplier_clear" class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                        style="right: 2.2rem; display: none; z-index: 2;">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                        <i id="supplier_arrow" class="fas fa-chevron-down"></i>
                    </span>
                </div>
                <input type="hidden" name="supplier_id" id="supplier_id" value="{{ old('supplier_id') }}">
            </div>

            <div class="col-md-6">
                <label for="unit_name" class="form-label">Unidad</label>
                <div class="position-relative">
                    <input type="text" id="unit_name" class="form-control pe-5" required placeholder="Seleccione">
                    <span id="unit_clear" class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                        style="right: 2.2rem; display: none; z-index: 2;">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                        <i id="unit_arrow" class="fas fa-chevron-down"></i>
                    </span>
                </div>
                <input type="hidden" name="unit_id" id="unit_id" value="{{ old('unit_id') }}">
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
        const presentations = @json($presentations);
        const categories = @json($categories);
        const suppliers = @json($suppliers);
        const units = @json($units);
    </script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
@endsection
