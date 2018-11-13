<?php
    session_start();
    include 'partes/conexion.php';
    if(!isset($_SESSION["correo"])){
        header("Location: error_contenido.php");
        die();
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
    
    <?php 
        $sentencia=$db->query("SELECT * FROM usuario");
        $usuario= $sentencia->fetchAll();
        foreach($usuario as $u){
            if($_SESSION["correo"]==$u["correo"]){
                $id=$u["idCliente"];
            }       
        }
    ?>
    <div class="Formulario">
        <div class="contenedorFormulario">      
            <form action="procesar_producto.php" method="POST" enctype="multipart/form-data">
                <input type="hidden" name="idVendedor" value="<?php echo $id?>">
                <h1>Formulario de registrar producto</h1>
                <?php if(isset($_GET["nulo"])){?>
                    <strong class="alerta">Ingrese un tipo de producto valido.</strong>
                <?php } ?>
                <div>
                    <div>
                        <label for="">Ingrese el nombre de producto:</label>
                    </div>
                    <div>
                        <input type="text" name="nombreProducto">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Ingrese una imagen del producto:</label>
                    </div>
                    <div>
                        <input name="imagen" type="file"> 
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Fije un precio:</label>
                    </div>
                    <div>
                        <input type="number" name="precio" id="">
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Tipo de producto</label>
                    </div>
                    <div>
                        <select name="tipo_juguete" id="">
                            <option value="nulo">-------Seleccione-------</option>
                            <option value="muebles">Muebles</option>
                            <option value="tecnologia">Tecnología</option>
                            <option value="electrodomesticos">Electrodomesticos</option>
                            <option value="deportes">Deportes</option>
                            <option value="juguetes">Juguetes</option>
                            <option value="accesorios para vehiculos">Accesorios para vehiculos</option>
                            <option value="ropa y accesorios">Ropa y accesorios</option>
                            <option value="joyas">Joyas</option>
                        </select>
                    </div>
                </div>
                <div>
                    <div>
                        <label for="">Descripción:</label>
                    </div>
                    <div>
                        <textarea name="descripcion" cols="50" rows="10"></textarea>
                    </div>
                </div>                                          
                <button type="submit">Enviar</button>
                
            </form>
        </div>
    </div>
    <?php include 'partes/footer.php' ?>
</body>
</html>