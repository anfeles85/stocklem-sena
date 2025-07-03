@extends('templates.base')
@section('title', 'Editar entrada')
@section('header', 'Editar entrada')
@section('content')
    @include('templates.validation_errors')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('entry.update', $entry->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-6 mb-4">
                        <label for="sena_code">Código SENA</label>
                        <input type="text" id="sena_code" name="sena_code" value="{{ old('sena_code', $entry->sena_code) }}"
                            class="form-control">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="date_entry">Fecha</label>
                        <input type="date" id="date_entry" name="date_entry" required
                            value="{{ old('date_entry', $entry->date_entry) }}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6 mb-4">
                        <label for="expiration_date">Fecha de vencimiento</label>
                        <input type="date" id="expiration_date" name="expiration_date"
                            value="{{ old('expiration_date', $entry->expiration_date) }}" class="form-control">
                    </div>
                    <div class="col-md-6 mb-4">
                        <label for="quantity">Cantidad</label>
                        <input type="number" id="quantity" name="quantity" required
                            value="{{ old('quantity', $entry->quantity) }}" class="form-control">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-md-6 mb-4">
                        <label for="observations">Observaciones</label>
                        <textarea id="observations" name="observations" class="form-control" rows="3">{{ old('observations', $entry->observations) }}</textarea>
                    </div>

                    <div class="col-md-6">
                        <label for="article_name" class="form-label">Artículo</label>
                        <div class="position-relative">
                            <input type="text" id="article_name" class="form-control pe-5" required
                                placeholder="Seleccione"
                                value="{{ old('article_name', $articles->firstWhere('value', $entry->article_id)['label'] ?? '') }}">
                            <span id="article_clear"
                                class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                                style="right: 2.2rem; display: none; z-index: 2;">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                                <i id="article_arrow" class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                        <input type="hidden" name="article_id" id="article_id"
                            value="{{ old('article_id', $entry->article_id) }}">
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('entry.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const articles = @json($articles);
    </script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
@endsection
