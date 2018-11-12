<?php
   $idCliente=$_POST["idCliente"];
   $correoV=$_POST["correovendedor"];
   $reclamo=$_POST["reclamo"];
   $detalle=$_POST["detalle"];
   include 'partes/conexion.php';
   $sentencia=$db->query("SELECT * FROM usuario");
   $usuario= $sentencia->fetchAll();
   $estado=false;
   foreach($usuario as $u){
        if($correoV==$u['correo']){
            $estado=true;
        }               
    }
    if($estado==true){
        if(empty($correoV) || empty($detalle)){
            header("Location: libro_reclamo.php?vacio=1");
        }else{
            $db->query("INSERT INTO reclamo VALUES (NULL, '$correoV', '$reclamo', '$detalle', '$idCliente')");
            header("Location: index.php");
        }   
    }else{
        header("Location: libro_reclamo.php?correo=1");
    }
   
?>