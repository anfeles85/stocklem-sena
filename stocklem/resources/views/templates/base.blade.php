<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="icon" type="image/png" href="{{ asset('img/sena-logo.png') }}">
  <title>@yield('title')</title>

  <!-- Fonts and icons -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-icons.css" rel="stylesheet" />
  <link href="https://demos.creative-tim.com/argon-dashboard-pro/assets/css/nucleo-svg.css" rel="stylesheet" />  

  <!-- CSS Files -->
  <link id="pagestyle" href="{{ asset('css/argon-dashboard.css?v=2.1.0') }}" rel="stylesheet" />
  <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
  <link rel="stylesheet" href="https://cdn.datatables.net/2.0.0/css/dataTables.dataTables.css ">
</head>

<body class="g-sidenav-show d-flex flex-column min-vh-100">
  
  <!-- Sidebar -->
  @include('templates.nav')

  <!-- Contenido principal -->
  <main class="main-content position-relative border-radius-lg flex-fill d-flex flex-column">
    
    @include('templates.topbar')

    <div class="container-fluid py-4 flex-fill">
      <div class="row">
        <div class="col-12">
          @yield('content')
        </div>
      </div>
    </div>

    @include('templates.footer')

  </main>

  <!-- Scripts -->
  <script src="{{ asset('js/core/popper.min.js') }}"></script>
  <script src="{{ asset('js/core/bootstrap.min.js') }}"></script>
  <script src="{{ asset('js/plugins/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ asset('js/plugins/smooth-scrollbar.min.js') }}"></script>
  <script src="https://code.jquery.com/jquery-3.7.1.min.js "></script>
  <script src="https://cdn.datatables.net/2.0.0/js/dataTables.js "></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/js/all.min.js"></script>
  <script src="{{ asset('js/argon-dashboard.min.js?v=2.1.0')}}"></script>
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="{{ asset('utils/alertMessages.js') }}"></script>

  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>

  @if(session('success'))
  <script>
    showSuccess('{{ session("success") }}');
  </script>
  @endif

  @if(session('error'))
  <script>
    showError('{{ session("error") }}');
  </script>
  @endif

  @yield('scripts')
</body>

</html>
