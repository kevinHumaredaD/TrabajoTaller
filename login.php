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
    <div class="Login">
        <div>
            <div class="contenedorLogin">
                <div style="text-align: center; padding-top: 15px">
                    <img src="partes/logo.jpg" height="40px" style="padding-top:5px"> 
                </div>
                <div class="header" style="text-align: center">
                    <h2>Iniciar Sesión</h2>
                </div>
                <div class="formularioLogin">
                    <form action="procesar_login.php" method="post">
                        <div style="display: flex">
                            <div class="form">
                                <img src="partes/imagenLogin.jpg" width="30">
                            </div>
                            <div>
                                <input type="text"  size="40" placeholder="Ingrese su correo" name="correo">   
                            </div>
                        </div>
                        <div style="display: flex">
                            <div class="form">
                                <img src="partes/candadoLogin.jpg" width="30" height="30">
                            </div>
                            <div>
                                <input type="password" size="40" placeholder="Ingrese su contraseña" name="password">
                            </div>    
                        </div>
                        <input type="submit" value="Ingresar" class="botonLogin" style="font-family: Arial;">
                    </form>
                </div>
                <?php if(isset($_GET["error"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡El correo o la contraseña no coinciden!</strong>
                    </div>
                <?php } ?>
                <?php if(isset($_GET["compra"])){?>
                    <div style="margin: 20px; text-align:center">
                        <strong class="alerta">¡Necesita iniciar sesión para comprar!</strong>
                    </div>
                <?php } ?>
                <div style="margin-top: 15px">
                    <div class="link">
                        ¿Todavia no tienes una cuenta?<a href="crear_usuario.php">Registrate</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>