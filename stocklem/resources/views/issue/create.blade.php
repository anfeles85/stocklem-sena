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
                    <div class="col-md-4 mb-4">
                        <label for="date_issue">Fecha salida</label>
                        <input type="date" class="form-control" name="date_issue" id="date_issue" value="{{ $issue->date_issue }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="quantity">Cantidad</label>
                        <input type="number" class="form-control" name="quantity" id="quantity" value="{{ $issue->quantity }}" required>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="observations">Observaciones</label>
                        <input type="text" class="form-control" name="observations" id="observations" value="{{ $issue->observations }}" required>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-md-4 mb-4">
                        <label for="article_id">Articulo</label>
                        <select name="article_id" id="article_id" class="form-control form-select">
                            <option value="">Seleccione</option>
                            @foreach($articles as $article)
                                <option value="{{ $article->id }}"
                                    @if($article->id == $issue->article_id) selected @endif>
                                    {{ $article->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="person_id">Persona</label>
                        <select name="person_id" id="person_id" class="form-control form-select">
                            <option value="">Seleccione</option>
                            @foreach($persons as $person)
                                <option value="{{ $person->id }}" 
                                    @if($person->id == $issue->person_id) selected @endif>
                                    {{ $person->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-4 mb-4">
                        <label for="unit_id">Unidad</label>
                        <select name="unit_id" id="unit_id" class="form-control form-select">
                            <option value="">Seleccione</option>
                            @foreach($units as $unit)
                                <option value="{{ $unit->id }}" 
                                    @if($unit->id == $issue->unit_id) selected @endif>
                                    {{ $unit->name }}
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
                        <a href="{{ route('issue.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
         </div>
    </div>
@endsection
