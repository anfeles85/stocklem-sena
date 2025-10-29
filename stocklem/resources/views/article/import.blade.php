@extends('templates.base')
@section('title', 'Importar Artículos')
@section('header', 'Importar Artículos Masivamente')

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="mb-4 p-3" style="background-color: #e6f7ff; border: 1px solid #b3e0ff; border-radius: 8px;">
                <p class="fw-bold">¡Instrucciones Importantes!</p>
                <ul class="list-disc list-inside ml-4">
                    <li>El archivo debe ser .xls o .xlsx.</li>
                    <li>La primera fila debe contener los encabezados exactos.</li>
                    <li class="fw-bold">Encabezados requeridos: <strong>nombre, cantidad, cantidad_minima, categoria,
                            proveedor, presentacion, unidad</strong>.</li>
                    <li><strong>Si la categoría, proveedor, presentación o unidad no existe, se creará
                            automáticamente.</strong></li>
                    <li>Si ya existen en el sistema, se usarán los registros existentes.</li>
                </ul>
            </div>

            @if (session('loaded'))
                <div class="alert alert-success alert-dismissible fade show text-white"  role="alert">
                    {{ session('loaded') }}
                </div>
            @endif

            @if (session('skipped') && count(session('skipped')) > 0)
                <div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                    <strong>Artículos omitidos (ya existen):</strong>
                    <ul class="mb-0 mt-2">
                        @foreach (array_slice(session('skipped'), 0, 5) as $name)
                            <li>{{ $name }}</li>
                        @endforeach
                        @if (count(session('skipped')) > 5)
                            <li><em>y {{ count(session('skipped')) - 5 }} más...</em></li>
                        @endif
                    </ul>
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif

            @error('file')
                <div class="alert alert-danger alert-dismissible fade show " role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @enderror

            @if (session('grouped_errors'))
                <div class="alert alert-danger text-white" role="alert">
                    <p class="fw-bold fs-5 mb-3">Se encontraron errores en el archivo:</p>

                    @foreach (session('grouped_errors') as $column => $data)
                        <div class="mb-3">
                            <strong class="text-white">{{ ucfirst($column) }}:</strong>
                            {{ $data['message'] }}
                            <br>
                            <small class="text-white">
                                Filas afectadas: {{ implode(', ', array_slice($data['rows'], 0, 10)) }}
                                @if (count($data['rows']) > 10)
                                    y {{ count($data['rows']) - 10 }} más...
                                @endif
                            </small>
                        </div>
                    @endforeach

                    <p class="mt-3 mb-0 text-white">
                        <strong>Total de errores:</strong>
                        {{ array_sum(array_map(fn($e) => count($e['rows']), session('grouped_errors'))) }} filas con
                        problemas
                    </p>
                </div>
            @endif

            @if (session('error'))
                <div class="alert alert-danger alert-dismissible fade show text-white" role="alert">
                    {{ session('error') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                </div>
            @endif


            <form action="{{ route('article.import.run') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file" class="form-label">Seleccionar Archivo (XLS, XLSX)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".xls,.xlsx" required>
                </div>

                <div class="row">
                    <div class="col-md-6 d-grid">
                        <button type="submit" class="btn btn-success">
                        <i class="fas fa-upload me-2"></i> Importar Artículos
                        </button>
                    </div>
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('article.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
