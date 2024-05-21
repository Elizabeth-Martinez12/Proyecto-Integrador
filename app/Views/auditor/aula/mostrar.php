<?= $this->extend('template/main2'); ?>
<?= $this->section('content'); ?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aulas</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
    body {
        font-family: 'Univers', sans-serif;
    }

    .btn-custom {
        height: auto;
        font-size: 24px;
        background-color: #2728C0;
        font-family: 'Univers', sans-serif;
    }

    .card {
        margin-bottom: 20px;
        border: none;
        border-radius: 10px;
        box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    }

    .card img {
        border-top-left-radius: 20px;
        border-top-right-radius: 20px;
        height: 150px;
        object-fit: cover;
    }

    .card-body {
        text-align: center;
        padding: 20px;
    }

    .aula-name {
        font-weight: bold;
        margin-top: 10px;
    }
    </style>
</head>

<body>
    <div class="container">
        <div class="d-flex justify-content-start mb-4">
            <a href="<?= base_url('auditor/inicioadmin'); ?>">
                <img src="https://cdn-icons-png.flaticon.com/512/25/25694.png" alt="Regresar" width="41" height="41"
                    class="me-3">
            </a>
            <a href="<?= base_url('auditor/inicioadmin'); ?>">
                <img src="https://cdn-icons-png.flaticon.com/512/5397/5397386.png" alt="Otra opción" width="41"
                    height="41">
            </a>
        </div>
        <h2 class="mt-5">Aulas</h2>
        <div class="row mt-4">
            <?php if (isset($aulas) && is_array($aulas)): ?>
            <?php foreach ($aulas as $aula): ?>
            <div class="col-md-4">
                <div class="card">
                    <a href="<?= base_url('auditor/aula/listaelementos/' . $aula->id); ?>"
                        class="btn btn-primary btn-custom btn-block">
                        <img src="https://cdn-icons-png.flaticon.com/512/3197/3197877.png"
                            alt="Aula <?= $aula->numero ?>" class="logo" height="150">
                    </a>
                    <div class="card-body">
                        <div class="aula-name">Aula <?= $aula->numero ?></div>
                    </div>
                </div>
            </div>
            <?php endforeach; ?>
            <?php else: ?>
            <p>No hay aulas disponibles.</p>
            <?php endif; ?>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.4.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>

<?= $this->endSection(); ?>