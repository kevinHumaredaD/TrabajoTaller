<?php 
include 'partes/conexion.php'
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>TallerP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Kean Store</h1>
    <?php include 'partes/header.php' ?>
    <h2 style="text-align: center">Iniciar sesión</h2>
    <div class="Formulario">
        <div class="contenedorFormulario">
            <?php if(isset($_GET["error"])){?>
                    <strong class="alerta">Datos Incorrectos.</strong>
            <?php } ?>
            
            <form action="login_procesar.php" method="post">
                <div style="display: flex">
                    <div>
                        <div>
                            <label for="">Correo:</label>
                        </div>
                        <div style="padding-top: 15px"> 
                            <label for="">Contraseña:</label>      
                        </div>
                    </div>
                    <div>
                        <div>
                            <input type="text" placeholder="correo" name="correo">
                        </div>
                        <div> 
                            <input type="password" name="password">
                        </div>
                    </div>
                </div>
                <button type="submit">Enviar</button>
            </form>
        </div>
    </div>
</body>
</html>
