<?php
    session_start();
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM usuario ORDER BY valoracion desc LIMIT 3");
    $u=$sentencia->fetchAll();    
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
    <h1 class="tittle">Vendedores Destacados</h1>
    <?php if(count($u) == 0) {?>
            
            <strong style="text-align:center" >No existen usuarios registrados hasta el momento</strong>
               
    <?php }else{?>
        <?php 
            if($u[0]["valoracion"]==0){
                $estrella=0;
            }
            else{
                $estrella=round($u[0]["valoracion"]/$u[0]["contador"], 0, PHP_ROUND_HALF_ODD);
            }
        ?>
    <div class="vendedoresdestacados" style="width: 1400px; margin: auto">
            <div id="primero">
                <div class="perfiles">    
                        <img id= "fotoperfil" src="<?php echo $u[0]["foto"]?>" height="150">
                    <p class="general"><?php echo $u[0]["nombre"]?> <?php echo $u[0]["apellidoP"]?> <?php echo $u[0]["apellidoM"]?></p>
                    <p>Correo: <?php echo $u[0]["correo"]?></p>
                    <div> 
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
                </div> 
            </div>             
            <div id="basedestacada">
                <?php  for ($i=1; $i <count($u) ; $i++) { ?>
                    <?php 
                    if($u[$i]["valoracion"]==0){
                        $estrella=0;
                    }
                    else{
                        $estrella=round($u[$i]["valoracion"]/$u[$i]["contador"], 0, PHP_ROUND_HALF_ODD);
                    }
                    ?>        
                    <div class="perfiles">      
                            <img id= "fotoperfil" src="<?php echo $u[$i]["foto"]?>" height="150">
                        <p class="general"><?php echo $u[$i]["nombre"]?> <?php echo $u[$i]["apellidoP"]?> <?php echo $u[$i]["apellidoM"]?></p>
                        <p>Correo: <?php echo $u[$i]["correo"]?></p>
                        <div>
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
                    </div>
                <?php } ?>
            </div> 
        </div> 

        
    <?php } ?>
    <?php include 'partes/footer.php' ?>
</body>
</html>