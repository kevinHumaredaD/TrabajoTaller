<?php
    session_start();
    if(!isset($_SESSION["correo"])){
        header("Location: error_contenido.php");
        die();
    }
    
    include 'partes/conexion.php';
    $id=intval($_GET["id"]);    
    $sentencia=$db->query("SELECT * FROM canje where id='$id'");
    $canje= $sentencia->fetchAll();
    $correo=$_SESSION["correo"];
    $stn=$db->query("SELECT * FROM usuario where correo='$correo'");
    $usuario= $stn->fetchAll();
    $pv=$usuario[0]["puntajeventa"];
    $pc=$usuario[0]["puntajecompra"];
    $puntajeTotal=$pv+$pc;
    if($puntajeTotal<$canje[0]["puntaje"]){
        header("Location: error_contenido.php");
    }
    if($canje[0]["estado"]==1){
        $idUsuario=$usuario[0]["idCliente"];
        if($canje[0]["idCanjeador"]!=$idUsuario){
            header("Location: error_contenido.php");
        }
    }
    $u=$usuario[0];
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
    
    <?php foreach($canje as $c){ ?>
        <h1 class="titulos">Detalles del producto <?php echo $c["nombre"]?></h1>        
        <div style="display: flex;">
            <div class="imagenesDetalles">
                <img  src="<?php echo $c["imagen"]?>" height=200">
            </div>
            <div id="detalles">
            
                <strong>Nombre:</strong>
                <?php echo $c["nombre"]?><br><br>
                <strong>Descripcion:</strong>
                <?php echo $c["descripcion"]?><br><br>
                <strong>Puntaje:</strong>
                <?php echo $c["puntaje"]?><br><br>            
                                         
        </div>
                </div>
                <form action="procesar_canje.php" method="post">                     
                    <input type="hidden" name="idcanje" value="<?php echo $id?>">    
                    <input type="hidden" name="puntaje" value="<?php echo $c["puntaje"]?>">  
                    <input type="hidden" name="puntajeventa" value="<?php echo $u["puntajeventa"]?>">
                    <input type="hidden" name="puntajecompra" value="<?php echo $u["puntajecompra"]?>">  
                    <input type="hidden" name="idcanjeador" value="<?php echo $u["idCliente"]?>">                    
                    <input class="boton" type="submit" value="Canjear">                    
                </form>
        
        </div>   
    <?php }?>
    <?php include 'partes/footer.php' ?>
</body>
</html>