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
    <h1>Kean Store</h1>
    <?php include 'partes/header.php' ?>
    
    <div class="Formulario">
        <div class="contenedorFormulario">
            <form action="usuario_procesar.php" method="post">
                <?php if(isset($_GET["error"])) { ?>
                <strong class="alerta">Error en la confirmación de contraseña</strong>
                    <?php } ?>
                <?php if(isset($_GET["correo"])) { ?>
                    <strong class="alerta">Error,ese correo ya existe. Intente con otro</strong>
                <?php } ?>   
                <div>
                    <div>
                        <label for="">Nombre:</label>
                    </div>
                    <div>
                        <input type="text" name="nombre">
                    </div> 
                </div>
                <div>
                    <div>
                        <label for="">Apellidos:</label>
                    </div>
                    <div style="display: flex">
                        <div>
                            <input type="text" placeholder="Apellido Paterno" name="apellidoP">
                            <input type="text" placeholder="Apellido Materno" name="apellidoM">
                        </div>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">DNI:</label>
                    </div>
                    <div>
                        <input type="text" name="dni">
                    </div> 
                </div>
                <div>
                    <div>
                        <label for="">Fecha de Nacimiento:</label>
                    </div>
                    <div>
                        <input type="date" name="fecha_nacimiento">
                    </div> 
                </div>
                <div>
                    <div>
                        <label for="">Dirección:</label>
                    </div>
                    <div>
                        <input type="text" name="direccion">
                    </div> 
                </div>
                <div>
                    <div>
                        <label for="">Teléfono:</label>
                    </div>
                    <div>
                        <input type="text" name="telefono">
                    </div> 
                </div>
                <div>
                    <div>
                        <label for="">Correo Electrónico:</label>
                    </div>
                    <div>
                        <input type="email" name="correo">
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

                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>
</body>
</html>