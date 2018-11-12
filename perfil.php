<?php 
    session_start();
    include 'partes/conexion.php';
    if(!isset($_SESSION["correo"])){
        header("Location: error_contenido.php");
        die();
    }
    $correo=$_SESSION["correo"];

    
    if(isset($_GET["idperfil"])){
        $id=intval($_GET["idperfil"]);
        $sentencia=$db->query("SELECT * FROM usuario WHERE idCliente = '$id' ");
        $usuario=$sentencia->fetchAll();
        $u=$usuario[0];
        $id=$u["idCliente"];
    }
    else{
        $sentencia=$db->query("SELECT * FROM usuario WHERE correo = '$correo' ");
        $usuario=$sentencia->fetchAll();
        $u=$usuario[0];
        $id=$u["idCliente"];
    }
    
        
    $stn=$db->query("SELECT * FROM producto where idVendedor='$id' order by id desc ");
    $productoventa= $stn->fetchAll();
    $stnc=$db->query("SELECT * FROM producto where idComprador='$id' ");
    $productocompra= $stnc->fetchAll();
    if($u["valoracion"]==0){
        $estrella=0;
        }
    else{
        $estrella=round($u["valoracion"]/$u["contador"], 0, PHP_ROUND_HALF_UP);
        
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
    <?php include 'partes/cliente.php'?>
    <?php include 'partes/header.php'?>
    
    <?php if(isset($_GET["idperfil"])){?>
        <h1 id="especial">Productos de <?php echo $u["nombre"]?> <?php echo $u["apellidoP"]?></h1>
    <?php } else{ ?>
        <h1 id="especial">Mis Productos</h1>
    <?php } ?>
    
    <div id="contenidoperfil" style="width: 1500px; margin: auto">
        <div class="perfiles">    
            <img id= "fotoperfil" src="<?php echo $u["foto"]?>" height="150">
            <form action="editar_foto_perfil.php" method="get">
                <input type="hidden" name="idCliente" value="<?php echo $id?>">
                <div style="text-align: center">
                    <input type="submit" value="Cambiar foto de perfil">
                </div>
            </form>
            <p class="general"><?php echo $u["nombre"]?> <?php echo $u["apellidoP"]?> <?php echo $u["apellidoM"]?></p>
            <p> Fecha de nacimiento: <?php echo $u["fecha_nacimiento"]?></p>
            <p>Correo: <?php echo $u["correo"]?></p>
            <p>Dirección: <?php echo $u["direccion"]?></p>
            <p>Teléfono: <?php echo $u["telefono"]?></p>
            <div>
                <p class="general">Valoración</p> 
                <?php if($estrella==0 ||$estrella==1 ){ ?>
                    <img class="valor" src="partes/unaestrella.jpg" alt="">
                <?php } ?>
                <?php if($estrella==2 ){ ?>
                    <img class="valor" src="partes/dosestrella.jpg" alt="">
                <?php } ?>
                <?php if($estrella==3 ){ ?>
                    <img class="valor" src="partes/tresestrella.jpg" alt="">
                <?php } ?>
                <?php if($estrella==4 ){ ?>
                    <img class="valor" src="partes/cuatroestrella.jpg" alt="">
                <?php } ?>
                <?php if($estrella==5 ){ ?>
                    <img class="valor" src="partes/cincoestrella.jpg" alt="">
                <?php } ?>
            </div>
            <?php if(isset($_GET["idperfil"])) { ?>
                <div>
                    <p class="general">Valorar al Vendedor</p> 
                    <form action="procesar_valoracion.php" method="post">  
                        <input type="hidden" name="valor" value="1">  
                        <input type="hidden" name="id" value="<?php echo $id?>">   
                        <button type="submit" class="voto"><img class="valor" src="partes/unaestrella.jpg" ></button>                 
                        
                    </form>
                    <form action="procesar_valoracion.php" method="post">  
                        <input type="hidden" name="valor" value="2">  
                        <input type="hidden" name="id" value="<?php echo $id?>">   
                        <button type="submit" class="voto"><img class="valor" src="partes/dosestrella.jpg" ></button>                 
                        
                    </form>
                    <form action="procesar_valoracion.php" method="post">  
                        <input type="hidden" name="valor" value="3">     
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <button type="submit" class="voto"><img class="valor" src="partes/tresestrella.jpg" ></button>                 
                        
                    </form>
                    <form action="procesar_valoracion.php" method="post">  
                        <input type="hidden" name="valor" value="4">     
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <button type="submit" class="voto"><img class="valor" src="partes/cuatroestrella.jpg" ></button>                 
                        
                    </form>
                    <form action="procesar_valoracion.php" method="post">  
                        <input type="hidden" name="valor" value="5">     
                        <input type="hidden" name="id" value="<?php echo $id?>">
                        <button type="submit" class="voto"><img class="valor" src="partes/cincoestrella.jpg" ></button>                 
                        
                    </form>
                    
                </div>
            <?php } ?>
        </div>        
            <div id="mostrarproductos">            
                <div id="vendidos">
                    <div class="tittle"><h2>Productos en Venta</h2></div>
                    <div class="contenedor">
                        <?php foreach($productoventa as $pv){ ?>
                            <?php 
                            $idVendedor=$pv["idVendedor"];
                            foreach ($usuario as $u) {
                                if($idVendedor==$u["idCliente"]){
                                    $nombre=$u["nombre"];
                                    $apellidoP=$u["apellidoP"];
                                }
                            }
                            ?>
                                        
                            <div class="producto">
                            <img  src="<?php echo $pv["imagen"]?>" height="150">
                            <p><?php echo $pv["nombre"]?></p>
                            <p style="color:blue">S/<?php echo $pv["precio"]?></p>
                            <form action="detalles.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $pv["id"]?>">     
                                <?php if($pv["idComprador"]==0) { ?>                   
                                    <input id="espera" type="submit" class="button" value="En Espera">
                                <?php } else {?>
                                    <input id="comprado" type="submit" class="button" value="Comprado">
                                    <input type="hidden" name="idc" value="<?php echo $pv["idComprador"]?>"> 
                                <?php } ?>
                            </form>
                            </div>
                                
                        <?php } ?>
                
                        <?php if(count($productoventa) == 0) {?>
                            
                            <p style="text-align:center;margin-left:60px;font-weight:bold">No existen productos registrados hasta el momento</p> 
                            
                        <?php }?>
                    </div>
                </div>
                <div id="comprados">
                    <div><h2 class="tittle">Productos Comprados</h2></div>
                    <div class="contenedor">
                        <?php foreach($productocompra as $pc){ ?>
                            <?php 
                            $idComprador=$pc["idComprador"];
                            foreach ($usuario as $u) {
                                if($idComprador==$u["idCliente"]){
                                    $nombre=$u["nombre"];
                                    $apellidoP=$u["apellidoP"];
                                }
                            }
                            ?>
                                        
                            <div class="producto">
                            <img  src="<?php echo $pc["imagen"]?>" height="150">
                            <p><?php echo $pc["nombre"]?></p>
                            <p style="color:blue">S/<?php echo $pc["precio"]?></p>
                            <form action="detalles.php" method="get">
                                <input type="hidden" name="id" value="<?php echo $pc["id"]?>">                        
                                <input type="submit" class="button" value="Ver Detalles">
                            </form>
                            </div>
                                
                        <?php } ?>
                
                        <?php if(count($productocompra) == 0) {?>
                            <p style="text-align:center;margin-left:60px;font-weight:bold">No existen productos registrados hasta el momento</p> 
                            
                        <?php }?>
                    </div>
                </div>
            </div>
        
    </div>
</body>
</html>