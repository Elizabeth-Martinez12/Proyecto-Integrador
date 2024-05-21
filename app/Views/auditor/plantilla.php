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

        tr:hover {
            background-color: #f8f9fa;
        }

        .container {
            margin: 0 auto;
            max-width: 800px;
            padding: 20px;
        }

        h1, p {
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
|   
    <div class="container">
        <h1>Lista de Materiales</h1>
        <table border="1" cellspacing="0" cellpadding="5">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Categoria</th>
                    <th>Descripcion</th>
                    <th>Fecha Registro</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($material as $row) : ?>
                    <tr>
                        <td><?= $row->id ?></td>
                        <td><?= $row->nombre ?></td>
                        <td><?= $row->categoria ?></td>
                        <td><?= $row->descripcion ?></td>
                        <td><?= $row->created_at ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
