<?php
    session_start();
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM producto WHERE estado=0");
    $producto= $sentencia->fetchAll();
    $stn=$db->query("SELECT * FROM usuario");
    $usuario= $stn->fetchAll();
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
    <?php include 'partes/cliente.php' ?>
    <?php include 'partes/header.php' ?>
    <table class="tabla">
        <tr>
            <th>Vendedor</th>
            <th>Nombre del producto</th>
            <th>Imagen</th>
            <th>Detalles</th>
            <th>Estado</th>
        </tr>
        <?php foreach($producto as $p){ ?>
            <?php 
            $idCliente=$p["idCliente"];
            foreach ($usuario as $u) {
                if($idCliente==$u["idCliente"]){
                    $nombre=$u["nombre"];
                    $apellidoP=$u["apellidoP"];
                }
            }
            ?>
            <tr>
                <td><?php echo $nombre?> <?php echo $apellidoP?></td>
                <td><?php echo $p["nombre"]?></td>
                <td><img  src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"])?>" height="150"></td>
                <td>
                    <form action="detalles.php" method="get">
                        <input type="hidden" name="id" value="<?php echo $p["id"]?>">                        
                        <input type="submit" value="Compra">
                    </form>
                </td>
                <td><p>En venta</p></td>
            </tr>
        <?php } ?>
        <?php if(count($producto) == 0) {?>
            <tr>
                <td style="text-align:center" colspan="5">No existen productos registrados hasta el momento</td>
            </tr>
        <?php }?>
    </table>
</body>
</html>