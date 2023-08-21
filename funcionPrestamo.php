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
    $fk_cliente = $_POST['id'];
    $nombre1 = $_POST['1nombre'];
    $nombre2 = $_POST['2nombre'];
    $apellido1 = $_POST['1apellido'];
    $apellido2 = $_POST['2apellido'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $libroPrestado = $_POST['libroPrestado'];
    $fechPrestamo = $_POST['fechPrestamo'];
    $fechDevolucion = $_POST['fechDevolucion'];

    $sql = "INSERT INTO prestamo(fk_cliente, primernombre, segundonombre, primerapellido, segundoapellido, telefono, correo, libro, fecha_prestamo, fecha_devolucion) 
    VALUES('$fk_cliente', '$nombre1', '$nombre2', '$apellido1', '$apellido2', '$telefono', '$correo', '$libroPrestado', '$fechPrestamo', '$fechDevolucion')";
    
    if (mysqli_query($conn, $sql)) {
       include_once('create.php');
        header("Location: historial.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>