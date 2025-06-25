@extends('templates.base')
@section('title', 'Editar entrada')
@section('header', 'Editar entrada')
@section('content')

@include('templates.validation_errors')

<div class="row">
    <div class="col-lg-12 mb-4">
        <form action="{{ route('entry.update', $entry['id']) }}" method="POST">
            @csrf
            @method('PUT')
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="sena_code">Código SENA</label>
                    <input type="text" id="sena_code" name="sena_code" required value="{{ $entry['sena_code'] }}"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="date">Fecha</label>
                    <input type="date" id="date" name="date" required value="{{ $entry['date_entry'] }}"
                        class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="expiration_date">Fecha de vencimiento</label>
                    <input type="date" id="expiration_date" name="expiration_date" required value="{{ $entry['expiration_date'] }}"
                        class="form-control">
                </div>
                <div class="col-md-6 mb-4">
                    <label for="quantity">Cantidad</label>
                    <input type="number" id="quantity" name="quantity" required value="{{ $entry['quantity'] }}"
                        class="form-control">
                </div>
            </div>
            <div class="row form-group">
                <div class="col-md-6 mb-4">
                    <label for="observations">Observaciones</label>
                    <textarea id="observations" name="observations" class="form-control" rows="3">{{ $entry['observations'] }}</textarea>
                </div>
                <div class="col-md-6 mb-4">
                    <label for="id_article">Artículo</label>
                    <select id="id_article" name="id_article" required class="form-control">
                        <option value="">Seleccione un artículo</option>
                        @foreach($articles as $article)
                            <option value="{{ $article->id }}" {{ (old('id_article', $entry['id_article']) == $article->id) ? 'selected' : '' }}>
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