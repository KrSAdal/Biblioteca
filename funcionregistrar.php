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
    $nombre1 = $_POST['1nombre'];
    $nombre2 = $_POST['2nombre'];
    $apellido1 = $_POST['1apellido'];
    $apellido2 = $_POST['2apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "INSERT INTO cliente(primernombre, segundonombre, primerapellido, segundoapellido, telefono, correo) VALUES('$nombre1', '$nombre2', '$apellido1', '$apellido2', '$telefono', '$correo')";
    
    if (mysqli_query($conn, $sql)) {
        include_once('create.php');
        header("Location: listado.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>