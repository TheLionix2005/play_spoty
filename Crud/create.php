<?php include('../conexion/conexion.php'); ?>
<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $autor = $_POST['autor'];
    $img = $_POST['img'];
    $url = $_POST['url'];

    // Convertir enlace de Google Drive a enlace directo si es necesario
    if (strpos($url, 'drive.google.com') !== false) {
        parse_str(parse_url($url, PHP_URL_QUERY), $query);
        if (isset($query['id'])) {
            $url = "https://drive.google.com/uc?export=download&id={$query['id']}";
        } else {
            // Manejo de caso donde el URL no tiene formato esperado
            echo "URL de Google Drive no válida.";
            exit();
        }
    }

    $sql = "INSERT INTO music_list (nombre, autor, img, url) VALUES ('$nombre', '$autor', '$img', '$url')";
    if ($conn->query($sql) === TRUE) {
        header("Location: crud.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Añadir Musica</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Añadir Musica</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="autor" class="form-control" required>
            </div>
            <div class="form-group">
                <label>URL de la Imagen</label>
                <input type="text" name="img" class="form-control" required>
            </div>
            <div class="form-group">
                <label>URL del Audio</label>
                <input type="text" name="url" class="form-control" required>
            </div>
            <button type="submit" class="btn btn-primary">Registrar musica</button>
        </form>
    </div>
</body>
</html>
