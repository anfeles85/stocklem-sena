@extends('templates.base_reports')
@section('header', 'Reporte general de artículos')
@section('content')
    <section id="results">
        @if ($articles->count() !=0 )
            <h3>Artículos</h3>
            <table class="reportTable">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Cantidad</th>
                        <th>Ficha técnica</th>
                        <th>Presentación</th>
                        <th>Categoría</th>
                        <th>Nombre proveedor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($articles as $article)
                        <tr>
                            <td>{{ $article->id }}</td>
                            <td>{{ $article->name }}</td>
                            <td>{{ $article->quantity }}</td>
                            <td>{{ $article->technical_sheet }}</td>
                            <td>{{ $article->presentation->description}}</td>
                            <td>{{ $article->category->name }}</td>
                            <td>{{ $article->supplier->name}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @else
            <p><strong>No existen artículos registrados.</strong></p>
        @endif
    </section>
@endsection