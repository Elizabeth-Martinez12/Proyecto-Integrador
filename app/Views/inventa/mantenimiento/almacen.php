<?= $this->extend('template/main1'); ?>

<?= $this->section('content'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Almacen</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <style>
    body {
        font-family: 'Univers', sans-serif;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
        border-right: 1px solid #dee2e6;
    }

    th {
        background-color: #2728C0;
    }

    tr:hover {
        background-color: #f8f9fa;
    }

    .acciones .fa {
        margin-right: 5px;
        color: #007bff;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo base_url('inventa/inicioinventa'); ?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Regresar" width="41"
                        height="41" />
                </a>
                <a href="<?php echo base_url('inventa/mantenimiento/mostrar'); ?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/5397/5397386.png" alt="Regresar" width="41"
                        height="41" />
                </a>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="<?= base_url('inventa/mantenimiento/almacen') ?>" method="POST"
                                class="form-inline">
                                <div class="input-group">
                                    <input class="form-control" type="search" id="keywords" name="keywords" size="30"
                                        maxlength="30" placeholder="Buscar" aria-label="Search">
                                    <div class="input-group-append">
                                        <button class="btn btn-outline-success" type="submit">Buscar</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>

                <h2>Almacen</h2>
                <div class="container d-flex justify-content-end">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <img src="https://titanioestudio.es/wp-content/uploads/2019/07/icono-de-descarga-documento.png"
                            width="50" height="50" alt="Imprimir" />
                    </button>
                </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Aula</th>
                            <th>Nombre</th>
                            <th>Descripcion</th>
                            <th>Fecha de Entrada</th>
                            <th>Fecha de Salida</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($mantenimiento as $mante):?>
                            <?php foreach($aulas as $aula){
                                        if($aula->id == $mante->idAula){;
                                            break;
                                        }
                                    }
                                    ?>
                        <tr>
                            <td><?=$aula->numero ?></td>
                            <td><?=$mante->nombre ?></td>
                            <td><?=$mante->descripcion ?></td>
                            <td><?=$mante->fechaEntrada ?></td>
                            <td><?=$mante->fechaSalida ?></td>
                            <td class="acciones">
                                <a href="#" class="btn btn-success"><i class="fas fa-qrcode"></i></a>
                            </td>
                        </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>

<div class="modal fade" id="reportModal" tabindex="-1" aria-labelledby="reportModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="reportModalLabel">Seleccionar tipo de reporte</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>¿Qué tipo de reporte deseas generar?</p>
                <button type="button" class="btn btn-primary" id="generateGeneralReport">Reporte General</button>
                <button type="button" class="btn btn-secondary" id="generateAulaReport">Reporte lista
                    materiales</button>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById('generateGeneralReport').addEventListener('click', function() {
    window.location.href = '<?= base_url('inventa/Almacen-General-PDF'); ?>';
});

document.getElementById('generateAulaReport').addEventListener('click', function() {
    window.location.href = '<?= base_url('inventa/Almacen-PDF/'); ?>';
});
</script>

</html>

<?= $this->endSection(); ?>