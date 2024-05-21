
<!DOCTYPE html>
<html lang="en" data-bs-theme="dark">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/css/bootstrap.min.css">
    <script src="https://kit.fontawesome.com/ae360af17e.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dash.css') ?>">


    <style {csp-style-nonce}>
        body {
            background-color: rgb(0,92,171);
        }
    </style>


</head>



<body>
    <div class="wrapper">
        <aside id="sidebar" class="js-sidebar">
            <!-- Content For Sidebar -->
            <div class="h-100">
            <div class="sidebar-heading"><img src="https://upn113leon.edu.mx/wp-content/uploads/2022/08/UPN-png.png"
                alt="UPN Logo" class="logo" height="100">
            </div>

                <div class="sidebar-logo">
                    <a href="#"><?= session()->get('nombre')?></a>
                </div>
                <ul class="sidebar-nav">
                    <li class="sidebar-header">
                        Principal
                    </li>
                    <li class="sidebar-item">
                        <a href="<?php echo base_url('inventa/inicioinventa'); ?>" class="sidebar-link">
                            <i class="fa-solid fa-house"></i></i>
                            Inicio
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?php echo base_url('inventa/aula/mostrar'); ?>" class="sidebar-link">
                            <i class="fa-solid fa-person-chalkboard pe-2"></i></i>
                            Aulas
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('inventa/inventario/mostrar') ?>" class="sidebar-link">
                            <i class="fa-regular fa-rectangle-list"></i>
                            Inventario
                        </a>
                    </li>

                    <li class="sidebar-item">
                        <a href="<?= base_url('inventa/mantenimiento/mostrar') ?>" class="sidebar-link">
                            <i class="fa-solid fa-wrench"></i>
                            Mantenimiento
                        </a>
                    </li>


                </ul>
            </div>
        </aside>
        <div class="main">
            <nav class="navbar navbar-expand px-3 border-bottom">
                <button class="btn" id="sidebar-toggle" type="button">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="navbar-collapse navbar">


                    <ul class="navbar-nav ml-auto">


                        <li class="nav-item">
                            <a class="nav-link" data-toggle="dropdown" href="#">
                                <i class="fas fa-user"></i> <?= session()->get('email') ?>
                            </a>

                        </li>

                        <li class="nav-item">
                            <a href="<?= base_url('logout'); ?>" class="nav-link">
                                <i class="fas fa-sign-out-alt"></i> Cerrar sesión
                            </a>
                        </li>

                    </ul>
                </div>
            </nav>
            
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <div class="mb-3">

                    </div>


                    <div>
                        <?= $this->renderSection('content') ?>    
                    </div>

                    
                </div>
            </main>
            <a href="#" class="theme-toggle">
                <i class="fa-regular fa-moon"></i>
                <i class="fa-regular fa-sun"></i>
            </a>
            
        </div>
    </div>





    <script type="text/javascript" src="<?= base_url('assets/js/dash.js') ?>"></script>




    <script type="text/javascript" language="javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>


    <!-- <script src="<?php echo base_url('assets/adminlte/js/jquery.min.js'); ?>"></script> -->
    <script src="<?php echo base_url('assets/adminlte/js/bootstrap.bundle.min.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminlte/js/dashboard2.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminlte/js/adminlte.js'); ?>"></script>
    <script src="<?php echo base_url('assets/adminlte/js/overlay.js'); ?>"></script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <!-- <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script> -->
</body>

</html>
