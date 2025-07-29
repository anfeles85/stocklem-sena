<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cambio de contraseña</title>

    <!-- Custom fonts -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet" />
    <link href="{{ asset('css/sb-admin-2.min.css') }}" rel="stylesheet"> 
    <link rel="stylesheet" href="{{ asset('css/custom.css') }}">
</head>
<body class="bodychangepassword">

    <div class="container py-5">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card card-custom">
                    <div class="row no-gutters">
                        <div class="col-md-5 bg-white d-flex flex-column align-items-center justify-content-center position-relative">
                            <img src="{{ asset('img/stockclem-logo.png') }}" alt="Logo CLEM" class="sena-logo">

                            <a href="{{ route('index') }}" class="btn btn-primary btn-outline-secondary btn-sm button-under-logo">
                                Volver
                            </a>
                        </div>
                        <div class="col-md-7">
                            <div class="form-section">
                                <div class="card-header-custom">
                                    <h3 class="mb-0">Cambio de contraseña</h3>
                                </div>

                                <div class="p-3">
                                    @include('templates.validation_errors')

                                    <form class="user" action="{{ route('auth.changePassword') }}" method="POST">
                                        @csrf

                                        <div class="form-group">
                                            <label for="email">Correo electrónico</label>
                                            <input type="email" name="email" id="email"
                                                class="form-control" placeholder="Correo electrónico" value="{{ old('email') }}" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Nueva contraseña</label>
                                            <input type="password" name="password" id="password"
                                                class="form-control" placeholder="Contraseña" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="current_password">Confirmar nueva contraseña</label>
                                            <input type="password" name="current_password" id="current_password"
                                                class="form-control" placeholder="Confirmar contraseña" required>
                                        </div>

                                        <input type="hidden" name="role_id" value="2">

                                        <button type="submit" class="btn btn-primary btn-block mt-4">Cambiar Contraseña</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div> <!-- end row -->
                </div>
            </div>
        </div>
    </div>

</body>
</html>