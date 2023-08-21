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
    $cliente = $_POST['cliente'];
    $libroPrestado = $_POST['libroPrestado'];
    $fechPrestamo = $_POST['fechPrestamo'];
    $fechDevolucion = $_POST['fechDevolucion'];

    $sql = "INSERT INTO prestamo(cliente, libroPrestado, fechPrestamo, fechDevolucion) VALUES('$cliente', '$libroPrestado', '$fechPrestamo', '$fechDevolucion')";
    
    if (mysqli_query($conn, $sql)) {
        include_once('create.php');
        header("Location: listado.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>