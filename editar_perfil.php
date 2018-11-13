<?php
    session_start();
    $dia=getdate()['mday'];
    $mes=getdate()['mon'];
    $año=getdate()['year'];
    
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
                        <h2 style="color: rgb(82, 241, 8)">Editar mi informacion</h2>
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

                <?php if(isset($_GET["correo"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡El correo ya existe, intente con otro!</strong>
                    </div>
                <?php } ?>
                <?php if(isset($_GET["dni"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡El DNI ya existe, intente con otro!</strong>
                    </div>
                <?php } ?>
                <form action="procesar_perfil.php" method="post">  
                    <input type="hidden" name="idC" value="<?php echo $usuario[0]["idCliente"]?>">
                    <div>
                        <div>
                            <label for="">Nombre:</label>
                        </div>
                        <div>
                            <input type="text" placeholder="Nombre" name="nombre" value="<?php echo $usuario[0]["nombre"]?>">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Apellidos:</label>
                        </div>
                        <div>
                            <input type="text" placeholder="Apellido Paterno" name="apellidoP" value="<?php echo $usuario[0]["apellidoP"]?>">
                            <input type="text" placeholder="Apellido Materno" name="apellidoM" value="<?php echo $usuario[0]["apellidoM"]?>">
                        </div>
                    </div>
                    <div>
                        <div style="margin-left: 0">
                            <div style="margin-left: 0; display: flex">
                                <div>
                                    <label for="">DNI:</label>
                                </div>
                                <div style="margin-left: 155px">
                                    <label for="">Teléfono:</label>
                                </div>
                            </div>
                            <div>
                                <input type="text"  placeholder="Numero de DNI" name="dni" value="<?php echo $usuario[0]["dni"]?>">
                                <input type="text" placeholder="Telefono" name="telefono" value="<?php echo $usuario[0]["telefono"]?>">
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="">Dirección:</label>
                        </div>
                        <div>
                            <input type="text" size="47" placeholder="Direccion" name="direccion" value="<?php echo $usuario[0]["direccion"]?>">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Fecha de Nacimiento:</label>
                        </div>
                        <div>
                            <input type="date" name="fecha_nacimiento" max="<?php echo $año-18?>-<?php echo $mes?>-<?php echo $dia?>" value="<?php echo $usuario[0]["fecha_nacimiento"]?>">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Correo Electrónico:</label>
                        </div>
                        <div>
                            <input type="email" placeholder="correo electronico" name="correo" value="<?php echo $usuario[0]["correo"]?>">
                        </div> 
                    </div>
                    <div style="text-align: center">
                        <input type="submit" value="Actualizar datos" class="botonRegistro">
                    </div>      
                </form>
                </div>
        </div>
    </div>
</body>
</html>