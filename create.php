<?php

if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
    header('location: index.php');
    exit();
}


include_once('conexion.php');

if (!$conn) {
    die("La conexion fallo: " . mysqli_connect_error());
} else {
    $sql2 = "SELECT id FROM estudiantes ORDER BY id DESC";
    $result = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result);
    $fk_estudiante = $row['id'];
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
    $accion = 'Creó un registro';

    $sql = "INSERT INTO historial(primernombre, segundonombre, primerapellido, segundoapellido, telefono, telefonopadres, jornada, grado, carrera, fk_estudiante, fk_adminstracion, accion) VALUES('$nombre1', '$nombre2', '$apellido1', '$apellido2', '$telEstudiante', '$telPadre', '$jornada', '$grado', '$carrera', '$fk_estudiante', '$fk_adminstracion', '$accion')";
    
    if (mysqli_query($conn, $sql)) {

        header("Location: ../Listado/listado.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>