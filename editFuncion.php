<?php
session_start();
include_once('conexion.php');
$server = "localhost";
$user = "root";
$pass = "";
$db = "biblioteca";
$conexion = mysqli_connect($server, $user, $pass, $db);


if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {

    $fk_estudiante = $_POST['id'];
    $nombre1 = $_POST['1nombre'];
    $nombre2 = $_POST['2nombre'];
    $apellido1 = $_POST['1apellido'];
    $apellido2 = $_POST['2apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];

    $sql = "UPDATE cliente SET primernombre = '" . $nombre1 . "',segundonombre = '" . $nombre2 . "',primerapellido = '" . $apellido1 . "',segundoapellido = '" 
    . $apellido2 . "',telefono = '" . $telefono ."',correo = '" . $correo . "' WHERE id = " . $fk_estudiante . "";

    if (mysqli_query($conexion, $sql)) {
        header("Location: listado.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conexion);
    }

} else {
    header('location: index.php');
    exit();
}
?>