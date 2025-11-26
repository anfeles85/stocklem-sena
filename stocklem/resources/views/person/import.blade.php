@extends('templates.base')
@section('title', 'Importar Personas')
@section('header', 'Importar Personas Masivamente')

@section('content')
    <div class="card">
        <div class="card-body">

            <div class="mb-4 p-3" style="background-color: #e6f7ff; border: 1px solid #b3e0ff; border-radius: 8px;">
                <p class="fw-bold">¡Instrucciones Importantes!</p>
                <ul class="list-disc list-inside ml-4">
                    <li>El archivo debe ser .xls o .xlsx.</li>
                    <li>La primera fila debe contener los encabezados exactos.</li>
                    <li class="fw-bold">Encabezados requeridos: <strong>documento, nombre, telefono</strong>.</li>
                    <li>Valores opcionales: <strong>telefono</strong> los demas campos son requeridos.</li>
                    <li>Si una persona con el mismo documento ya existe, será omitida.</li>
                </ul>
                <button onclick="document.getElementById('photoModal').showModal()" class="btn btn-success">
                    <i class="fas fa-eye"></i> Ver Ejemplo
                </button>
            </div>

            @if (session('loaded'))
                <div class="alert alert-success alert-dismissible fade show text-white" role="alert">
                    {{ session('loaded') }}
                </div>
            @endif

            @if (session('skipped') && count(session('skipped')) > 0)
                <div class="alert alert-warning alert-dismissible fade show text-white" role="alert">
                    <strong>Personas omitidas (ya existen):</strong>
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

            <form action="{{ route('person.import.run') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="file" class="form-label">Seleccionar Archivo (XLS, XLSX)</label>
                    <input type="file" name="file" id="file" class="form-control" accept=".xls,.xlsx" required>
                </div>

                <div class="row">
                    <div class="col-md-6 d-grid">
                        <button onclick="showLoading(); setTimeout(hideLoading, 3000)" type="submit" class="btn btn-success">
                            <i class="fas fa-upload me-2"></i> Importar Personas
                        </button>
                    </div>
                    <div class="col-md-6 d-grid">
                        <a href="{{ route('person.index') }}" class="btn btn-info">Cancelar</a>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <dialog id="photoModal" class="rounded shadow-lg" style="max-width: 90vw; max-height: 90vh; border: none;"
        onclick="if(event.target === this) this.close()">
        <div class="position-relative">
            <button onclick="document.getElementById('photoModal').close()"
                class="btn btn-close position-absolute top-0 end-0 m-2" style="z-index: 10;">
            </button>
            <img src="{{ asset('img/person-excel-example.png') }}" alt="person-excel-example" class="img-fluid rounded"
                style="max-width: 100%; max-height: 85vh; object-fit: contain; height:200px;">
        </div>
    </dialog>
@endsection
