<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {
    header('location: ../index.php');
} else {

    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Registro</title>
        <link rel="stylesheet" href="stylesregistro.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    </head>

    <body class="yup">
        <div class="principal">
            <div class="header">
                <form action="registrar.php" method="POST" class="text-center">
                    <?php if (isset($_GET['error'])) { ?>
                        <p class="error">
                            <?php echo $_GET['error'] ?>
                        </p>
                    <?php } ?>
                    <br>
                    <?php if (isset($_GET['success'])) { ?>
                        <p class="success">
                            <?php echo $_GET['success'] ?>
                        </p>
                    <?php } ?>
                    <br>

                    <label>Nombre</label>
                    <input type="text" name="nombre" placeholder="Nombre" class="form-control" maxlength="15">
                    <br>
                    <label>Apellido</label>
                    <input type="text" name="apellido" placeholder="Apellido" class="form-control" maxlength="15">
                    <br>
                    <label>Cargo</label>
                    <input type="text" name="cargo" placeholder="Cargo" class="form-control" maxlength="15">
                    <br>
                    <label>Usuario</label>
                    <input type="text" name="usuario" placeholder="Nombre de Usuario" class="form-control" maxlength="20">
                    <br>
                    <label>Contraseña</label>
                    <input type="password" name="pass" placeholder="Contraseña" class="form-control" maxlength="30">
                    <br>
                    <label>Repetir Contraseña</label>
                    <input type="password" name="Rpass" placeholder="Repetir Contraseña" class="form-control" maxlength="30">
                    <br>

                    <button type='submit' class="btn btn-success">Crear Cuenta</button>
                    <br><br>

                    <label>Ya tienes una cuenta? Inicia Sesión</label><br>
                    <a href="login.php" class="btn btn-primary" tabindex="-1" role="button"
                        aria-disabled="true">Iniciar
                        Sesión</a>

                </form>
            </div>


    </body>

    </html>
<?php } ?>