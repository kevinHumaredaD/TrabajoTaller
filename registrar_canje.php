<?php
    session_start();
    include 'partes/conexion.php';
    if(!isset($_SESSION["correo"])|| $_SESSION["correo"]!="admin@admin"){
        header("Location: error_contenido.php");
        die();
    }
    $correo=$_SESSION["correo"];
    $stn=$db->query("SELECT * FROM usuario where correo='$correo'");
    $usuario= $stn->fetchAll();
    $puntaje=$usuario[0]["puntajeventa"]+$usuario[0]["puntajecompra"];
    $sentencia=$db->query("SELECT * FROM canje WHERE estado=0 and puntaje<=$puntaje");
    $canje= $sentencia->fetchAll();
    
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kean'Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'partes/foto.php' ?>
    <?php include 'partes/cliente.php' ?>
    <?php include 'partes/header.php' ?>
    <div class="Formulario">
        <div class="contenedorFormulario">      
            <form action="procesar_registrar_canje.php" method="POST" enctype="multipart/form-data">
                 
                <h1>Formulario de registrar producto canje</h1>    
                <?php if(isset($_GET["vacio"])) { ?>
                    <strong class="alerta">Rellene todos los espacios disponibles.</strong>
                <?php } ?>          
                <div>
                    <div>
                        <label for="">Ingrese el nombre de producto:</label>
                    </div>
                    <div>
                        <input type="text" name="nombre">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Ingrese una imagen del producto:</label>
                    </div>
                    <div>
                        <input name="imagen" type="file"> 
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Fije el puntaje necesario:</label>
                    </div>
                    <div>
                        <input type="number" name="puntaje" id="">
                    </div>
                </div>
                
                <div>
                    <div>
                        <label for="">Descripción:</label>
                    </div>
                    <div>
                        <textarea name="descripcion" cols="50" rows="10"></textarea>
                    </div>
                </div>                                          
                <button type="submit">Registrar Canje</button>
                
            </form>
        </div>
    </div>
    <?php include 'partes/footer.php' ?>
</body>
</html>