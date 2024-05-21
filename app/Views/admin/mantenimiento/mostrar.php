<?= $this->extend('template/main'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html>
<head>
    <title>Mantenimiento</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Univers', sans-serif; /* Aplica el tipo de letra Univers */
        }

        .btn-custom {
            height: auto; /* Altura automática para ajustar al contenido */
            font-size: 24px; /* Tamaño de fuente deseado */
            background-color: #2728C0; /* Cambia el color de fondo de los botones */
            color: white; /* Cambia el color del texto de los botones a blanco */
            font-family: 'Univers', sans-serif; /* Aplica el tipo de letra Univers a los botones */
        }

        .card-img {
            margin: 0 auto; /* Centra la imagen horizontalmente */
            max-height: 150px; /* Limita la altura máxima de la imagen */
        }
    </style>
</head>
<body>
    <div class="container">
        <a href="<?php echo base_url('admin/inicioadmin'); ?>">
            <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Regresar" width="41" height="41" />
        </a>
        <h2>Mantenimiento</h2>
        <div class="row mt-4">
            <div class="col-md-4">
                <div class="card">
                    <a href="<?php echo base_url('admin/mantenimiento/almacen'); ?>" class="btn btn-primary btn-custom btn-block d-flex flex-column align-items-center"><img src="https://cdn-icons-png.flaticon.com/512/2795/2795451.png" alt="Almacen"  height="150">Almacen</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="<?php echo base_url('admin/mantenimiento/reparacion'); ?>" class="btn btn-primary btn-custom btn-block d-flex flex-column align-items-center"><img src="https://cdn-icons-png.flaticon.com/512/4919/4919275.png" alt="Reparacion"  height="150">Reparacion</a>
                </div>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <a href="<?php echo base_url('admin/mantenimiento/descontinuado'); ?>" class="btn btn-primary btn-custom btn-block d-flex flex-column align-items-center"><img src="https://cdn-icons-png.flaticon.com/512/5610/5610109.png" alt="Descontinuado"  height="150">Descontinuado</a>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
<?= $this->endSection();?>