<?php include('../conexion/conexion.php'); ?>

<!DOCTYPE html>
<html>
<head>
    <title>CRUD Administrador musica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">CRUD Administrador musica</h2>
        <div class="row">
            <div class="col-md-12">
                <a href="create.php" class="btn btn-primary">Añadir musica</a>
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Autor</th>
                            <th>img</th>
                            <th>url</th>
                
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $sql = "SELECT * FROM music_list";
                        $result = $conn->query($sql);
                        if ($result->num_rows > 0) {
                            while($row = $result->fetch_assoc()) {
                                echo "<tr>
                                        <td>{$row['Nombre']}</td>
                                        <td>{$row['Autor']}</td>
                                        <td>{$row['img']}</td>
                                        <td>{$row['url']}</td>
                                        <td>
                                            <a href='edit.php?id={$row['Nombre']}' class='btn btn-success'>Edit</a>
                                            <a href='delete.php?id={$row['Nombre']}' class='btn btn-danger'>Delete</a>
                                        </td>
                                      </tr>";
                            }
                        } else {
                            echo "<tr><td colspan='5' class='text-center'>No records found</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</body>
</html>
