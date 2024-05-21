<?php
session_start();
if (!empty($POST["btningresar"])) {
    if(!empty($_POST("usuario")) and !empty($_POST["password"])) {
        $usuario=$_POST["usuario"];
        $password=$_POST["password"];
        $sql=$conexion->query("select * from usuario where usuario = '$usuario' and clave='$password' " );
        if($datos=$sql->fetch_object()){
            $_SESSION["id"]=$datos->id;
            $_SESSION["nombre"]=$datos->nombre;
            $_SESSION["apellido"]=$datos->apellido;
            header("location: template/login.php");
        } else {
            echo "<div class='alert alert-danger'>Acceso denegado";
        }
    } else {
        echo "Campos vacios";
    }
}

?>