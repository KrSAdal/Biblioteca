<?php
session_start();

if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {
    include_once('conexion.php');

    if (!$conexion) {
        die("La conexion fallo: " . mysqli_connect_error());
    } else {
        $id_prestamo = $_GET['id'];
        $estado_actual = urldecode($_GET['estado']);
        
        if ($estado_actual == 'Pendiente') {
            $nuevo_estado = 'Devuelto';
            
            $sql = "UPDATE historial SET estado = '$nuevo_estado' WHERE id = $id_prestamo";
            
            if (mysqli_query($conexion, $sql)) {
                header("Location: historial.php");
                exit();
            } else {
                echo "Error: " . mysqli_error($conn);
            }
        } else {
            // Si el estado no es 'Pendiente', redirecciona de vuelta al historial sin hacer cambios
            header("Location: historial.php");
            exit();
        }
    }

    mysqli_close($conn);
} else {
    header('location: index.php');
}
?>
