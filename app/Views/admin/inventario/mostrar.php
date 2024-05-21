<?= $this->extend('template/main'); ?>
<?= $this->section('content'); ?>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js"
    integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous">
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.min.js"
    integrity="sha384-0pUGZvbkm6XF6gxjEnlmuGrJXVbNuzT9qBBavbLwCsOGabYfZo0T0to5eqruptLy" crossorigin="anonymous">
</script>

<!DOCTYPE html>
<html>

<head>
    <title>Inventario</title>
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
        width: 100%;
        /* Ancho completo de la tabla */
        border-collapse: collapse;
        /* Colapsa los bordes de la tabla */
        margin-bottom: 20px;
        /* Margen inferior */
    }

    th,
    td {
        padding: 10px;
        /* Espaciado interior de celdas */
        text-align: left;
        border-bottom: 1px solid #dee2e6;
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
                <a href="<?php echo base_url('admin/inicioadmin'); ?>">
                    <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Regresar" width="41"
                        height="41" />
                </a>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <form action="<?= base_url('admin/inventario/mostrar') ?>" method="POST"
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
                <?php include 'agregar.php'; ?>

                <h2>Inventario</h2>

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
                            <th>Categoría</th>
                            <th>Descripción</th>
                            <th>Estado</th>
                            <th>Fecha de Registro</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach($inventario as $inventa):?>
                        <?php foreach($categoria as $categorias){
                                        if($categorias->idCategoria == $inventa->categoria){;
                                            break;
                                        }
                                    }
                                    ?>
                        <?php foreach($material as $materiales){
                                        if($materiales->idMate == $inventa->nombre){;
                                            break;
                                        }
                                    }
                                    ?>

                        <?php foreach($aulas as $aula){
                                        if($aula->id == $inventa->idAula){;
                                            break;
                                        }
                                    }
                                    ?>
                        <tr>
                            <td><?=$aula->numero ?></td>
                            <td><?=$materiales->nombre ?></td>
                            <td><?=$categorias->nombre ?></td>
                            <td><?=$inventa->descripcion ?></td>
                            <td><?php if ($inventa->status == 1): ?>
                                Activo
                                <?php else: ?>
                                Inactivo
                                <?php endif; ?></td>
                            <td><?=$inventa->created_at ?></td>
                            <td class="acciones">
                                <a href="<?= base_url('admin/inventario/delete/'.$inventa->id); ?>"
                                    class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>
                                <a href="<?= base_url('admin/inventario/editar/'.$inventa->id); ?>"
                                    class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                <a href="<?= base_url('admin/inventario/generarQR/'.$inventa->id); ?>"
                                    class="btn btn-success"><i class="fas fa-qrcode"></i></a>
                                <a href="#" class="btn btn-secondary open-modal"
                                    data-bs-target="#qrModal<?= $inventa->id; ?>">
                                    <i class="fas fa-eye"></i> Ver QR
                                </a>
                                <div class="modal fade" id="qrModal<?= $inventa->id; ?>" tabindex="-1"
                                    aria-labelledby="qrModalLabel<?= $inventa->id; ?>" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="qrModalLabel<?= $inventa->id; ?>">Código QR
                                                    de <?= $inventa->nombre; ?></h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                <img src="<?= base_url('admin/qr/' . $inventa->id . '.png'); ?>"
                                                    alt="Código QR de <?= $inventa->nombre; ?>" class="img-fluid">
                                            </div>
                                            <div class="modal-footer">
                                                <a href="<?= base_url('admin/qr/' . $inventa->id . '.png'); ?>"
                                                    download="qr-<?= $inventa->nombre; ?>.png" class="btn btn-primary"
                                                    style="margin-left: auto;">
                                                    <i class="fas fa-download"></i> Descargar
                                                </a>
                                                <button type="button" class="btn btn-secondary"
                                                    data-bs-dismiss="modal">Cerrar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                    <button type="button" class="btn btn-secondary" id="generateAulaReport">Reporte lista materiales</button>
                </div>
            </div>
        </div>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.min.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    document.querySelectorAll('.open-modal').forEach(function(element) {
        element.addEventListener('click', function(event) {
            var targetModal = event.target.getAttribute('data-bs-target');
            var modal = new bootstrap.Modal(document.querySelector(targetModal));
            modal.show();
        });
    });
});

document.getElementById('generateGeneralReport').addEventListener('click', function() {
        window.location.href = '<?= base_url('admin/Inventario-General-PDF'); ?>';
    });

    document.getElementById('generateAulaReport').addEventListener('click', function() {
        window.location.href = '<?= base_url('admin/Inventario-PDF/'); ?>';
    });
</script>


</html>
<?= $this->endSection();?>