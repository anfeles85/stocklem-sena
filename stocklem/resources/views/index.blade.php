@extends('templates.base')
@section('title', 'Bienvenid@ a Stock-CLEM')
@section('header', 'Bienvenid@ a Stock-CLEM')
@section('content')

    <div class="row mb-4 g-3">
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-box-open fa-2x text-sena"></i>
                    </div>
                    <h5 class="card-title">Articulos</h5>
                    <h2 class="fw-bold">{{ $articles->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-arrow-down fa-2x text-sena"></i>
                    </div>
                    <h5 class="card-title">Entradas</h5>
                    <h2 class="fw-bold">{{ $entries->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fas fa-arrow-up fa-2x text-sena"></i>
                    </div>
                    <h5 class="card-title">Salidas</h5>
                    <h2 class="fw-bold">{{ $issues->count() }}</h2>
                </div>
            </div>
        </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
            <div class="card text-center shadow-sm">
                <div class="card-body">
                    <div class="mb-2">
                        <i class="fa fa-truck fa-2x text-sena"></i>
                    </div>
                    <h5 class="card-title">Proveedores</h5>
                    <h2 class="fw-bold">{{ $suppliers->count() }}</h2>
                </div>
            </div>
        </div>
    </div>

    <div class="row mt-5">
        <!-- Doughnut Chart: Estado del Stock -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title">Distribución del Stock</h6>
                    <canvas id="stockChart" height="200"></canvas>
                </div>
            </div>
        </div>

        <!-- Bar Chart: Entradas vs Salidas Mensuales -->
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body text-center">
                    <h6 class="card-title">Movimientos Mensuales</h6>
                    <canvas id="monthMovement" height="300"></canvas>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 mt-5 text-center">
        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Entradas</h6>
                    <table class="table table-sm table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>Codigo SENA</th>
                                <th>Fecha</th>
                                <th>cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($entries->take(5) as $entry)
                                <tr>
                                    <td>{{ $entry->sena_code }}</td>
                                    <td>{{ $entry->date_entry }}</td>
                                    <td>{{ number_format($entry->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Salidas</h6>
                    <table class="table table-sm table-bordered mb-0">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Fecha</th>
                                <th>cantidad</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($issues->take(5) as $issue)
                                <tr>
                                    <td>{{ $issue->id }}</td>
                                    <td>{{ $issue->date_issue }}</td>
                                    <td>{{ number_format($issue->quantity, 0, ',', '.') }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="row mb-4 mt-5">
        <div class="col-12 col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Stock de articulos</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Cantidad</th>
                                    <th>Estado de stock</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($articles->take(5) as $article)
                                    <tr>
                                        <td>{{ $article->name }}</td>
                                        <td>{{ number_format($article->quantity, 0, ',', '.') }}</td>
                                        <td>
                                            @if ($article->quantity >= 1000)
                                                <span class="badge bg-success">Stock suficiente</span>
                                            @elseif($article->quantity >= 100)
                                                <span class="badge bg-warning">Próximo a agotarse</span>
                                            @else
                                                <span class="badge bg-danger">Reabastecer</span>
                                            @endif
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-lg-6 mb-4">
            <div class="card shadow-sm">
                <div class="card-body">
                    <h6 class="card-title">Top 5 Proveedores con más artículos</h6>
                    <div class="table-responsive">
                        <table class="table table-sm table-bordered mb-0">
                            <thead class="table-light">
                                <tr>
                                    <th>Nombre</th>
                                    <th>Teléfono</th>
                                    <th>Total de artículos</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($topSuppliers as $suppliers)
                                    <tr>
                                        <td>{{ $suppliers->name }}</td>
                                        <td>{{ $suppliers->phone }}</td>
                                        <td>{{ $suppliers->total_articles }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        window.stockLevelsData = [
            {{ $chartData['stockLevels']['sufficient'] }},
            {{ $chartData['stockLevels']['warning'] }},
            {{ $chartData['stockLevels']['danger'] }}
        ];

        window.entriesPerMonth = [
            @for ($i = 1; $i <= 12; $i++)
                {{ $chartData['monthlyEntries'][$i] ?? 0 }},
            @endfor
        ];

        window.issuesPerMonth = [
            @for ($i = 1; $i <= 12; $i++)
                {{ $chartData['monthlyIssues'][$i] ?? 0 }},
            @endfor
        ];
    </script>
@endsection
