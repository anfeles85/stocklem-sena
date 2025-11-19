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
                        <label for="sena_code">Código SENA (opcional)</label>
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
                        <label for="article_id" class="form-label">Artículo</label>
                        <select name="article_id" id="article_id" class="form-control js-example-placeholder-single" required>
                            <option></option>
                            @foreach ($articles as $article)
                                <option value="{{ $article->id }}" @if (old('article_id', $entry->article_id) == $article->id) selected @endif>
                                    {{ $article->name }}
                                </option>
                            @endforeach
                        </select>
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

@push('scripts')
    <script src="{{ asset('js/select2.js') }}"></script>
@endpush
