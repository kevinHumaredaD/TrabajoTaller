<?php 
    session_start();
    $tipo=$_GET["tipo"];
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM producto WHERE tipo='$tipo' AND estadovendido=0");
    $producto=$sentencia->fetchAll();
    $stn=$db->query("SELECT * FROM usuario");
    $usuario= $stn->fetchAll();    
    $tipo = strtoupper($tipo);
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
    <h1 class="tittle"><?php echo $tipo ?></h1>
    <div class="contenedor">
        <?php foreach($producto as $p){ ?>
            <?php 
            $idVendedor=$p["idVendedor"];
            foreach ($usuario as $u) {
                if($idVendedor==$u["idCliente"]){
                    $nombre=$u["nombre"];
                    $apellidoP=$u["apellidoP"];
                }
            }
            ?>
                        
            <div class="producto">
            <img  src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"])?>" height="150">
            <p><?php echo $p["nombre"]?></p>
            <p style="color:blue">S/<?php echo $p["precio"]?></p>
            <form action="detalles.php" method="get">
                <input type="hidden" name="id" value="<?php echo $p["id"]?>">                        
                <input type="submit" class="button" value="Ver Detalles">
            </form>
            </div>
                
        <?php } ?>
        
        <?php if(count($producto) == 0) {?>
            <tr>
                <td style="text-align:center" colspan="5">No existen productos registrados hasta el momento</td>
            </tr>
        <?php }?>
    </div>
</body>
</html>