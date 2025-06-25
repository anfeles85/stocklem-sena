@extends('templates.base')
@section('title', 'Crear entrada')
@section('header', 'Crear entrada')
@section('content')

<form action="{{ route('entry.store') }}" method="POST">
    @csrf
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="sena_code" class="form-label">Código SENA</label>
            <input type="text" name="sena_code" id="sena_code" class="form-control" required value="{{ old('sena_code') }}">
        </div>
        <div class="col-md-6">
            <label for="date" class="form-label">Fecha</label>
            <input type="date" name="date" id="date" class="form-control" required value="{{ old('date_entry') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="expiration_date" class="form-label">Fecha de vencimiento</label>
            <input type="date" name="expiration_date" id="expiration_date" class="form-control" required value="{{ old('expiration_date') }}">
        </div>
        <div class="col-md-6">
            <label for="quantity" class="form-label">Cantidad</label>
            <input type="number" name="quantity" id="quantity" class="form-control" required value="{{ old('quantity') }}">
        </div>
    </div>
    <div class="row mb-3">
        <div class="col-md-6 mb-3 mb-md-0">
            <label for="observations" class="form-label">Observaciones</label>
            <textarea name="observations" id="observations" class="form-control" rows="3">{{ old('observations') }}</textarea>
        </div>
        <div class="col-md-6">
             <label for="id_article" class="form-label">Artículo</label>
            <select name="id_article" id="id_article" class="form-control" required>
                <option value="">Seleccione un artículo</option>
                @foreach($articles as $article)
                    <option value="{{ $article->id }}" {{ old('id_article') == $article->id ? 'selected' : '' }}>
                        {{ $article->name }}
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
            <a href="{{ route('entry.index') }}" class="btn btn-danger">Cancelar</a>
        </div>
    </div>
</form>

@endsection
