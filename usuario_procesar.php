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
        
    if($contraseña!=$confirmar){
        header("Location:crear_usuario.php?error=1");
    }
    else{               
        $contraseña=sha1($contraseña);
        include 'partes/conexion.php';
        $db->query("INSERT INTO usuario VALUES(null,'$nombre','$apellidoP','$apellidoM','$correo','$dni','$fecha_nacimiento','$direccion','$telefono','$contraseña')");
        header("Location:index.php");
        
    }
       

?>