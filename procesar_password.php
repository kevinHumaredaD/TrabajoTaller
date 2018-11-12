<?php 
    session_start();
    $idCliente=$_POST["idC"];
    $contraseña=$_POST["contraseña"];
    $confimar=$_POST["confirmar"];
    include 'partes/conexion.php';
    if(empty($contraseña) || empty($confimar)){
        header("Location: editar_password.php?vacio=1");
    }else {
        if($contraseña!=$confimar){
            header("Location: editar_password.php?error=1");
        }else{
            $contraseña=sha1($contraseña);
            $db->query("UPDATE usuario SET contraseña='$contraseña' WHERE idCliente='$idCliente' ");
            header("Location: index.php");
        }
        
    }    
?>