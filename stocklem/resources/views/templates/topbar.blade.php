
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<nav class="navbar navbar-main navbar-expand-lg px-0 mx-4 shadow-none border-radius-xl custom-navbar bg-sena" id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <img src="{{ asset('img/sena-logo.png') }}" alt="logo-sena" width="70px" height="70px">
            <h3 class="ms-4 mb-0 text-white">
                @yield('header')
            </h3>
        </nav>
     

                    <li class="nav-item dropdown d-flex align-items-center">
    <a class="nav-link dropdown-toggle text-white font-weight-bold px-0" href="#" id="userDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        <i class="fa fa-user me-sm-1"></i>
        <span class="d-sm-inline d-none fs-6">Account</span>
    </a>
            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="userDropdown">
                <li>
                    <a class="dropdown-item" href="{{ route('auth.changePassword') }}">Cambiar contraseña</a>
                </li>
            </ul>

            <li class="nav-item d-xl-none ps-3 d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white p-0" id="iconNavbarSidenav">
                    <div class="sidenav-toggler-inner">
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                        <i class="sidenav-toggler-line bg-white"></i>
                    </div>
                </a>
            </li>
        </ul>
    </div>
</nav>