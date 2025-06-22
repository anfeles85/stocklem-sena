<nav id="sidebarMenu" class="d-lg-block bg-sena-dark sidebar collapse position-fixed h-100" style="width: 260px; z-index: 1040;">
    <div class="text-center py-4 border-bottom border-secondary">
        <img src="{{ asset('img/stockclem-logo.png') }}" class="img-fluid mb-2" style="max-width: 120px;" alt="STOCKCLEM Logo">
        <h4 class="text-white mb-0 fw-bold">STOCKCLEM</h4>
        <small class="text-white-50">Sistema de Inventario</small>
    </div>
    <ul class="nav flex-column mt-3">
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-home"></i>
                </div>
                <span>Inicio</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('person.index') }}" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-user-friends"></i>
                </div>
                <span>Personas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="{{ route('supplier.index') }}" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-truck"></i>
                </div>
                <span>Proveedores</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-box-open"></i>
                </div>
                <span>Artículos</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-tags"></i>
                </div>
                <span>Categorías</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-cubes"></i>
                </div>
                <span>Presentaciones</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-arrow-down"></i>
                </div>
                <span>Entradas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-arrow-up"></i>
                </div>
                <span>Salidas</span>
            </a>
        </li>
        <li class="nav-item">
            <a href="#" class="nav-link text-white d-flex align-items-center px-4 py-2 nav-link-hover">
                <div class="me-3 d-flex align-items-center justify-content-center" style="width: 28px;">
                    <i class="fas fa-weight-hanging"></i>
                </div>
                <span>Unidades</span>
            </a>
        </li>
    </ul>
</nav>