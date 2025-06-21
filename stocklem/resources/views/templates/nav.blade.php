<nav class="bg-sena-dark text-white d-none d-lg-block" style="width: 280px; min-height: 100vh; position: fixed; left: 0; top: 0; z-index: 1000;">
    <!-- Logo -->
    <div class="text-center py-4 border-bottom border-secondary">
        <img src="{{ asset('img/stockclem-logo.png') }}" class="img-fluid mb-3" style="max-width: 180px;" alt="STOCKCLEM Logo">
        <h4 class="text-white mb-0 fw-bold">STOCKCLEM</h4>
        <small class="text-white-50">Sistema de Inventario</small>
    </div>

    <!-- Navigation Menu -->
    <div class="py-3">
        <ul class="nav flex-column">
            <li class="nav-item">
                <a href="{{ route('index') }}" class="nav-link text-white d-flex align-items-center py-3 px-4 nav-link-hover">
                    <i class="fas fa-home me-3"></i>
                    <span>Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center py-3 px-4 nav-link-hover">
                    <i class="fas fa-users me-3"></i>
                    <span>Usuarios</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center py-3 px-4 nav-link-hover">
                    <i class="fas fa-truck me-3"></i>
                    <span>Proveedores</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center py-3 px-4 nav-link-hover">
                    <i class="fas fa-warehouse me-3"></i>
                    <span>Inventario</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center py-3 px-4 nav-link-hover">
                    <i class="fas fa-route me-3"></i>
                    <span>Trazabilidad</span>
                </a>
            </li>
            <li class="nav-item">
                <a href="#" class="nav-link text-white d-flex align-items-center py-3 px-4 nav-link-hover">
                    <i class="fas fa-chart-bar me-3"></i>
                    <span>Reportes</span>
                </a>
            </li>
        </ul>
    </div>
</nav>

<!-- Spacer for fixed sidebar - only on large screens -->
<div class="d-none d-lg-block" style="margin-left: 280px;">
    <!-- Content will be pushed here -->
</div>