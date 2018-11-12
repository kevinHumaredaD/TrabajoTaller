<?php
    session_start();
    
    if(!isset($_SESSION["correo"])){
        header("Location: error_contenido.php");
    }
    include 'partes/conexion.php';
    $correo=$_SESSION["correo"];
    $sentencia=$db->query("SELECT * FROM usuario WHERE correo='$correo'");
    $usuario= $sentencia->fetchAll();
    $idCliente=$usuario[0]["idCliente"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kean'Store</title>
    <link rel="stylesheet" href="csslogin.css">
</head>
<body>

    <div class="Registro">
        <div class="contenedorRegistro">
                <div style="display: flex">
                    <div class="header">
                        <h2 style="color: rgb(82, 241, 8)">Modificar foto de perfil</h2>
                    </div>
                    <div style="margin: 25px 0 0 30px">
                        <img src="partes/logo.jpg" height="30px" style="padding-top:5px"> 
                    </div>
                </div>
                
                <div class="formularioLogin">
                <?php if(isset($_GET["vacio"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡Por favor, rellene los espacios en blanco!</strong>
                    </div>
                <?php } ?>
                <form action="procesar_foto_perfil.php" method="post" enctype="multipart/form-data">  
                    <input type="hidden" name="idC" value="<?php echo $usuario[0]["idCliente"]?>">
                    <div>
                        <div>
                            <label for="">Nueva foto:</label>
                        </div>
                        <div>
                            <input type="file" name="fotoPerfil">
                        </div> 
                    </div>
                    <div style="text-align: center">
                        <input type="submit" value="Actualizar foto de perfil" class="botonRegistro">
                    </div>      
                </form>
                </div>
        </div>
    </div>
</body>
</html>