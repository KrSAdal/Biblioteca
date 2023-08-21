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
                    <li><a href="#"><label for="inicio">Inicio</label></a></li>
                    <li><a href="registrarCliente.php"><label for="inicio">Registrar Clientes</label></a></li>
                    <li><a href="registrarLibro.php"><label for="inicio">Registrar Libros</label></a></li>
                    <li><a href="registrarPrestamo.php"><label for="inicio">Registrar Préstamos</label></a></li>
                    <li><a href="listado.php"><label for="inicio">Historial de Préstamo</label></a></li>
                    <li><a href="cerrar.php"><label for="inicio">Cerrar Sesión</label></a></li>
                </ul>
            </div>

            <form id="form2" name="form2" method="POST" action="listado.php">
                <div class="col-12 row">
                    <table class="table">
                        <thead>
                            <tr class="filters">
                                <th>
                                    Libro
                                    <select name="buscarLibro" class="form-control mt-2"
                                        style="border: #bababa 1px solid; color:#000000;">
                                        <option value="Todos">Todos</option>
                                        <?php
                                        $server = "localhost";
                                        $user = "root";
                                        $pass = "";
                                        $db = "biblioteca";
                                        $conn = mysqli_connect($server, $user, $pass, $db);

                                        if ($conn) {
                                            $sql = "SELECT DISTINCT titulo FROM libro";
                                            $resultado = mysqli_query($conn, $sql);

                                            while ($row = $resultado->fetch_assoc()) {
                                                $nombreViajero = $row['titulo'];
                                                echo "<option value='$tituloLibro'>$tituloLibro</option>";
                                            }
                                            mysqli_close($conn);
                                        }
                                        ?>
                                    </select>

                                </th>
                            </tr>
                        </thead>
                    </table>
                    <input type="submit" class="btn btn-success" value="Ver">;
                </div>

                <?php
                if (isset($_POST["buscarLibro"])) {
                    if ($_POST["buscarLibro"] == 'Todos') {
                        $filtro = '';
                    } else {
                        $filtro = "WHERE titulo = '" . $_POST["buscarLibro"] . "'";
                    }
                } else {
                    $filtro = '';
                }

                ?>
            </form>



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
                        <th scope="col">Libro Prestado</th>
                        <th scope="col">Fecha Préstamo</th>
                        <th scope="col">Fecha Devolución</th>
                        <th scope="col">Usuario a Cargo</th>
                        <th scope="col">Estado</th>
                        <th scope="col">Acción</th>
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
                    $sql2 = "SELECT * FROM viajero $filtro";
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
                            echo "<td>" . $row[''] . "</td>";
                            ?>
                            <td>
                                <a href="delete.php?id=<?php echo $row['id']; ?>&primernombre=<?php echo urlencode($row['primernombre']);
                                   ?>&segundonombre=<?php echo urlencode($row['segundonombre']);
                                   ?>&primerapellido=<?php echo urlencode($row['primerapellido']);
                                   ?>&segundoapellido=<?php echo urlencode($row['segundoapellido']);
                                   ?>&telefono=<?php echo urlencode($row['telefono']);
                                   ?>&correo=<?php echo urlencode($row['correo']);
                                   ?>&lugar=<?php echo urlencode($row['lugar']);
                                   ?>&fecha_ida=<?php echo urlencode($row['fecha_ida']);
                                   ?>&fecha_regreso=<?php echo urlencode($row['fecha_regreso']);
                                   ?>&motivo=<?php echo urlencode($row['motivo']);
                                   ?>">
                                    <button type="button" class="btn btn-danger"><i class="bi bi-trash"></i></button></a>
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