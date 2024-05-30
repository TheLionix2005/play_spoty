<?php include('../conexion/conexion.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Administrador música</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">CRUD Administrador música</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="create.php" class="btn btn-primary">Añadir música</a><p>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Código</th>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>Imagen</th>
                            <th>URL</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM music_list";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['Codigo']}</td>
                                        <td>{$row['Nombre']}</td>
                                        <td>{$row['Autor']}</td>
                                        <td><img src='{$row['img']}' alt='Imagen' style='width: 100px;'></td>
                                        <td>{$row['url']}</td>
                                        <td>
                                            <a href='edit.php?Codigo={$row['Codigo']}' class='btn btn-success'>Edit</a>
                                            <a href='delete.php?Nombre={$row['Nombre']}' class='btn btn-danger'>Delete</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='6' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
