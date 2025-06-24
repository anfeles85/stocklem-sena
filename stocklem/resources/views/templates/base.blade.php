<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" type="image/png" href="{{ asset('img/stockclem-logo.png') }}">
    <title>@yield('title') - STOCKCLEM</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="{{ asset('css/custom.css') }}" rel="stylesheet">
</head>

<body class="bg-light">
    <div class="d-flex">
        <!-- Sidebar -->
        @include('templates.nav')

        <!-- Main Content -->
        <div class="flex-fill" style="margin-left: 260px;">
            <!-- Top Bar -->
            @include('templates.topbar')

            <!-- Page Content -->
            <main class="container-fluid p-4">
                <div class="row">
                    <div class="col-12">
                        @yield('content')
                    </div>
                </div>
            </main>

            <!-- Footer -->
            @include('templates.footer')
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <!-- SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="{{ asset('utils/alertMessages.js') }}"></script>

    @if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: '¡OK!',
            text: '{{ session("success") }}',
            confirmButtonColor: '#3085d6',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @if(session('error'))
    <script>
        Swal.fire({
            icon: 'error',
            title: '¡Error!',
            text: '{{ session("error") }}',
            confirmButtonColor: '#d33',
            confirmButtonText: 'OK'
        });
    </script>
    @endif

    @yield('scripts')
</body>

</html>