<nav class="navbar navbar-main navbar-expand-lg px-0  shadow-none custom-navbar bg-sena" id="navbarBlur"
    data-scroll="false">
    <div class="container-fluid py-1 px-3">
        <nav aria-label="breadcrumb" class="d-flex align-items-center">
            <a href="{{ route('index') }}" class="d-flex align-items-center text-decoration-none">
                <img src="{{ asset('img/sena-logo.png') }}" alt="logo-sena" width="70" height="70">
            </a>
            <h3 class="ms-3 mb-0 text-white">
                @yield('header')
            </h3>
        </nav>
        <ul class="navbar-nav  justify-content-end">
            <li class="nav-item d-flex align-items-center">
                <a href="javascript:;" class="nav-link text-white font-weight-bold px-0">
                    <i class="fa fa-user me-sm-1"></i>
                    <span class="d-sm-inline d-none fs-6">Sign In</span>
                </a>
            </li>
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
