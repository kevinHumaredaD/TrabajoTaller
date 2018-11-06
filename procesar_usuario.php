<?php 
    $nombre=$_POST["nombre"];
    $apellidoP=$_POST["apellidoP"];
    $apellidoM=$_POST["apellidoM"];
    $dni=$_POST["dni"];
    $fecha_nacimiento=$_POST["fecha_nacimiento"];
    $direccion=$_POST["direccion"];
    $telefono=$_POST["telefono"];
    $correo=$_POST["correo"];
    $contraseña=$_POST["contraseña"];
    $confirmar=$_POST["confirmar"];    
    include 'partes/conexion.php';    
    $sentencia=$db->query("SELECT * FROM usuario");
    $usuario= $sentencia->fetchAll();
    $estado=false;
    foreach($usuario as $u){
        if($correo==$u['correo']){
            header("Location:crear_usuario.php?correo=1");
            $estado=true;
        }               
    }
    if($estado==false){
        if(empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($dni) || empty($fecha_nacimiento) || empty($direccion) || empty($telefono) || empty($correo) || empty($contraseña) || empty($confirmar)){
            header("Location: crear_usuario.php?vacio=2");
        }else{
            if($contraseña!=$confirmar){
                header("Location: crear_usuario.php?error=1");
            }else{
                $contraseña=sha1($contraseña);        
                $db->query("INSERT INTO usuario VALUES(null,'$nombre','$apellidoP','$apellidoM','$correo','$dni','$fecha_nacimiento','$direccion','$telefono','$contraseña','0')");
                
                header("Location:index.php");
            }
        }

    }
   