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

                <div class="mt-4">
                    <p class="fw-bold">Especificaciones de los campos:</p>
                    <ul class="list-disc list-inside ml-4">
                        <li><strong>nombre:</strong> Nombre del artículo (entre 3 y 100 caracteres)</li>
                        <li><strong>cantidad:</strong> Cantidad inicial del artículo (número entero entre 1 y 9999999999)</li>
                        <li><strong>cantidad_minima:</strong> Cantidad mínima permitida (número entero mayor a 0)</li>
                        <li><strong>categoria:</strong> Nombre de la categoría del artículo</li>
                        <li><strong>proveedor:</strong> Nombre del proveedor del artículo</li>
                        <li><strong>presentacion:</strong> Descripción de la presentación del artículo</li>
                        <li><strong>unidad:</strong> Unidad de medida del artículo</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <p class="fw-bold">Ejemplo de estructura del archivo Excel:</p>
                    <div class="table-responsive mt-2">
                        <table class="table table-bordered table-striped">
                            <thead class="table-primary">
                                <tr>
                                    <th>nombre</th>
                                    <th>cantidad</th>
                                    <th>cantidad_minima</th>
                                    <th>categoria</th>
                                    <th>proveedor</th>
                                    <th>presentacion</th>
                                    <th>unidad</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Concentrado Lechones Iniciación</td>
                                    <td>500</td>
                                    <td>100</td>
                                    <td>Alimentos</td>
                                    <td>Contegral S.A.</td>
                                    <td>Bulto</td>
                                    <td>Kilogramos</td>
                                </tr>
                                <tr>
                                    <td>Vacuna Mycoplasma</td>
                                    <td>1000</td>
                                    <td>200</td>
                                    <td>Medicamentos</td>
                                    <td>MSD Salud Animal</td>
                                    <td>Frasco x100</td>
                                    <td>Dosis</td>
                                </tr>
                                <tr>
                                    <td>Desinfectante Virkon-S</td>
                                    <td>50</td>
                                    <td>10</td>
                                    <td>Bioseguridad</td>
                                    <td>Laboratorios CALIER</td>
                                    <td>Bolsa</td>
                                    <td>Kilogramos</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>

                <div class="mt-4">
                    <p class="fw-bold">Recomendaciones:</p>
                    <ul class="list-disc list-inside ml-4">
                        <li>Asegúrese de que los encabezados estén escritos exactamente como se muestra en el ejemplo.</li>
                        <li>Las cantidades deben ser números enteros positivos.</li>
                        <li>La cantidad mínima debe ser menor que la cantidad inicial.</li>
                        <li>Si una categoría, proveedor, presentación o unidad no existe, se creará automáticamente.</li>
                        <li>Los nombres de artículos deben ser únicos en el sistema.</li>
                        <li>Evite usar caracteres especiales en los nombres.</li>
                        <li>No incluya espacios antes o después de los datos.</li>
                    </ul>
                </div>

                <div class="mt-4">
                    <p class="fw-bold">Notas sobre la creación automática:</p>
                    <ul class="list-disc list-inside ml-4">
                        <li>Categorías nuevas: Se crearán con una descripción predeterminada.</li>
                        <li>Proveedores nuevos: Se crearán sin número de teléfono (puede actualizarlo después).</li>
                        <li>Presentaciones y unidades: Se crearán con el nombre exacto proporcionado.</li>
                    </ul>
                </div>
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
