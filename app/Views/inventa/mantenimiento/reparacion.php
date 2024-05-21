<?= $this->extend('template/main1'); ?>
<?= $this->section('content'); ?>
<!DOCTYPE html>
<html>

<head>
    <title>Reparación</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Univers', sans-serif;
    }

    h2 {
        text-align: center;
        margin-bottom: 20px;
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
                            <form action="<?= base_url('inventa/mantenimiento/reparacion') ?>" method="POST" class="form-inline">
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
                <h2>Reparacion</h2>
                <table class="table">
                    <thead>
                        <th>Nombre</th>
                        <th>Tipo de Reparacion</th>
                        <th>Fecha de Entrada</th>
                        <th>Fecha de Salida</th>
                        <th>Acciones</th>
                    </thead>
                    <tbody>
                        <?php foreach($reparacion as $reparaciones):?>
                        <tr>
                            <td><?=$reparaciones->nombre ?></td>
                            <td><?=$reparaciones->tipoReparacion ?></td>
                            <td><?=$reparaciones->fechaIngreso ?></td>
                            <td><?=$reparaciones->fechaSalida ?></td>
                            <td class="acciones">
                                <a href="#" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <a href="#" class="btn btn-primary"><i class="fas fa-edit"></i></a>
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

</html>
<?= $this->endSection();?>