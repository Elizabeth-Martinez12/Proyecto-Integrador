<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <style {csp-style-nonce}>
        body {
            font-family: 'Montserrat', sans-serif;
        }

        .login {
            min-height: 100vh;
        }

        .login-heading {
            font-weight: 300;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;

        }

        .flex-container {
            display: flex;
            align-items: center;
            justify-content: center;
        }
    </style>


</head>

<body>


    <div class="container-fluid ps-md-0">
        <div class="row g-0">

            <div class="col-lg-4"></div>
            <div class="col-md-6 col-lg-4">
                <div class="login d-flex align-items-center py-5">
                    <div class="container">
                        <div class="row">
                            <div class="col-md-9 col-lg-8 mx-auto">
                                <h3 class="login-heading mb-4" style="color:rgb(0,92,171)">Registrarse</h3>

                                <!-- Register Form -->
                                <form action="<?= base_url('registro') ?>" method="post">

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="floatingInput" placeholder="identificador" name="identificador" pattern="[0-9]{8}" required title="El identificador debe contener solo 8 dígitos numéricos">
                                        <label for="identificador">Matrícula</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="nombre" placeholder="nombre" name="nombre" pattern="[A-Za-z]{1,15}" style="text-transform: capitalize;" title="Nombre de usuario no valido. Ejemplo:Elizabeth" required>
                                        <label for="nombre">Nombre</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="apaterno" placeholder="apaterno" name="apaterno" pattern="[A-Za-z]{1,15}" style="text-transform: capitalize;" title="Apellido de usuario no valido. Ejemplo:Martínez" required>
                                        <label for="apaterno">Apellido Paterno</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="amaterno" placeholder="amaterno" name="amaterno" pattern="[A-Za-z]{1,15}" style="text-transform: capitalize;" title="Apellido de usuario no valido. Ejemplo:Elizabeth" required>
                                        <label for="amaterno">Apellido Paterno</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="email" class="form-control" id="email" placeholder="Email" name="email" pattern="[a-z0-9._%+\-]+@[a-z0-9.\-]+\.[a-z]{2,}$" required>
                                        <label for="email">Correo</label>
                                    </div>

                                    <div class="input-group form-floating mb-3">
                                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
                                        <label for="password">Contraseña</label>
                                        <div class="input-group-append">
                                            <button class="btn btn-primary" type="button" onclick="mostrarPassword()">
                                                <span id="eyeIcon" class="fa fa-eye-slash icon"></span>
                                            </button>
                                        </div>
                                    </div>



                                    <div class="form-floating mb-3">
                                        <select class="form-select" id="sexo" name="sexo" required>
                                            <option value="" disabled selected>Selecciona tu sexo</option>
                                            <option value="H">Hombre</option>
                                            <option value="M">Mujer</option>
                                        </select>
                                        <label for="sexo">Sexo</label>
                                    </div>

                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="fecha_nacimiento" placeholder="Fecha de Nacimiento" name="fecha_nacimiento" required>
                                        <label for="fecha_nacimiento">Fecha de Nacimiento</label>
                                    </div>

                                    <div class="d-grid">
                                        <button class="btn btn-lg btn-primary btn-login fw-bold mb-2" type="submit">Guardar</button>
                                        <a class="btn btn-secondary" href="<?php echo base_url('/'); ?>">Cancelar</a>
                                    </div>
                                </form>
                                <div class="mt-3" style="display:flex; align-items:center; justify-content: center;">
                                    <a href="<?php echo base_url('registro'); ?>">Registrarse</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
<script>
    function mostrarPassword() {
        var cambio = document.getElementById("password");
        var eyeIcon = document.getElementById("eyeIcon");
        if (cambio.type == "password") {
            cambio.type = "text";
            eyeIcon.classList.remove('fa-eye-slash');
            eyeIcon.classList.add('fa-eye');
        } else {
            cambio.type = "password";
            eyeIcon.classList.remove('fa-eye');
            eyeIcon.classList.add('fa-eye-slash');
        }
    }
</script>
</body>

</html>