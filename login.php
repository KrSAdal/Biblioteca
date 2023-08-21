<?php
session_start();
if (isset($_SESSION['id']) && isset($_SESSION['usuario'])) {
    header('location: index.php');
} else {
    ?>
    <!DOCTYPE html>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Iniciar Sesión</title>
        <link rel="stylesheet" href="styles.css">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
            integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">

    </head>

    <body class="yup">
        <div class="principal">
            <div class="barralateral">
                <div class="container h-100">
                    <form action="iniciar.php" method="POST" class="text-center">
                        <?php if (isset($_GET['error'])) { ?>
                            <p>
                                <?php echo $_GET['error'] ?>
                            </p>
                        <?php } ?>
                        <br>
                        <br>

                        <i class="fas fa-user"></i>
                        <label>Usuario</label>
                        <input type="text" name="usuario" placeholder="Nombre de Usuario" class="form-control" maxlength="15"> 
                        <br>

                        <i class="fas fa-unlock"></i>
                        <label>Contraseña</label>
                        <input type="password" name="pass" placeholder="Contraseña" class="form-control" maxlength="15">
                        <br>

                        <button type='submit' class="btn btn-success">Iniciar Sesión</button>
                        <br><br>
                        <a href="registro.php" class="btn btn-primary" tabindex="-1" role="button"
                            aria-disabled="true">Crear Cuenta</a>
                        <br>
                        <label>No tienes una cuenta? Creala </label>
                    </form>
                </div>
            </div>
        </div>
    </body>

    </html>

<?php } ?>