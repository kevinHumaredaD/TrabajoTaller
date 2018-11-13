<?php 
    session_start();
    $idCliente=$_POST["idC"];
    $nombre=$_POST["nombre"];
    $apellidoP=$_POST["apellidoP"];
    $apellidoM=$_POST["apellidoM"];
    $dni=$_POST["dni"];
    $fecha_nacimiento=$_POST["fecha_nacimiento"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM usuario");
    $usuario= $sentencia->fetchAll();
    $estado=false;
    if($correo!=$_SESSION["correo"]){
        $estado=true;
    }
    if($estado==true){
        foreach($usuario as $u){
            if($correo==$u['correo']){
                header("Location: editar_perfil.php?correo=1");
                $estado=true;
            }               
            else{
                if($dni==$u['dni']){
                    header("Location: editar_perfil.php?dni=1");
                    $estado=true;
                }  
            }
        }
    }else{
        if(empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($dni) || empty($fecha_nacimiento) || empty($direccion) || empty($telefono) || empty($correo)){
            header("Location: editar_perfil.php?vacio=1");
        }else{
                $db->query("UPDATE usuario SET nombre='$nombre', apellidoP='$apellidoP', apellidoM='$apellidoM', correo='$correo', dni='$dni', fecha_nacimiento='$fecha_nacimiento', direccion='$direccion', telefono='$telefono' WHERE idCliente='$idCliente' ");
                
                $_SESSION["nombre"]=$nombre;
                $_SESSION["apellidoP"]=$apellidoP;
                $_SESSION["apellidoM"]=$apellidoM;
                header("Location:index.php");
        } 
    }   
?>