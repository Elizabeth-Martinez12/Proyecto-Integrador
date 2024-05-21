<?= $this->extend('template/main2'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Descontinuado</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Univers', sans-serif;
        /* Aplica el tipo de letra Univers */
    }

    h2 {
        text-align: center;
        /* Centra el título */
        margin-bottom: 20px;
        /* Margen inferior */
    }

    table {
        table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
        border: 1px solid #dee2e6;
    }
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

    .acciones img {
        margin-right: 5px;
        /* Margen derecho entre imágenes */
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <a href="<?php echo base_url('auditor/inicioauditor'); ?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Regresar" width="41"
                        height="41" />
                </a>
                <a href="<?php echo base_url('auditor/mantenimiento/mostrar'); ?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/5397/5397386.png" alt="Regresar" width="41"
                        height="41" />
                </a>

                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="<?= base_url('auditor/mantenimiento/descontinuado') ?>" method="POST" class="form-inline">
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
                <h2>Descontinuado</h2>
                <div class="container d-flex justify-content-end">
                    <button type="button" class="btn" data-bs-toggle="modal" data-bs-target="#reportModal">
                        <img src="https://titanioestudio.es/wp-content/uploads/2019/07/icono-de-descarga-documento.png"
                            width="50" height="50" alt="Imprimir" />
                    </button>
                </div>

                <table class="table">
                    <thead>
                        <th>Nombre</th>
                        <th>Razon</th>
                        <th>Fecha de Salida</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($descontinuo as $desco):?>
                        <tr>
                            <td><?=$desco->nombre ?></td>
                            <td><?=$desco->razon ?></td>
                            <td><?=$desco->fechaSalida ?></td>
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
    window.location.href = '<?= base_url('auditor/Descontinuado-General-PDF'); ?>';
});

document.getElementById('generateAulaReport').addEventListener('click', function() {
    window.location.href = '<?= base_url('auditor/Descontinuado-PDF/'); ?>';
});
</script>
</html>
<?= $this->endSection();?>