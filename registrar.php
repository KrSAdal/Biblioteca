<?php
session_start();
include_once('conexion.php');

if (isset($_POST['usuario']) && isset($_POST['pass'])) {
    function validar($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $nombre = validar($_POST['nombre']);
    $apellido = validar($_POST['apellido']);
    $cargo = validar($_POST['cargo']);
    $usuario = validar($_POST['usuario']);
    $pass = validar($_POST['pass']);
    $Rpass = validar($_POST['Rpass']);
    $datosUsuario = 'usuario=' . $usuario;

    if (empty($nombre)) {
        header("location: registro.php?error=El nombre es requerido&$datosUsuario");
        exit();
    }

    if (empty($apellido)) {
        header("location: registro.php?error=El apellido es requerido&$datosUsuario");
        exit();
    }

    if (empty($cargo)) {
        header("location: registro.php?error=El cargo es requerido&$datosUsuario");
        exit();
    }

    if (empty($usuario)) {
        header("location: registro.php?error=El usuario es requerido&$datosUsuario");
        exit();
    }

    if (empty($pass)) {
        header("location: registro.php?error=La contraseña es requerida&$datosUsuario");
        exit();
    }

    if (empty($Rpass)) {
        header("location: registro.php?error=Es necesario repetir la contraseña&$datosUsuario");
        exit();
    }

    if ($pass !== $Rpass) {
        header("location: registro.php?error=La contraseña no coincide&$datosUsuario");
        exit();
    }

    $sql = "SELECT * FROM administracion WHERE usuario = '$usuario'";
    $query = $conexion->query($sql);

    if (mysqli_num_rows($query) > 0) {
        header("location: registro.php?error=El usuario ya existe");
        exit();
    } else {
        $sql2 = "INSERT INTO administracion(nombre, apellido, usuario, pass, cargo) VALUES('$nombre', '$apellido', '$usuario', '$pass', '$cargo')";
        $query2 = $conexion->query($sql2);

        if ($query2) {
            header("location: registro.php?success=Usuario creado con éxito");
            exit();
        } else {
            header("location: registro.php?error=Ocurrió un error");
            exit();
        }
    }
} else {
    header('location: index.php');
    exit();
}
?>
