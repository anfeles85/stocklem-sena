@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte general de artículos</h6>
                </div>
                <div class="card-body">
                    <a href="{{ route('reports.articles') }}" class="btn btn-danger btn-block btn-lg col-lg-2" title="PDF">
                        <i class="fa-solid fa-file-pdf"></i>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-12 mb-4">
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">Reporte de movimientos por artículo</h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('reports.movements_article') }}" method="POST">
                        @csrf
                        <div class="row form-group">
                            <div class="col-lg-2">
                                <label for="technician_id">Artículo:</label>
                            </div>
                            <div class="col-lg-5">
                                <select name="id_article" id="id_article" class="form-control" required>
                                    <option value="">Selecciona un artículo</option>
                                    @foreach ($articles as $article)
                                        <option value="{{ $article['id'] }}">{{ $article['name'] }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-lg-5">
                                <button type="submit" class="btn btn-danger btn-block col-lg-3" title="PDF">
                                    <i class="fa-solid fa-file-pdf"></i>
                                </button>
                            </div>
                        </div>
                    </form>                     
                </div>
            </div>
        </div>
    </div>

@endsection
