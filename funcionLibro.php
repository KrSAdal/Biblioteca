<?php
session_start();
if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
    header('location: index.php');
    exit();
}

$server = "localhost";
$user = "root";
$pass = "";
$db = "biblioteca";
$conn = mysqli_connect($server, $user, $pass, $db);

if (!$conn) {
    die("La conexion fallo: " . mysqli_connect_error());
} else {
    $libroNombre = $_POST['libroNombre'];
    $libroAutor = $_POST['libroAutor'];
    $libroLanzamiento = $_POST['libroLanzamiento'];
    $libroPaginas = $_POST['libroPaginas'];
    $libroEditorial = $_POST['libroEditorial'];

    $sql = "INSERT INTO libro(titulo, autor, lanzamiento, numeroPaginas, editorial) VALUES('$libroNombre', '$libroAutor', '$libroLanzamiento', '$libroPaginas', '$libroEditorial')";
    
    if (mysqli_query($conn, $sql)) {
       
        header("Location: listado.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>