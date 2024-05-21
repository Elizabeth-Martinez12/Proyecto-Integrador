<?= $this->extend('template/main'); ?>
<?= $this->section('content'); ?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="<?= base_url('assets/css/dash.css') ?>">
</head>

<body>
    <div class="wrapper">
        
            <main class="content px-3 py-2">
                <div class="container-fluid">
                    <h2 class="mt-5">Bienvenido</h2>
                    <div class="row mt-4">
                        <div class="col-md-4">
                            <div class="card">
                                <a href="<?php echo base_url('aula/mostrar'); ?>" class="btn btn-primary btn-custom btn-block d-flex flex-column align-items-center"><img src="/imagen/salon.png" alt="Aula"  height="150">Aula</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="<?php echo base_url('inventario/mostrar'); ?>" class="btn btn-primary btn-custom btn-block d-flex flex-column align-items-center"><img src="/imagen/inventario.png" alt="Inventario"  height="150">Inventario</a>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card">
                                <a href="<?php echo base_url('mantenimiento/mostrar'); ?>" class="btn btn-primary btn-custom btn-block d-flex flex-column align-items-center"><img src="/imagen/mantenimiento.png" alt="Mantenimiento"  height="150">Mantenimiento</a>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?= $this->endSection();?>