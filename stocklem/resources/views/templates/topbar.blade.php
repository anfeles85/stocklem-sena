<nav class="navbar navbar-expand-lg navbar-main bg-sena shadow-none mb-4">
    <div class="container-fluid d-flex justify-content-between align-items-center py-2 px-3">
        <!-- Botón para abrir el sidebar en mobile -->
        <button class="btn btn-outline-light d-lg-none me-3" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars"></i>
        </button>
        <h3 class="mb-0 text-white fw-bold">@yield('header', 'Panel Principal')</h3>
        <div class="d-flex align-items-center">
            <span class="me-3 text-white fw-bold">
                {{ Auth::user()->name ?? 'Invitado' }}
            </span>
            <a href="#" class="btn btn-outline-light btn-sm">
                <i class="fa fa-sign-out-alt"></i> Salir
            </a>
        </div>
    </div>
</nav>