<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="stylesregistroviajero.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">

    </head>

    <body class="yup">
        <div class="principal">
            <div class="barralateral">
                <img src="" alt="">
                <div class="barraoculta">
                    <i class="fa fa-times" aria-hidden="true"></i>
                    <img src="https://pm1.aminoapps.com/8402/a81ad5903e36df22e838e3c27f17e95f09cd3cbar1-1070-1637v2_hq.jpg"
                        style="width: 90px;" alt=":(">
                </div>
                <ul>
                    <li><a href="#"><label for="inicio">Inicio</label></a></li>
                    <li><a href="registrarCliente.php"><label for="inicio">Registrar Clientes</label></a></li>
                    <li><a href="registrarLibro.php"><label for="inicio">Registrar Libros</label></a></li>
                    <li><a href="registrarPrestamo.php"><label for="inicio">Registrar Préstamos</label></a></li>
                    <li><a href="historial.php"><label for="inicio">Historial de Préstamo</label></a></li>
                    <li><a href="cerrar.php"><label for="inicio">Cerrar Sesión</label></a></li>
                </ul>
            </div>

            <div class="header">
                <form action="funcionregistrar.php" method="POST">

                    <div class="mb-3">
                        <label for="1nombre" class="form-label">Primer Nombre</label>
                        <input type="text" class="form-control" name="1nombre" placeholder="" maxlength="30" required>
                    </div>
                    <div class="mb-3">
                        <label for="2nombre" class="form-label">Segundo Nombre</label>
                        <input type="text" class="form-control" name="2nombre" placeholder="" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="1apellido" class="form-label">Primer Apellido</label>
                        <input type="text" class="form-control" name="1apellido" placeholder="" required maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="2apellido" class="form-label">Segundo Apellido</label>
                        <input type="text" class="form-control" name="2apellido" placeholder="" maxlength="30">
                    </div>
                    <div class="mb-3">
                        <label for="tel" class="form-label">Teléfono </label>
                        <input type="number" class="form-control" name="telefono" placeholder="" maxlength="10" min="0">
                    </div>
                    <div class="mb-3">
                        <label for="correo" class="form-label">Correo Electrónico</label>
                        <input type="text" class="form-control" name="correo" placeholder="" maxlength="30">
                    </div>
                    <div class="footer">
                        <div class="col-auto">
                            <button type="submit" class="btn btn-primary ">Registrar</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>

    </body>

    </html>
<?php } else {
    header('location: index.php');
} ?>