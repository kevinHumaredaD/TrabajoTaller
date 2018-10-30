<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Iniciar Sesion</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'partes/header.php' ?>
    <?php if(isset($_GET["1"])) { ?>
            <p class="alerta">Error en la contraseña, intente nuevamente</p>
    <?php } ?>    
    <form action="usuario_procesar.php" method="post">
        <div class="contenedor">
        <div>
            Nombre: <input type="text" name="name" id="name">
        </div>
        <div>
            Apellido Paterno: <input type="text" name="apellidoP" id="apellidoP">
        </div>
        <div>
            Apellido Materno: <input type="text" name="apellidoM" id="apellidoM">
        </div>
        <div>
            DNI: <input type="text" name="dni" id="dni">
        </div>
        <div>
            Fecha de Nacimiento: <input type="date" name="fecha_nacimiento" id="fecha_nacimiento">
        </div>
        <div>
            Dirección: <input type="text" name="direccion" id="direccion">
        </div>
        <div>
            Teléfono: <input type="text" name="telefono" id="telefono">
        </div>
        <div>
            Correo Electrónico: <input type="email" name="correo" id="correo">            
        </div>
        <div>
            Contraseña: <input type="password" name="contraseña" id="contraseña">
        </div>
        <div>
            Confirmar Contraseña: <input type="password" name="confirmar" id="confirmar">
        </div>
        <button type="submit">Registrar</button>
        </div>
    </form>
    
    
    
</body>
</html>