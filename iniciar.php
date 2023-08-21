<?php
    session_start();
    include_once('conexion.php');
    if(isset($_POST['usuario']) && isset($_POST['pass'])){
        function validar($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }

        $Usuario = validar($_POST['usuario']);
        $Pass = validar($_POST['pass']);

        if(empty($Usuario)){
            header("location: login.php?error=El usuario es requerido");
            exit();
        }elseif(empty($Pass)){
            header("location: login.php?error=La contraseña es requerida");
            exit();
        }else{
            $sql = "SELECT * FROM administracion WHERE usuario = '$Usuario'";
            $query = mysqli_query($conexion, $sql);
            
            if($query->num_rows==1){
                $usuarioQ = $query->fetch_assoc();
                
                $id = $usuarioQ['id'];
                $usuario1 = $usuarioQ['usuario'];
                $pass1 = $usuarioQ['pass'];

                if($usuario1 === $Usuario){
                    if($Pass === $pass1){
                        $_SESSION['id'] = $id;
                        $_SESSION['usuario'] = $usuario1;
    
                        header('Location: index.php');
                    }else{
                        header('Location: login.php?error=Usuario o clave incorrecta ');
                    }
                }else{
                    header('Location: login.php?error=Usuario o clave incorrecta ');
                }
            }else{
                header('Location: login.php?error=Usuario o clave incorrecta'); 
            }
        }
    }
?>
