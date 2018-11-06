<?php
    session_start();
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM usuario");
    $usuario= $sentencia->fetchAll();
    foreach($usuario as $u){
        if($_SESSION["correo"]==$u["correo"]){
            $id=$u["idCliente"];
        }       
    }
    $stn=$db->query("SELECT * FROM producto where idCliente='$id' ");
    $producto= $stn->fetchAll();
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
    <h2 class="titulos">Productos registrados</h2>
    <table class="tablaProductoCliente">
        <tr>
            <th>Nombre del producto</th>
            <th>Imagen</th>
            <th>Precio</th>
            <th>Tipo</th>
            <th>Descripcion</th>
            <th>Estado</th>
        </tr>

        <?php foreach($producto as $p){ ?>        
            <tr>
                <td><?php echo $p["nombre"]?></td>
                <td><img  src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"])?>" height="150"></td>
                <td><?php echo $p["precio"]?></td>
                <td><?php echo $p["tipo"]?></td>
                <td><div style="width: 600px; height: 100px"><?php echo $p["descripcion"]?></div></td>
                <?php if($p["estado"]==1) { ?>
                    <td><p>Vendido</p></td>
                <?php } else { ?>               
                    <td><p>En espera</p></td>
                <?php } ?>
                
            </tr>
        <?php } ?>
        <?php if(count($producto) == 0) {?>
            <tr>
                <td style="text-align:center" colspan="6">No tiene productos registrados</td>
            </tr>
        <?php }?>
    </table>
</body>
</html>