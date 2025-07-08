<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>@yield('title', 'Reporte')</title>
    <link rel="stylesheet" href="{{ asset('css/reports.css') }}" type="text/css">
    @yield('head')
</head>
<body>
    <!-- Franja verde superior con logo SENA alineado a la derecha -->
    <div style=" width: 100%; padding: 12px 0; position: relative;">
        <img src="{{ asset('img/sena-logo.png') }}" alt="Sena logo" style="height: 60px; position: absolute; right: 32px; top: 12px;">
    </div>

    <!-- Logo Stocklem centrado debajo -->
    <div style="text-align: center; margin: 32px 0 0 0;">
        <img src="{{ asset('img/stockclem-logo.png') }}" alt="STOCKCLEM Logo" style="height: 80px;">
        <h4 style="color: #39a900; margin: 8px 0 0 0;">STOCKCLEM</h4>
    </div>

    <div style="text-align: center; margin-bottom: 16px;">
        <p style="font-size: 18px; font-weight: bold; margin: 0;">
            @yield('header')
        </p>
    </div>

    <section id="infoReport" style="margin-bottom: 16px;">
        <p style="font-size: 14px; margin:0;">
            <strong>Fecha reporte: </strong>
            @php
                $time = time();
                echo date('d-m-Y (H:i:s)', $time);
            @endphp
        </p>
    </section>

    <div class="report-container">
        @yield('content')
    </div>

    <footer id="version_text" style="text-align: center; margin-top: 32px;">
        <p style="margin: 0; font-size: 14px; font-style: italic;">&copy; {{ date('Y') }} Stocklem - Reporte generado automáticamente.</p>
    </footer>
</body>
</html>
