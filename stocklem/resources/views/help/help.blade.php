<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Ayuda - Stock Clem</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" />

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">

    <style>
body {
    font-family: 'Poppins', sans-serif;
    background-color: #f4f7f6;
    display: flex;
    flex-direction: column;
    min-height: 100vh;
}
main {
    flex: 1;
}
.navbar, footer {
    background: linear-gradient(45deg, #28a745, #218838);
}
.help-item {
    display: block;
    padding: 1.5rem;
    border-radius: 0.75rem;
    transition: all 0.2s ease-in-out;
    text-decoration: none;
    color: inherit;
    border: 1px solid #eee;
}
.help-item:hover {
    transform: translateY(-5px);
    background-color: #ffffff;
    box-shadow: 0 8px 25px rgba(0,0,0,0.08);
    border-color: transparent;
}
.help-item .icon-circle {
    width: 50px;
    height: 50px;
    background-color: rgba(40, 167, 69, 0.1);
    color: var(--sena-green);
}
.role-header {
    border-bottom: 1px solid #eee;
}</style>
</head>
<body>

 <header>
        <nav class="navbar navbar-dark shadow-sm" style="background: linear-gradient(45deg, #28a745, #218838);">
            <div class="container-fluid">
                <a class="navbar-brand d-flex align-items-center" href="{{ route('index') }}">
                    <img src="{{ asset('img/stockclem-logo.png') }}" alt="Logo Stock Clem" height="40" class="me-3">
                    <div>
                        <span class="fw-bold fs-5">STOCKCLEM</span>
                        <small class="d-block text-white-50" style="font-size: 0.7rem; margin-top: -5px;">Sistema de Inventario</small>
                    </div>
                </a>
            </div>
        </nav>
    </header>

    <main class="container py-5">
        <div class="card border-0 shadow-lg rounded-4">
            <div class="card-body p-4 p-md-5">
                <div class="text-center mb-5">
                    <h1 class="card-title fw-bold">Manual de Ayuda</h1>
                    <p class="text-muted">
                        Selecciona un tema para ver la guía correspondiente.
                    </p>
                </div>

                <div class="list-group list-group-flush">
                    <a href="{{ asset('manuals/manual_iniciar_sesion.pdf') }}" target="blank" class="help-item list-group-item-action mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-right-to-bracket fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-semibold">¿Cómo iniciar sesión?</h5>
                                <small class="text-muted">Guía para acceder al sistema</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto text-muted"></i>
                        </div>
                    </a>
                    <a href="{{ asset('manuals/manual_recuperar_contraseña.pdf') }}" target="blank" class="help-item list-group-item-action mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-key fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-semibold">¿Cómo recuperar contraseña?</h5>
                                <small class="text-muted">Pasos para restablecer tu acceso</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto text-muted"></i>
                        </div>
                    </a>
                </div>

                <div class="role-header mt-5 pt-3 mb-4 d-flex align-items-center">
                    <i class="fas fa-user-shield fa-2x text-success me-3"></i>
                    <h3 class="fw-bold mb-0">Rol de Administrador</h3>
                </div>
                <div class="list-group list-group-flush">
                    <a href="{{ asset('manuals/manual_gestión_usuarios.pdf') }}" class="help-item list-group-item-action mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-users-cog fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-semibold">Gestionar Usuarios</h5>
                                <small class="text-muted">Crear, editar y eliminar cuentas de usuario</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto text-muted"></i>
                        </div>
                    </a>
                </div>

                <div class="role-header mt-5 pt-3 mb-4 d-flex align-items-center">
                    <i class="fas fa-user-tie fa-2x text-success me-3"></i>
                    <h3 class="fw-bold mb-0">Rol de Coordinador Administrativo</h3>
                </div>
                <div class="list-group list-group-flush">
                     <a href="{{ asset('manuals/manual_aprobar_solicitudes.pdf') }}" class="help-item list-group-item-action mb-3">
                        <div class="d-flex align-items-center">
                            <div class="icon-circle rounded-circle d-flex align-items-center justify-content-center me-3">
                                <i class="fas fa-tasks fa-lg"></i>
                            </div>
                            <div>
                                <h5 class="mb-0 fw-semibold">Aprobar Solicitudes</h5>
                                <small class="text-muted">Gestionar las solicitudes de inventario</small>
                            </div>
                            <i class="fas fa-chevron-right ms-auto text-muted"></i>
                        </div>
                    </a>
                </div>

            </div>
        </div>
    </main>

    <footer class="text-white text-center p-3">
        <div class="container">
            © {{ date('Y') }} Stock Clem - Todos los derechos reservados.
        </div>
    </footer>

</body>
</html>