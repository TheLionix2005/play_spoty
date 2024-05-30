<?php
 include('../conexion/conexion.php');

if (isset($_GET['Nombre'])) {
    $id = $_GET['Nombre'];
    $sql = "DELETE FROM music_list WHERE Nombre='$id'";
    if ($conn->query($sql) === TRUE) {
 
        $message = "Producto Eliminado Satisfactoriamente";
          echo "<script>alert('$message');</script>";
          echo "<script>window.location.href='crud.php';</script>";
    } else {
        echo "Error deleting record: " . $conn->error;
    }
}
?>
