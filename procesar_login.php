<?php 
    #Entrada
    $correo=$_POST["correo"];
    $password=$_POST["password"];
    #Proceso
    $validacion=false;
    $p=sha1($password);
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM usuario WHERE correo='$correo' AND contraseña='$p' ");
    $usuario= $sentencia->fetchALL();
    if(count($usuario) == 1){
        $validacion=true;
        session_start();
        $u= $usuario[0];
        $_SESSION["correo"]=$u["correo"];
        $_SESSION["nombre"]=$u["nombre"];
        $_SESSION["apellidoP"]=$u["apellidoP"];
        $_SESSION["apellidoM"]=$u["apellidoM"];
        
    }
    #Salida
    if($validacion){
        header("Location: index.php");
    }else{
        header("Location: login.php?error=1");
    }
?>