<?php
    session_start();
    include 'partes/conexion.php';
    $id=intval($_GET["id"]);
    
    $sentencia=$db->query("SELECT * FROM producto where id='$id'");
    $producto= $sentencia->fetchAll();
    $stn=$db->query("SELECT * FROM usuario");
    $usuario= $stn->fetchAll();

    if($producto[0]["estadovendido"]==1){
        foreach ($usuario as $u) {
            if($u["correo"]==$_SESSION["correo"]){
                $idVendedor=$u["idCliente"];
            }
        }
        if($producto[0]["idVendedor"]!=$idVendedor && $producto[0]["idComprador"]!=$idVendedor){
            header("Location: error_contenido.php");
        }
    }
    
    
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
        <?php foreach($producto as $p){ ?>
            <h1 class="titulos">Detalles del producto <?php echo $p["nombre"]?></h1>
            
            <div style="display: flex;">
                <div class="imagenesDetalles">
                    <img  src="<?php echo $p["imagen"]?>" height=200">
                </div>
                <div id="detalles">
                    <?php
                        foreach ($usuario as $u) {
                            if($p["idVendedor"]==$u["idCliente"]){
                                $correoVendedor=$u["correo"];
                                $nombreVendedor=$u["nombre"];
                                $apellidoPVendedor=$u["apellidoP"];
                                $apellidoMVendedor=$u["apellidoM"];                        
                            }
                            if(isset($_SESSION["correo"])){
                                if($u["correo"]==$_SESSION["correo"]){
                                    $idcomprador=$u["idCliente"];    
                                } 
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
                    <?php echo $nombreVendedor?> <?php echo $apellidoPVendedor?> <?php echo $apellidoMVendedor?> <br><br>
                    <?php if(isset($_GET["idc"])) { ?>
                        <?php $idc=intval($_GET["idc"]);
                            $stnc=$db->query("SELECT * FROM usuario where idCliente='$idc'");
                            $comprador= $stnc->fetchAll();
                            $compra=$comprador[0];
                        ?>
                        <strong>Comprado por: </strong>  
                        <?php echo $compra["nombre"] ?> <?php echo $compra["apellidoP"]?> <?php echo $compra["apellidoM"]?><br><br>
                    <?php } ?> 
                            
                </div>
            </div>
            <?php if($producto[0]["estadovendido"]==0){?>
                <form action="procesar_compra.php" method="post">
                    <input type="hidden" name="correovendedor" value="<?php echo $correoVendedor ?>">  
                    <input type="hidden" name="idproducto" value="<?php echo $id?>">       
                    <input type="hidden" name="idcomprador" value="<?php echo $idcomprador ?>">
                    <?php if(isset($_GET["error"]) && $_GET["error"]=="1") { ?>
                        <div style="margin: 10px 0 0 400px">
                            <strong class="alerta">No puede comprar su propio producto.</strong>
                        </div>
                    <?php } ?>
                    <input class="boton" type="submit" value="Comprar producto">             
                </form>
            <?php } ?>
        <?php }?>
</body>
</html>