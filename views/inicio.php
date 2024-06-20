<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link href="styles.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<nav class="navbar navbar-expand-lg bg-body-tertiary">
    <a class="navbar-brand" href="#">
        <img src="https://seocom.agency/wp-content/uploads/2019/02/bootstrap-stack.png" alt="Bootstrap" width="50" height="50">
    </a>
    <div class="container-fluid">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="#">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Features</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#">Pricing</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link disabled" aria-disabled="true">Disabled</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <div class="row row-cols-1 row-cols-md-3 g-4">
        <?php
        include('../conexion/conexion.php');

        // Consulta para obtener la lista de música
        $sql = "SELECT nombre, autor, img, url FROM music_list";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            // Output data of each row
            while($row = $result->fetch_assoc()) {
                echo '<div class="col">
                        <div class="card h-100">
                            <img src="' . $row["img"] . '" class="card-img-top" alt="...">
                            <div class="card-body">
                                <h5 class="card-title">' . $row["nombre"] . '</h5>
                                <p class="card-text">Autor: ' . $row["autor"] . '</p>';
                
                // Si la URL es un archivo mp3, muestra un reproductor de audio
                if (pathinfo($row["url"], PATHINFO_EXTENSION) === 'mp3') {
                    echo '<audio controls>
                            <source src="' . $row["url"] . '" type="audio/mpeg">
                            Tu navegador no soporta el elemento de audio.
                          </audio>';
                } else {
                    // Si no es un archivo mp3, muestra el enlace
                    echo '<a href="' . $row["url"] . '" class="btn btn-primary">Escuchar</a>';
                }

                echo '</div>
                      </div>
                      </div>';
            }
        } else {
            echo "No hay música disponible.";
        }

        $conn->close();
        ?>
    </div>
</div>
<div>
    <audio controls>
        <source src="https://www.googleapis.com/drive/v3/files/1DhShdc3v0uQxyV8HZbQGOtbIVl0gxK1n?alt=media&key=AIzaSyDB7gZ0jvKCNbkRs7VCLMHA5SrEhdo9OCE">
    </audio>
</div>
</body>
</html>
