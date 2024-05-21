<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reporte</title>
    <style>
    body {
        font-family: Arial, sans-serif;
        margin: 0;
        padding: 0;
        background-color: #f8f9fa;
    }

    .header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 10px 20px;
        background-color: #2728C0;
        color: white;
    }

    .logo {
        max-height: 50px;
    }

    .title {
        text-align: center;
        margin: 20px 0;
        font-size: 24px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        margin-bottom: 20px;
    }

    th,
    td {
        padding: 10px;
        text-align: left;
        border-bottom: 1px solid #dee2e6;
    }

    th {
        background-color: #2728C0;
        color: white;
    }

    tr:hover {
        background-color: #f8f9fa;
    }

    .container {
        margin: 0 auto;
        max-width: 800px;
        padding: 20px;
    }

    h1,
    p {
        text-align: center;
    }
    </style>
</head>

<body>
    <div class="header">
        <img src="" width="400" height="341">
        <div>
            <h1>Sistema Control de Inventario QRi</h1>
            <p>Universidad Pedagógica Nacional Plantel Teziutlán</p>
        </div>

    </div>

    <div class="container">
        <h1>Lista de Materiales en el Aula</h1>
        <?php
            $idAulaActual = 1;


            $totalsPorAula = [];

        foreach($inventarios as $inventa) {
            if ($inventa->idAula == $idAulaActual) {
                $materialNombre = '';
                foreach ($materiales as $material) {
                    if ($material->idMate == $inventa->nombre) {
                        $materialNombre = $material->nombre;
                        break;
            }
         }

        $aulaNumero = '';
        foreach ($aulas as $aula) {
            if ($aula->id == $inventa->idAula) {
                $aulaNumero = $aula->numero;
                break;
            }
        }

        if (!isset($totalsPorAula[$aulaNumero][$materialNombre])) {
            $totalsPorAula[$aulaNumero][$materialNombre] = 1;
        } else {
            $totalsPorAula[$aulaNumero][$materialNombre]++;
        }
    }
}

?>
        <table>
            <thead>
                <tr>
                    <th>Aula</th>
                    <th>Nombre del Artículo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($totalsPorAula as $aulaNumero => $totals): ?>
                <?php foreach($totals as $nombre => $cantidad): ?>
                <tr>
                    <td><?= $aulaNumero ?></td>
                    <td><?= $nombre ?></td>
                    <td><?= $cantidad ?></td>
                </tr>
                <?php endforeach; ?>
                <?php endforeach; ?>
            </tbody>
        </table>


    </div>
</body>

</html>