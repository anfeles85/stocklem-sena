@extends('templates.base')
@section('title', 'Crear salida')
@section('header', 'Crear salida')
@section('content')
@include('templates.validation_errors')
<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('issue.store') }}" method="POST">
            @csrf
            <div class="row form-group">
                <div class="col-md-3 mb-3">
                    <label for="sena_code">Código SENA (opcional)</label>
                    <input type="text" class="form-control" name="sena_code" id="sena_code"
                        value="{{ old('sena_code') }}" placeholder="Ej: SEN123456">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="date_issue">Fecha salida</label>
                    <input type="date" class="form-control" name="date_issue" id="date_issue"
                        value="{{ old('date_issue') }}" required>
                </div>
                <div class="col-md-3 mb-3">
                    <label for="quantity">Cantidad</label>
                    <input type="number" class="form-control" name="quantity" id="quantity"
                        value="{{ old('quantity') }}" required placeholder="Ej: 5">
                </div>
                <div class="col-md-3 mb-3">
                    <label for="observations">Observaciones</label>
                    <input type="text" class="form-control" name="observations" id="observations"
                        value="{{ old('observations') }}" required placeholder="Motivo de la salida">
                </div>
            </div>

            {{-- Articulo y persona --}}
            <div class="row form-group">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="article_id" class="form-label">Artículo</label>
                        <select name="article_id" id="article_id" class="form-control js-example-placeholder-single"
                            required>
                            <option></option>
                            @foreach ($articles as $article)
                            <option value="{{ $article->id }}" @if (old('article_id')==$article->id) selected @endif>
                                {{ $article->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-6">
                        <label for="person_id" class="form-label">Persona</label>
                        <select name="person_id" id="person_id" class="form-control js-example-placeholder-single"
                            required>
                            <option></option>
                            @foreach ($persons as $person)
                            <option value="{{ $person->id }}" @if (old('person_id')==$person->id) selected @endif>
                                {{ $person->name }}
                            </option>
                            @endforeach
                        </select>
                    </div>
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

@push('scripts')
    <script src="{{ asset('js/select2.js') }}"></script>
@endpush