<?php
    session_start();
    include 'partes/conexion.php';
    $id=intval($_GET["id"]);
    $sentencia=$db->query("SELECT * FROM producto where id='$id'");
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
    
    <?php foreach($producto as $p){ ?>
        <h1 class="titulos">Detalles del producto <?php echo $p["nombre"]?></h1>
        <?php if(isset($_GET["error"]) && $_GET["error"]=="1") { ?>
            <strong class="alerta">No puede comprar su propio producto.</strong>
        <?php } ?>
        <div style="display: flex;">
            <div class="imagenesDetalles">
                <img  src="data:image/jpg;base64,<?php echo base64_encode($p["imagen"])?>" height=200">
            </div>
            <div id="detalles">
            <?php
                foreach ($usuario as $u) {
                    if($p["idCliente"]==$u["idCliente"]){
                        $correoVendedor=$u["correo"];
                        $nombreVendedor=$u["nombre"];
                        $apellidoPVendedor=$u["apellidoP"];
                        $apellidoMVendedor=$u["apellidoM"];                        
                    }
                }
            ?>
                <strong>Nombre:</strong>
                <?php echo $p["nombre"]?><br><br>
                <strong>Descripcion:</strong>
                <?php echo $p["descripcion"]?><br><br>
                <strong>Precio:</strong>
                S/.<?php echo $p["precio"]?><br><br>
                <strong>Tipo:</strong>
                <?php echo $p["tipo"]?><br><br>
                <strong>Vendedor:</strong>
                <?php echo $nombreVendedor?> <?php echo $apellidoPVendedor?> <?php echo $apellidoMVendedor?>            
        </div>
        </div>
            <form action="Procesar_compra.php" method="post">
                <input type="hidden" name="correovendedor" value="<?php echo $correoVendedor ?>">  
                <input type="hidden" name="idproducto" value="<?php echo $id ?>">        
                <button type="submit">COMPRAR PRODUCTO</button>                
            </form>
        </div>   
    <?php }?>
</body>
</html>