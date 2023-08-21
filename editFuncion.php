<?php
session_start();
include_once('conexion.php');
$server = "localhost";
$user = "root";
$pass = "";
$db = "biblioteca";
$conn = mysqli_connect($server, $user, $pass, $db);
$conn = mysqli_connect($server, $user, $pass, $db);

if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {

    $fk_estudiante = $_POST['id'];
    $nombre1 = $_POST['1nombre'];
    $nombre2 = $_POST['2nombre'];
    $apellido1 = $_POST['1apellido'];
    $apellido2 = $_POST['2apellido'];
    $telEstudiante = $_POST['telEstudiante'];
    $telPadre = $_POST['telPadre'];
    $jornada = $_POST['jornada'];
    $grado = $_POST['grado'];
    $carrera = $_POST['carrera'];
    $fk_adminstracion = $_SESSION['usuario'];
    $accion = 'Editó un registro';

    $sql2 = "INSERT INTO historial(primernombre, segundonombre, primerapellido, segundoapellido, telefono, telefonopadres, jornada, grado, carrera, fk_estudiante, fk_adminstracion, accion) VALUES('$nombre1', '$nombre2', '$apellido1', '$apellido2', '$telEstudiante', '$telPadre', '$jornada', '$grado', '$carrera', '$fk_estudiante', '$fk_adminstracion', '$accion')";

    if (mysqli_query($conn, $sql2)) {
        $sql = "UPDATE estudiantes SET primernombre = '" . $nombre1 . "',segundonombre = '" . $nombre2 . "',primerapellido = '" . $apellido1 . "',segundoapellido = '" . $apellido2 . "',telefono = '" . $telEstudiante . "',telefonopadres = '" . $telPadre . "',jornada = '" . $jornada . "',grado = '" . $grado . "',carrera = '" . $carrera . "' WHERE id = " . $fk_estudiante . "";

        if (mysqli_query($conn, $sql)) {
            header("Location: listado.php");
            exit();
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    } else {
        echo "Error al insertar en el historial: " . mysqli_error($conn);
    }
} else {
    header('location: index.php');
    exit();
}
?>