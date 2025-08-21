<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesión</title>
    <!-- Custom fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
    <link rel="stylesheet" href="{{ asset('css/change-password.css') }}">
</head>

<body class="password-change-container">
    <div class="password-change-wrapper">
        <div class="card password-change-card">
            <div class="row no-gutters">
                <!-- Logo Section -->
                <div class="col-md-5">
                    <div class="logo-section-sena">
                        <div class="sena-logo-container">
                            <img src="{{ asset('img/stockclem-logo.png') }}" alt="Logo CLEM" class="sena-logo-img">
                        </div>
                    </div>
                </div>

                <div class="col-md-7">
                    <div class="form-section-sena">
                        <div class="form-header-sena">
                            <h3 class="form-title-sena">Restablecer contraseña</h3>
                            <p class="form-subtitle-sena">Ingresa tus credenciales para acceder al sistema</p>
                        </div>

                        @if (session('success'))
                        <div class="alert-success-sena" id="successAlert">
                            <i class="fas fa-check-circle me-2"></i>
                            {{ session('success') }}
                        </div>
                        @endif

                        @if (session('error'))
                        <div class="alert-danger-sena" id="errorAlert">
                            <i class="fas fa-exclamation-circle me-2"></i>
                            {{ session('error') }}
                        </div>
                        @endif

                        @include('templates.validation_errors')

                        <form id="loginFormSena" class="user" action="{{ route('auth.forget-password') }}" method="POST">
                            @csrf
                            <div class="form-group-sena">
                                <label for="email" class="form-label-sena">
                                    <i class="fas fa-envelope me-2"></i>
                                    Correo electrónico
                                </label>
                                <input type="email" name="email" id="email" class="form-control form-control-sena"
                                    placeholder="ejemplo@correo.com" required>
                            </div>

                            <div class="form-group-sena text-end">
                                <a href="{{ route('auth.change_password') }}" class="forget-password-link">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>

                            <button type="submit" class="btn btn-success-sena mt-4">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                enviar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="{{ asset('js/change-password.js') }}"></script>
</body>

</html>