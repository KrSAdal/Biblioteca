<?php
//CONEXION
$server = "localhost";
$user = "root";
$pass = "";
$db = "agencia_viajes";
$conn = mysqli_connect($server, $user, $pass, $db);
if(!$conn){
    die("La conexión fallo: " . mysqli_connect_error());
}else{
    include_once('delete.php');
    $id = $_GET['id'];
    $sql = "DELETE FROM viajero WHERE id = ". $id ."";
    
    if(mysqli_query($conn, $sql)){
        header("Location: listado.php");
    }else{
        echo "Error: " . mysqli_error($conn);
    }
    
}
?>