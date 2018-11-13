<?php
    session_start();
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM producto WHERE estadovendido=0");
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
    <?php include 'partes/foto.php' ?>
    <?php include 'partes/cliente.php' ?>
    <?php include 'partes/header.php' ?>
    <div class="contenedor" style="margin-top: 15px">
        <?php foreach($producto as $p){ ?>
            <?php 
            $idVendedor=$p["idVendedor"];
            foreach ($usuario as $u) {
                if($idVendedor==$u["idCliente"]){
                    $nombre=$u["nombre"];
                    $apellidoP=$u["apellidoP"];
                    $correo=$u["correo"];
                }
            }
            ?>
                        
            <div class="producto">
            <img  src="<?php echo $p["imagen"]?>" height="150">
            <p><?php echo $p["nombre"]?></p>
            <p style="color:blue">S/<?php echo $p["precio"]?></p>
            <form action="detalles.php" method="get">
                <input type="hidden" name="id" value="<?php echo $p["id"]?>">      
                                 
                <input type="submit" class="button" value="Ver Detalles">
            </form>
            <?php if(isset($_SESSION["correo"])){ ?>
                <?php if($correo!=$_SESSION["correo"]) { ?> 
                <form action="perfil.php" method="get">
                    <input type="hidden" name="idperfil" value="<?php echo $idVendedor?>">    
                                                                
                    <input type="submit" class="button" style="margin:10px 0px" value="Perfil Vendedor">
                </form>
                <?php } ?>  
            <?php } ?>
            </div>
                
        <?php } ?>
        
        <?php if(count($producto) == 0) {?>
            
         <strong style="text-align:center" >No existen productos registrados hasta el momento</strong>
            
        <?php }?>
    </div>
    <?php include 'partes/footer.php' ?>
</body>
</html>