<?php 
    #Entrada
    $correo=$_POST["correo"];
    $password=$_POST["password"];

    #Proceso
    $validacion=false;
    $p=sha1($p);
    include 'partes/conexion.php'
    $sentencia=$db->query("SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$password' ");
    $usuario= $sentencia->fetchALL();

    if(count($usuario) == 1){
        $validacion=true;
        session_start();
        $u= $usuario[0];
        $_SESSION["correo"]=$u["correo"];
        $_SESSION["nombre"]=$u["nombres"];
        $_SESSION["apellidos"] = $u["apellidos"];
    }
    #Salida
    if($validacion){
        header("Location: index.php");
    }else{
        header("Location: login.php?error=1");
    }
?>