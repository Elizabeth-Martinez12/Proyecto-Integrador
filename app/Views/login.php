<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    <link rel="stylesheet" href="<?php echo base_url('assets/css/bootstrap.min.css'); ?>">

    <link href="https://fonts.googleapis.com/css2?family=Univers:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <style {csp-style-nonce}>
        /* Estilos generales para centrar en pantalla */
        body {
            font-family: 'Univers', sans-serif;
            background-color: #2728C0;
            margin: 0;
            padding: 0;
            height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }

        .login-container {
            background-color: #fff;
            border-radius: 10px;
            padding: 20px;
            max-width: 400px;
            width: 100%;
            text-align: center;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            border: 1px solid rgba(0, 0, 0, 0.1);
        }

        .login-heading {
            font-weight: 700;
            text-align: center;
            margin-bottom: 20px;
            color: rgb(0, 92, 171);
            margin-bottom: 1.5rem; /* Margen inferior aumentado */
        }

        .form-floating {
            margin-bottom: 15px;
        }

        .btn-login {
            font-size: 0.9rem;
            letter-spacing: 0.05rem;
            padding: 0.75rem 1rem;
        }

        .logo {
            margin-bottom: 20px;
            width: 150px;
        }

        .d-grid {
            margin-top: 15px;
        }

        .register-link {
            margin-top: 10px;
        }
    </style>
</head>

<body>
    <img src="https://upn113leon.edu.mx/wp-content/uploads/2022/08/UPN-png.png" alt="UPN Logo" class="logo" height="150">
    <div class="login-container">
        <h3 class="login-heading">Iniciar Sesión</h3>
        <form action="<?= base_url('login'); ?>" method="post">
            <div class="form-floating mb-3">
                <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com"
                    name="identificador" required>
                <label for="floatingInput">Identificador</label>
            </div>
            <div class="form-floating mb-3">
                <input type="password" class="form-control" id="floatingPassword" placeholder="Password"
                    name="password" required>
                <label for="floatingPassword">Contraseña</label>
            </div>
            <div class="d-grid">
                <button class="btn btn-lg btn-primary btn-login fw-bold" type="submit">Iniciar Sesión</button>
            </div>
        </form>
        <div class="register-link">
            <a href="<?= base_url('registro'); ?>">Registrarse</a>
        </div>
    </div>
</body>

</html>
