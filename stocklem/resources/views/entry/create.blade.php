@extends('templates.base')
@section('title', 'Crear entrada')
@section('header', 'Crear entrada')
@section('content')
    @include('templates.validation_errors')

    <form action="{{ route('entry.store') }}" method="POST">
        @csrf
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="sena_code" class="form-label">Código SENA</label>
                <input type="text" name="sena_code" id="sena_code" class="form-control" value="{{ old('sena_code') }}">
            </div>
            <div class="col-md-6">
                <label for="date_entry" class="form-label">Fecha</label>
                <input type="date" name="date_entry" id="date_entry" class="form-control" required
                    value="{{ old('date_entry') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="expiration_date" class="form-label">Fecha de vencimiento</label>
                <input type="date" name="expiration_date" id="expiration_date" class="form-control"
                    value="{{ old('expiration_date') }}">
            </div>
            <div class="col-md-6">
                <label for="quantity" class="form-label">Cantidad</label>
                <input type="number" name="quantity" id="quantity" class="form-control" required
                    value="{{ old('quantity') }}">
            </div>
        </div>
        <div class="row mb-3">
            <div class="col-md-6 mb-3 mb-md-0">
                <label for="observations" class="form-label">Observaciones</label>
                <textarea name="observations" id="observations" class="form-control" rows="3">{{ old('observations') }}</textarea>
            </div>
            <div class="col-md-6">
                <label for="article_name" class="form-label">Artículo</label>
                <div class="position-relative">
                    <input type="text" id="article_name" class="form-control pe-5" required placeholder="Seleccione">
                    <span id="article_clear" class="position-absolute top-50 translate-middle-y text-muted cursor-pointer"
                        style="right: 2.2rem; display: none; z-index: 2;">
                        <i class="fas fa-times"></i>
                    </span>
                    <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                        <i id="article_arrow" class="fas fa-chevron-down"></i>
                    </span>
                </div>
                <input type="hidden" name="article_id" id="article_id" value="{{ old('article_id') }}">
            </div>
        </div>

        <br>

        <div class="row">
            <div class="col-md-6 d-grid">
                <button type="submit" class="btn btn-success">Guardar</button>
            </div>
            <div class="col-md-6 d-grid">
                <a href="{{ route('entry.index') }}" class="btn btn-info">Cancelar</a>
            </div>
        </div>
    </form>
    <script>
        (function() {
            const inputEntry = document.getElementById('date_entry');
            if (!inputEntry.value) {
                const hoy = new Date().toISOString().split('T')[0];
                inputEntry.value = hoy;
            }
        })();
    </script>
@endsection

@section('scripts')
    <script>
        const articles = @json($articles);
    </script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
@endsection
