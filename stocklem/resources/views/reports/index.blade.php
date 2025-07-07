@extends('templates.base')
@section('title', 'Reportes')
@section('header', 'Reportes')
@section('content')
<div class="card mb-4 shadow-sm border-0">
    <div class="card-header py-3 bg-white border-0">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fa-solid fa-boxes-stacked me-2"></i>
            Reporte general de artículos
        </h6>
        <p class="text-muted mb-0" style="font-size: 0.95rem;">
            Descarga el listado completo de artículos registrados en el sistema.
        </p>
    </div>
    <div class="card-body">
        <div class="mb-3">
            <span class="badge bg-success">Total artículos: {{ $articles->count() }}</span>
        </div>
        <a href="{{ route('reports.articles') }}" class="btn btn-danger btn-lg" title="PDF">
            <i class="fa-solid fa-file-pdf"></i> Descargar PDF
        </a>
    </div>
</div>

<hr class="my-4">

<div class="card mb-4 shadow-sm border-0">
    <div class="card-header py-3 bg-white border-0">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fa-solid fa-calendar-days me-2"></i>
            Reporte de entradas y salidas
        </h6>
        <p class="text-muted mb-0" style="font-size: 0.95rem;">
            Selecciona un rango de fechas para descargar el reporte de movimientos.
            <i class="fa-solid fa-circle-question text-secondary ms-1" data-bs-toggle="tooltip" title="El reporte incluirá todas las entradas y salidas entre las fechas seleccionadas."></i>
        </p>
    </div>
    <div class="card-body py-4">
        <form action="{{ route('reports.all_movements_date') }}" method="POST" class="row g-3 align-items-end">
            @csrf
            <div class="col-auto">
                <label for="start_date" class="form-label mb-0">Desde:</label>
                <input type="date" name="start_date" id="start_date" class="form-control" required>
            </div>
            <div class="col-auto">
                <label for="end_date" class="form-label mb-0">Hasta:</label>
                <input type="date" name="end_date" id="end_date" class="form-control" required>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-danger mb-0" title="PDF">
                    <i class="fa-solid fa-file-pdf"></i> Descargar PDF
                </button>
            </div>
        </form>
    </div>
</div>

<hr class="my-4">

<div class="card mb-4 shadow-sm border-0">
    <div class="card-header py-3 bg-white border-0">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fa-solid fa-barcode me-2"></i>
            Reporte de movimientos por artículo
        </h6>
        <p class="text-muted mb-0" style="font-size: 0.95rem;">
            Selecciona un artículo para descargar su historial de movimientos.
        </p>
    </div>
    <div class="card-body py-4">
        <form action="{{ route('reports.movements_article') }}" method="POST" class="row g-3 align-items-end">
            @csrf
            <div class="col-auto">
                <label for="id_article" class="form-label">Artículo:</label>
                <select name="id_article" id="id_article" class="form-control" required>
                    <option value="">Selecciona un artículo</option>
                    @foreach ($articles as $article)
                        <option value="{{ $article['id'] }}">{{ $article['name'] }}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-auto">
                <button type="submit" class="btn btn-danger mb-0" title="PDF">
                    <i class="fa-solid fa-file-pdf"></i> Descargar PDF
                </button>
            </div>
        </form>
    </div>
</div>

<script>
    // Activa tooltips de Bootstrap si usas Bootstrap 5+
    var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
    var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
        return new bootstrap.Tooltip(tooltipTriggerEl)
    })
</script>
@endsection
