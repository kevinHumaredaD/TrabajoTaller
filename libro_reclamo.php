<?php
    session_start();
    if(!isset($_SESSION["correo"])){
        header("Location: error_contenido.php");
        die();
    }
    $correoCliente=$_SESSION["correo"];
    include 'partes/conexion.php';
    $stn=$db->query("SELECT * FROM usuario where correo='$correoCliente'");
    $Cliente= $stn->fetchAll();
    $idC=$Cliente[0];
    $idCliente=$idC["idCliente"];
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
    <h2 class="titulos"> Registrar Reclamo</h2>
    <div class="Formulario">
        <div class="contenedorFormulario">
            <form action="procesar_reclamo.php" method="post">
                <input type="hidden" name="idCliente" value="<?php echo $idCliente?>">
                <?php if(isset($_GET["vacio"])) { ?>
                <strong class="alerta">Por favor rellene los espacios en blanco</strong>
                    <?php } ?>
                <?php if(isset($_GET["correo"])) { ?>
                    <strong class="alerta">El correo del vendedor no existe</strong>
                <?php } ?>   
                <div>
                    <div>
                        <label for="">Correo:</label>
                    </div>
                    <div>
                        <input type="email" name="correo" value="<?php echo $_SESSION["correo"] ?>">
                    </div> 
                </div>         
                
                <div>
                    <div>
                        <label for="">Correo del vendedor:</label>
                    </div>
                    <div>
                        <input type="email" name="correovendedor">
                    </div> 
                </div>                
                <div>
                    <div>
                        <label for="">Tipo de queja o reclamo</label>
                    </div>
                    <div>
                        <select name="reclamo">
                            <option value="compra">Reclamo por Compra Realizada</option>
                            <option value="vendedor">Comportamiento del vendedor</option>                            
                        </select>                        
                    </div> 
                </div>
                <div>
                    <div>
                        <label for="">Detalles del reclamo:</label>
                    </div>
                    <div>
                        <textarea name="detalle" id="" cols="30" rows="10"></textarea>
                    </div> 
                </div>             
                   
                <button type="submit">Registrar</button>
            </form>
        </div>
    </div>   
    <?php include 'partes/footer.php' ?> 
</body>
</html>