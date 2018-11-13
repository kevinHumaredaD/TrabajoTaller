<?php 
    $dia=getdate()['mday'];
    $mes=getdate()['mon'];
    $año=getdate()['year'];
    
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
                        <h2 style="color: rgb(82, 241, 8)">Crear cuenta de usuario</h2>
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
                <?php if(isset($_GET["incorrect"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡Las contraseña no coinciden!</strong>
                    </div>
                <?php } ?>
                <?php if(isset($_GET["error"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡Error en la confirmación de contraseña!</strong>
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
                <form action="procesar_usuario.php" method="post">  
                    <div>
                        <div>
                            <label for="">Nombre:</label>
                        </div>
                        <div>
                            <input type="text" placeholder="Nombre" name="nombre">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Apellidos:</label>
                        </div>
                        <div>
                            <input type="text" placeholder="Apellido Paterno" name="apellidoP">
                            <input type="text" placeholder="Apellido Materno" name="apellidoM">
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
                                <input type="text"  placeholder="Numero de DNI"name="dni">
                                <input type="text" placeholder="Telefono" name="telefono">
                            </div> 
                        </div>
                    </div>
                    <div>
                        <div>
                            <label for="">Dirección:</label>
                        </div>
                        <div>
                            <input type="text" size="47" placeholder="Direccion" name="direccion">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Fecha de Nacimiento:</label>
                        </div>
                        <div>
                            <input type="date" name="fecha_nacimiento" max="<?php echo $año-18?>-<?php echo $mes?>-<?php echo $dia?>">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Correo Electrónico:</label>
                        </div>
                        <div>
                            <input type="email" placeholder="correo electronico" name="correo">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Contraseña:</label>
                        </div>
                        <div>
                            <input type="password" name="contraseña">
                        </div> 
                    </div>
                    <div>
                        <div>
                            <label for="">Confirmar contraseña:</label>
                        </div>
                        <div>
                            <input type="password" name="confirmar">
                        </div> 
                    </div>
                    <div style="text-align: center">
                        <input type="submit" value="Registrarme" class="botonRegistro">
                    </div>      
                </form>
                </div>
                <div style="margin-top: 15px">
                    <div class="link">
                        ¿Ya tienes una cuenta?<a href="login.php">Inicia sesión</a>
                    </div>
                </div>
        </div>
    </div>
</body>
</html>