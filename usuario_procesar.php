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
    
    if(empty($nombre) || empty($apellidoP) || empty($apellidoM) || empty($dni) || empty($fecha_nacimiento) 
    || empty($direccion) || empty($telefono) || empty($telefono) || empty($contraseña)){
        header("Location:crear_usuario.php?error=2");
    }
    elseif($contraseña==$confirmar){
        $contraseña=sha1($contraseña);
        include 'partes/conexion.php';
        $db->query("INSERT INTO usuario VALUES(null,'$nombre','$apellidoP','$apellidoM','$correo','$dni','$fecha_nacimiento','$direccion','$telefono','$contraseña')");
        header("Location:index.php");
    }
    else{
        header("Location:crear_usuario.php?error=1");
    }    

?>