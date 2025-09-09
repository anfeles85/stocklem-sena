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
                            <h3 class="form-title-sena">Iniciar Sesión</h3>
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

                        <form id="loginFormSena" class="user" action="{{ route('auth.login') }}" method="POST">
                            @csrf

                            <div class="form-group-sena">
                                <label for="email" class="form-label-sena">
                                    <i class="fas fa-envelope me-2"></i>
                                    Correo electrónico
                                </label>
                                <input type="email" name="email" id="email" class="form-control form-control-sena"
                                    placeholder="ejemplo@correo.com" value="{{ old('email') }}" required>
                            </div>

                            <div class="form-group-sena">
                                <label for="password" class="form-label-sena">
                                    <i class="fas fa-lock me-2"></i>
                                    Contraseña
                                </label>
                                <div class="input-group-sena">
                                    <input type="password" name="password" id="password"
                                        class="form-control form-control-sena" placeholder="Ingresa tu contraseña"
                                        required>
                                    <button type="button" class="toggle-password-sena" data-target="password">
                                        <i class="fas fa-eye"></i>
                                    </button>
                                </div>
                            </div>

                            <div class="form-group-sena">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                    <label class="custom-control-label" for="remember">Recordar contraseña</label>
                                </div>
                            </div>

                            <div class="form-group-sena text-end">
                                <a href="{{ route('auth.forget-password') }}" class="forgot-password-link">
                                    ¿Olvidaste tu contraseña?
                                </a>
                            </div>

                            <div class="form-group text-center"
                                style="display: flex; justify-content: center; align-items: center; margin: 5px 0; padding: 5px;">
                                {!! NoCaptcha::renderJs() !!}
                                {!! NoCaptcha::display(['data-theme' => 'light']) !!}
                            </div>

                            <button type="submit" class="btn btn-success-sena mt-4">
                                <i class="fas fa-sign-in-alt me-2"></i>
                                Iniciar Sesión
                            </button>

                        </form>
                    </div>
                </div>
            </div>
        </div>

        <div class="help-container">
            <button class="btn btn-success btn-lg rounded-circle shadow" type="button">
                <i class="fas fa-question"></i>
            </button>
            <span class="help-message">
                Si tienes problemas para iniciar sesión, por favor
                <a href=" {{ route('help') }} ">visita nuestra pagina de ayuda</a>.
            </span>
        </div>

    </div>
    <script src="{{ asset('js/change-password.js') }}"></script>
</body>

</html>