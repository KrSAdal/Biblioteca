<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Listado</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="stylesListado.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">

    </head>

    <body class="yup">
        <div class="principal">
            <div class="barralateral">
                <div class="barraoculta">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <img src="https://pm1.aminoapps.com/8402/a81ad5903e36df22e838e3c27f17e95f09cd3cbar1-1070-1637v2_hq.jpg"
                        style="width: 100px;" alt=":(">
                </div>
                <ul>
                    <li><a href="index.php"><label for="inicio">Inicio</label></a></li>
                    <li><a href="registrarCliente.php"><label for="inicio">Registrar Clientes</label></a></li>
                    <li><a href="registrarLibro.php"><label for="inicio">Registrar Libros</label></a></li>
                    <li><a href="listado.php"><label for="inicio">Listado de Usuarios</label></a></li>
                    <li><a href="historial.php"><label for="inicio">Historial de Prestamos</label></a></li>
                    <li><a href="cerrar.php"><label for="inicio">Cerrar Sesión</label></a></li>
                </ul>
            </div>

            <table class="table table-sm table-striped table-bordered">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Primer Nombre</th>
                        <th scope="col">Segundo Nombre</th>
                        <th scope="col">Primer Apellido</th>
                        <th scope="col">Segundo Apellido</th>
                        <th scope="col">Teléfono</th>
                        <th scope="col">Correo Electrónico</th>
                        <th scope="col">Prestamo</th>
                    </tr>
                </thead>
                <?php

                $server = "localhost";
                $user = "root";
                $pass = "";
                $db = "biblioteca";
                $conn = mysqli_connect($server, $user, $pass, $db);

                if (!$conn) {
                    die("La conexion fallo: " . mysqli_connect_error());
                } else {
                    $sql2 = "SELECT * FROM cliente ";
                    $resultado = mysqli_query($conn, $sql2);
                    if ($resultado) {
                        while ($row = $resultado->fetch_array()) {
                            echo "<tr>";
                            echo "<td>" . $row['id'] . "</td>";
                            echo "<td>" . $row['primernombre'] . "</td>";
                            echo "<td>" . $row['segundonombre'] . "</td>";
                            echo "<td>" . $row['primerapellido'] . "</td>";
                            echo "<td>" . $row['segundoapellido'] . "</td>";
                            echo "<td>" . $row['telefono'] . "</td>";
                            echo "<td>" . $row['correo'] . "</td>";
                            ?>
                            <td><a href="registrarPrestamo.php?id=<?php echo $row['id'];
                            ?>&primernombre=<?php echo urlencode($row['primernombre']);
                            ?>&segundonombre=<?php echo urlencode($row['segundonombre']);
                            ?>&primerapellido=<?php echo urlencode($row['primerapellido']);
                            ?>&segundoapellido=<?php echo urlencode($row['segundoapellido']);
                            ?>&telefono=<?php echo urlencode($row['telefono']);
                            ?>&correo=<?php echo urlencode($row['correo']);
                            ?>"><button type="button" class="btn btn-warning"><i class="bi bi-arrow-up"></button></i></button></a>
                            </td>
                            <?php
                            echo "</tr>";
                        }
                    }
                }
                ?>
            </table>
        </div>

    </body>

    </html>
    <?php
} else {
    header('location: index.php');
}

?>