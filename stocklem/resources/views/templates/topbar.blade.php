<header class="bg-sena text-white shadow-sm py-3 mb-4">
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-6 col-md-6">
                <nav aria-label="breadcrumb" class="d-flex align-items-center">
                    <!-- Mobile Menu Toggle - Solo visible en mobile -->
                    <button class="btn text-white d-lg-none me-3" type="button" data-bs-toggle="offcanvas" data-bs-target="#mobileSidebar">
                        <i class="fas fa-bars"></i>
                    </button>
                    <h3 class="mb-0 fw-bold">@yield('header')</h3>
                </nav>
            </div>
            <div class="col-6 col-md-6">
                <div class="d-flex justify-content-end align-items-center">
                    
                    <!-- User Menu -->
                    <div class="dropdown">
                        <button class="btn text-white d-flex align-items-center" type="button" data-bs-toggle="dropdown">
                            <i class="fas fa-user-circle me-2 fs-4"></i>
                            <span class="d-none d-md-inline">Usuario</span>
                            <i class="fas fa-chevron-down ms-2 small"></i>
                        </button>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Perfil</a></li>
                            <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Configuración</a></li>
                            <li><hr class="dropdown-divider"></li>
                            <li><a class="dropdown-item text-danger" href="#"><i class="fas fa-sign-out-alt me-2"></i>Cerrar Sesión</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>

<!-- Mobile Sidebar -->
<div class="offcanvas offcanvas-start bg-sena-dark text-white" tabindex="-1" id="mobileSidebar">
    <div class="offcanvas-header border-bottom border-secondary">
        <div class="text-center">
            <img src="{{ asset('img/stockclem-logo.png') }}" class="img-fluid mb-2" style="max-width: 60px;" alt="STOCKCLEM Logo">
            <h5 class="text-white mb-0">STOCKCLEM</h5>
        </div>
        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas"></button>
    </div>
    <div class="offcanvas-body">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link text-white py-3">
                    <i class="fas fa-home me-3"></i>Inicio
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white py-3">
                    <i class="fas fa-users me-3"></i>Usuarios
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white py-3">
                    <i class="fas fa-truck me-3"></i>Proveedores
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white py-3">
                    <i class="fas fa-warehouse me-3"></i>Inventario
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white py-3">
                    <i class="fas fa-route me-3"></i>Trazabilidad
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white py-3">
                    <i class="fas fa-chart-bar me-3"></i>Reportes
                </a>
            </li>
        </ul>
    </div>
</div>