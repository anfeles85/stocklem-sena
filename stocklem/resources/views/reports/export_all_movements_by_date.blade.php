@extends('templates.base_reports')
@section('header', 'Reporte de movimientos por fecha')
@section('content')
    <section id="result">
        @if (count($entries) !=0 || count($issues) != 0)

            <p>
                <strong>Fecha reporte: </strong>
                <br>
                <strong>Desde: {{ $start_date }} - Hasta: {{ $end_date }}</strong>
            </p>
            <br>
            <h3>Entradas</h3>
            <hr>
            <table class="reportTable">
                <thead>
                    <tr>
                        <th>Articulo</th>
                        <th>Codigo Sena</th>
                        <th>Fecha de entrada</th>
                        <th>fecha de expiración</th>
                        <th>Cantidad</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($entries as $entry)
                        <tr>      
                            <td>{{ $entry->article->name }}</td>
                            <td>{{ $entry->code_sena }}</td>
                            <td>{{ date('Y-m-d', strtotime($entry->date_entry)) }}</td>
                            <td>@if ($entry->expiration_date)
                                {{ date('Y-m-d', strtotime($entry->expiration_date)) }}
                            @endif</td>
                            <td>{{ $entry->quantity }}</td>
                            <td>@if ($entry->observations)
                            {{ $entry->observations }}
                            @endif</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr><br>
            <h3>Salidas</h3>
            <hr>
            <table class="reportTable">
                <thead>
                    <tr> 
                        <th>Articulo</th>
                        <th>Persona</th>
                        <th>Fecha de salida</th>
                        <th>Cantidad</th>
                        <th>Observaciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($issues as $issue)
                        <tr>
                            <td>{{ $issue->article->name }}</td>
                            <td>{{ $issue->person->name }}</td>      
                            <td>{{ date('Y-m-d', strtotime($issue->date_issue)) }}</td>
                            <td>{{ $issue->quantity }}</td>
                            <td>@if ($issue->observations)
                            {{ $issue->observations }}
                            @endif</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <hr><br>
        @else
            <p><strong>No existe ningún movimiento en la fecha indicada</strong></p>
        @endif
    </section>
@endsection