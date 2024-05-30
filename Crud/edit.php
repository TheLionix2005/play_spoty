<?php 
include('../conexion/conexion.php'); 

// Recuperar el registro si se proporciona el Codigo en la URL
if (isset($_GET['Codigo'])) {
    $Codigo = $conn->real_escape_string($_GET['Codigo']);
    $sql = "SELECT * FROM music_list WHERE Codigo = '$Codigo'"; 
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
    } else {
        echo "No se encontraron registros.";
        exit();
    }
} else {
    echo "No se proporcionó un Codigo.";
    exit();
}

// Manejar la solicitud de actualización
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $Codigo = $conn->real_escape_string($_POST['Codigo']);
    $Nombre = $conn->real_escape_string($_POST['Nombre']);
    $Autor = $conn->real_escape_string($_POST['Autor']);
    $IdArchivo = $conn->real_escape_string($_POST['IdArchivo']); // Cambio de 'Url' a 'IdArchivo'
    $Img = $conn->real_escape_string($_POST['Img']);

    // Obtener la URL de descarga del archivo MP3 desde Google Drive
    $downloadUrl = getDownloadUrl($IdArchivo, 'AIzaSyDB7gZ0jvKCNbkRs7VCLMHA5SrEhdo9OCE'); // Reemplazar 'TU_API_KEY' con tu propia clave de API

    // Actualizar la información en la base de datos
    $sql = "UPDATE music_list SET Nombre = '$Nombre', Autor = '$Autor', img = '$Img', url = '$downloadUrl' WHERE Codigo = '$Codigo'";
    
    if ($conn->query($sql) === TRUE) {
        header("Location: crud.php");
        exit(); // Asegura que el script se detiene después del header
    } else {
        echo "Error al actualizar la información: " . $conn->error;
    }
}
// Función para obtener la URL de descarga del archivo MP3 desde Google Drive
function getDownloadUrl($driveUrl, $apiKey) {
    // Obtener el ID del archivo de la URL de Google Drive
    $fileId = getFileIdFromUrl($driveUrl);

    // Construir la URL de descarga con la API Key
    $downloadUrl = "https://www.googleapis.com/drive/v3/files/$fileId?alt=media&key=$apiKey";

    return $downloadUrl;
}

// Función para obtener el ID del archivo desde la URL de Google Drive
function getFileIdFromUrl($driveUrl) {
    $fileId = '';

    // Extraer el ID del archivo de la URL
    $urlParts = explode('/', $driveUrl);
    foreach ($urlParts as $part) {
        if (strpos($part, 'd/') !== false) {
            $fileId = explode('d/', $part)[1];
            break;
        }
    }

    return $fileId;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Editar información de la música</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h2 class="text-center">Editar información de la música</h2>
        <form method="POST" action="" enctype="multipart/form-data">
            <div class="form-group">
                <input type="hidden" name="Codigo" class="form-control" value="<?php echo htmlspecialchars($row['Codigo']); ?>" readonly>
            </div>
            <div class="form-group">
                <label>Nombre</label>
                <input type="text" name="Nombre" class="form-control" value="<?php echo htmlspecialchars($row['Nombre']); ?>" required>
            </div>
            <div class="form-group">
                <label>Autor</label>
                <input type="text" name="Autor" class="form-control" value="<?php echo htmlspecialchars($row['Autor']); ?>" required>
            </div>
            <div class="form-group">
                <label>Imagen Actual</label><br>
                <img src="<?php echo htmlspecialchars($row['img']); ?>" alt="Imagen Actual" style="width: 150px;">
            </div>
            <div class="form-group">
                <label>Nueva URL de Imagen (opcional)</label>
                <input type="text" name="Img" class="form-control" placeholder="Ingrese la URL de la imagen" value="<?php echo htmlspecialchars($row['img']); ?>">
            </div>
<div class="form-group">
    <label>ID del Archivo MP3 (Google Drive)</label>
    <input type="text" name="IdArchivo" class="form-control" value="<?php echo htmlspecialchars($row['url']); ?>" required>
</div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
</html>
