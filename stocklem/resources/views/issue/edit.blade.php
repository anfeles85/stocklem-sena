@extends('templates.base')
@section('title', 'Editar salida')
@section('header', 'Editar salida')
@section('content')
    @include('templates.validation_errors')
    <div class="row">
        <div class="col-lg-12 mb-4">
            <form action="{{ route('issue.update', $issue->id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="row form-group">
                    <div class="col-md-4 mb-4">
                        <label for="date_issue">Fecha salida</label>
                        <input type="date" class="form-control" name="date_issue" id="date_issue"
                            value="{{ $issue->date_issue }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="quantity">Cantidad</label>
                        <input type="number" class="form-control" name="quantity" id="quantity"
                            value="{{ $issue->quantity }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="observations">Observaciones</label>
                        <input type="text" class="form-control" name="observations" id="observations"
                            value="{{ $issue->observations }}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-6">
                        <label for="article_name" class="form-label">Artículo</label>
                        <div class="position-relative">
                            <input type="text" id="article_name" class="form-control pe-5" required
                                placeholder="Seleccione"
                                value="{{ old('article_name', $articles->firstWhere('value', $issue->article_id)['label'] ?? '') }}">
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
                            value="{{ old('article_id', $issue->article_id) }}">
                    </div>
                    <div class="col-md-6">
                        <label for="person_name" class="form-label">Persona</label>
                        <div class="position-relative">
                            <input type="text" id="person_name" class="form-control pe-5" required
                                placeholder="Seleccione"
                                value="{{ old('person_name', $persons->firstWhere('value', $issue->person_id)['label'] ?? '') }}">
                            <span id="person_clear"
                                class="position-absolute top-50 translate-middle-y cursor-pointer text-muted"
                                style="right: 2.2rem; display: none; z-index: 2;">
                                <i class="fas fa-times"></i>
                            </span>
                            <span class="position-absolute top-50 translate-middle-y" style="right: 0.7rem; z-index: 1;">
                                <i id="person_arrow" class="fas fa-chevron-down"></i>
                            </span>
                        </div>
                        <input type="hidden" name="person_id" id="person_id"
                            value="{{ old('person_id', $issue->person_id) }}">
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mb-4 d-grid">
                        <button type="submit" class="btn btn-success">Guardar</button>
                    </div>
                    <div class="col-md-6 mb-4 d-grid">
                        <a href="{{ route('issue.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script>
        const articles = @json($articles);
        const persons = @json($persons);
    </script>
    <script src="{{ asset('js/autocomplete.js') }}"></script>
@endsection

