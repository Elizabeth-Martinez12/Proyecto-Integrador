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

        th, td {
            padding: 10px;
            text-align: left;
            border-bottom: 1px solid #dee2e6;
        }

        th {
            background-color: #2728C0;
            color: white;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        tr:hover {
            background-color: #d3d3d3;
        }

        .container {
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
        }

        h1, p {
            text-align: center;
        }

        h2, p {
            text-align: center;
        }

        h3, p {
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="header">
        <h1>SISTEMA DE INVENTARIO QRi</h1>
        <h2>UNIVERSIDAD PEDAGOGICA NACIONAL 212</h2>
    </div>

    <div class="container">
        <h3>Materiales por Aula</h3>

        <table>
            <thead>
                <tr>
                    <th>Nombre del Artículo</th>
                    <th>Cantidad</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $cantidadTotal = [];
                foreach ($descontinuo as $mante) {
                    $materialNombre = $mante->nombre;

                    if (!empty($materialNombre)) {
                        $cantidadTotal[$materialNombre] = isset($cantidadTotal[$materialNombre]) ? $cantidadTotal[$materialNombre] + 1 : 1;
                    }
                }

                foreach ($cantidadTotal as $materialNombre => $cantidad) {
                    ?>
                    <tr>
                        <td><?= esc($materialNombre) ?></td>
                        <td><?= esc($cantidad) ?></td>
                    </tr>
                    <?php
                }
                ?>
            </tbody>
        </table>

    </div>
</body>
</html>
