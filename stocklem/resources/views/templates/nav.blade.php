<aside class="sidenav navbar navbar-vertical navbar-expand-xs border-0 border-radius-xl my-3 fixed-start ms-3 bg-sena-light shadow p-3" id="sidenav-main">
    <div class="sidenav-header">
        <i class="fas fa-times p-3 cursor-pointer text-sena-light opacity-5 position-absolute end-0 top-0 d-none d-xl-none" aria-hidden="true" id="iconSidenav"></i>
        <a class="navbar-brand m-3 d-flex flex-column align-items-center" href="#">
            <img src="{{ asset('img/stockclem-logo.png') }}" class="img-fluid navbar-brand-img mb-2" style="max-height: 100px;" alt="STOCKCLEM Logo">
            <h4 class="text-sena mb-0 fw-bold">STOCKCLEM</h4>
            <small class="text-sena-light">Sistema de Inventario</small>
        </a>
    </div>
    <hr class="horizontal dark mt-0">
    <div class="collapse navbar-collapse w-auto" id="sidenav-collapse-main">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('index') ? 'active' : '' }} text-sena-light" href="{{ route('index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-home text-sena-light text-sm opacity-10 {{ request()->routeIs('index') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('index') ? 'active-text' : '' }}">Inicio</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('person.*') ? 'active' : '' }} text-sena-light" href="{{ route('person.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-user-friends text-sena-light text-sm opacity-10 {{ request()->routeIs('person.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('person.*') ? 'active-text' : '' }}">Personas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('supplier.*') ? 'active' : '' }} text-sena-light" href="{{ route('supplier.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-truck text-sena-light text-sm opacity-10 {{ request()->routeIs('supplier.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('supplier.*') ? 'active-text' : '' }}">Proveedores</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('article.*') ? 'active' : '' }} text-sena-light" href="{{ route('article.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-box-open text-sena-light text-sm opacity-10 {{ request()->routeIs('article.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('article.*') ? 'active-text' : '' }}">Artículos</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('category.*') ? 'active' : '' }} text-sena-light" href="{{ route('category.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-tags text-sena-light text-sm opacity-10 {{ request()->routeIs('category.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('category.*') ? 'active-text' : '' }}">Categorías</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('presentation.*') ? 'active' : '' }} text-sena-light" href="{{ route('presentation.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-cubes text-sena-light text-sm opacity-10 {{ request()->routeIs('presentation.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('presentation.*') ? 'active-text' : '' }}">Presentaciones</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('entry.*') ? 'active' : '' }} text-sena-light" href="{{ route('entry.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-down text-sena-light text-sm opacity-10 {{ request()->routeIs('entry.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('entry.*') ? 'active-text' : '' }}">Entradas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('issue.*') ? 'active' : '' }} text-sena-light" href="{{ route('issue.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-arrow-up text-sena-light text-sm opacity-10 {{ request()->routeIs('issue.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('issue.*') ? 'active-text' : '' }}">Salidas</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('unit.*') ? 'active' : '' }} text-sena-light" href="{{ route('unit.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-weight-hanging text-sena-light text-sm opacity-10 {{ request()->routeIs('unit.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('unit.*') ? 'active-text' : '' }}">Unidades</span>
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link {{ request()->routeIs('reports.*') ? 'active' : '' }} text-sena-light" href="{{ route('reports.index') }}">
                    <div class="icon icon-shape icon-sm border-radius-md text-center me-2 d-flex align-items-center justify-content-center">
                        <i class="fas fa-file-pdf text-sena-light text-sm opacity-10 {{ request()->routeIs('reports.*') ? 'active-icon' : '' }}"></i>
                    </div>
                    <span class="nav-link-text ms-1 fs-6 {{ request()->routeIs('reports.*') ? 'active-text' : '' }}">Reportes</span>
                </a>
            </li>
        </ul>
    </div>
</aside>