<?php
    session_start();
    include 'partes/conexion.php';
    if(!isset($_SESSION["correo"])){
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
    <div class="contenedor" style="margin-top: 15px">
        <div style="font-size: 20px; width: 100%; margin: 15px 20px 0 0; text-align:right">
            <strong>Mis Puntos: <?php echo $puntaje?></strong>
        </div>

        <?php foreach($canje as $c){ ?>                                   
            <div class="producto">
            <img  src="<?php echo $c["imagen"]?>" height="150">
            <p><?php echo $c["nombre"]?></p>
            <p style="color:blue">Puntos:<?php echo $c["puntaje"]?></p>
            <form action="detalles_canje.php" method="get">
                <input type="hidden" name="id" value="<?php echo $c["id"]?>">                        
                <input type="submit" class="button" value="Ver Detalles">
            </form>
            </div>
                
        <?php } ?>
        
        <?php if(count($canje) == 0) {?> 
                           
                <strong style="text-align:center; width: 100%">No existen productos que puedas canjear hasta el momento</strong>
            
        <?php }?>
    </div>
</body>
</html>