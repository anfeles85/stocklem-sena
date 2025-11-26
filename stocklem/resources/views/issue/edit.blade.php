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
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <label for="sena_code">Código SENA (opcional)</label>
                            <input type="text" id="sena_code" name="sena_code"
                                value="{{ old('sena_code', $issue->sena_code) }}" class="form-control" placeholder="Ej: SEN123456">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="date_issue">Fecha salida</label>
                            <input type="date" class="form-control" name="date_issue" id="date_issue"
                                value="{{ $issue->date_issue }}" required>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col-md-6 mb-2">
                            <label for="quantity">Cantidad</label>
                            <input type="number" class="form-control" name="quantity" id="quantity"
                                value="{{ $issue->quantity }}" required placeholder="Ej: 5">
                        </div>
                        <div class="col-md-6 mb-2">
                            <label for="observations">Observaciones</label>
                            <input type="text" class="form-control" name="observations" id="observations"
                                value="{{ $issue->observations }}" required placeholder="Motivo de la salida">
                        </div>
                    </div>
                </div>
            {{-- Articulo y persona --}}
            <div class="row form-group">
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="article_id" class="form-label">Articulo</label>
                        <select name="article_id" id="article_id" class="form-control js-example-placeholder-single"
                            required>
                            <option></option>
                            @foreach ($articles as $article)
                            <option value="{{ $article->id }}" @if (old('article_id', $issue->article_id) == $article->id) selected @endif>
                                {{ $article->name }} - {{ $article->presentation->description ?? 'Sin presentación' }}
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
                                    <option value="{{ $person->id }}" @if (old('person_id', $issue->person_id) == $person->id) selected @endif>
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
