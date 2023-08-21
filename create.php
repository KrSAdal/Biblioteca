<?php

if (!isset($_SESSION['id']) || !isset($_SESSION['usuario'])) {
    header('location: index.php');
    exit();
}

include_once('conexion.php');

if (!$conn) {
    die("La conexion fallo: " . mysqli_connect_error());
} else {
    $sql2 = "SELECT id FROM cliente ORDER BY id DESC";
    $result = mysqli_query($conn, $sql2);
    $row = mysqli_fetch_assoc($result);

    $fk_cliente = $row['id']; // Corrección aquí
    $nombre1 = $_POST['1nombre'];
    $telefono = $_POST['telefono'];
    $correo = $_POST['correo'];
    $libroPrestado = $_POST['libroPrestado'];
    $fechPrestamo = $_POST['fechPrestamo'];
    $fechDevolucion = $_POST['fechDevolucion'];
    $usuario = $_SESSION['usuario'];
    $estado = 'Pendiente';

    $sql = "INSERT INTO historial(fk_cliente, primernombre, telefono, correo, libro, fecha_prestamo, fecha_devolucion, usuario, estado) 
    VALUES('$fk_cliente', '$nombre1', '$telefono', '$correo', '$libroPrestado', '$fechPrestamo', '$fechDevolucion', '$usuario', '$estado')";
    
    if (mysqli_query($conn, $sql)) {
        header("Location: historial.php");
        exit();
    } else {
        echo "Error: " . mysqli_error($conn);
    }
}
?>
