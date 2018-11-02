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
    <h2> Registrar Reclamo</h2>
    <div class="Formulario">
        <div class="contenedorFormulario">
            <form action="usuario_procesar.php" method="post">
                <?php if(isset($_GET["error"])) { ?>
                <strong class="alerta">Error en la confirmación de contraseña</strong>
                    <?php } ?>
                <?php if(isset($_GET["correo"])) { ?>
                    <strong class="alerta">Error,ese correo ya existe. Intente con otro</strong>
                <?php } ?>   
                <div>
                    <div>
                        <label for="">Correo:</label>
                    </div>
                    <div>
                        <input type="email" name="correo">
                    </div> 
                </div>         
                
                <div>
                    <div>
                        <label for="">Correo del vendedor:</label>
                    </div>
                    <div>
                        <input type="email" name="correovend">
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
</body>
</html>