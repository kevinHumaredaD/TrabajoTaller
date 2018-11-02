<?php
    session_start();
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
    <h1>Kean Store</h1>
    <?php include 'partes/header.php' ?>
    <div class="Formulario">
        <div class="contenedorFormulario">      
            <form action="foto_post.php" method="POST">
                <h1>Formulario de registrar producto</h1>
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
                        <select name="tipo_juguete" id="">
                            <option value="">-------Seleccione-------</option>
                            <option value="juguetes">Muebles</option>
                            <option value="tecnologia">Tecnología</option>
                            <option value="electrodomesticos">Electrodomesticos</option>
                            <option value="deportes">Deportes</option>
                            <option value="juguetes">Juguetes</option>
                            <option value="vehiculos">Accesorios para vehiculos</option>
                            <option value="ropa">Ropa y accesorios</option>
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
    
</body>
</html>