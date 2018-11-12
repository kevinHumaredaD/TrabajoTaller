<div style="background-color: #ccc; height: 80px;">
    <div style="margin: auto; width: 1300px">
        <div id="tituloKean">
            <div>
                <img src="partes/logo.jpg" alt="" height="70px" style="padding-top:5px"> 
            </div>
        </div>
        <?php if(!isset($_SESSION["correo"])){ ?>
            <div id="login">
                <div style="display: flex;">
                    <div style="margin-right: 10px;">
                        <a class="linkLogin" href="crear_usuario.php"><img src="partes/registroImagen.png" width="20">    Nuevo usuaro</a>
                    </div>
                    <div>
                        <a class="linkLogin" href="login.php"><img src="partes/loginImagen.png" width="20">   Iniciar sesiòn</a>
                    </div>
                </div>
            </div>
        <?php } else{?>
            <div>
                <div style="display: flex;">
                    <div style="margin: 10px;">
                        <img src="<?php 
                        foreach ($cl as $c) {
                            if($c["correo"]==$_SESSION["correo"]){
                                $foto=$c["foto"];
                            }
                        }
                        echo $foto;
                        ?>" width="50" height="50">
                    </div>
                    <div>
                        <p id="bienvenido">Bienvenido, <?php echo $_SESSION["nombre"]?> <?php echo $_SESSION["apellidoP"]?> <?php echo $_SESSION["apellidoM"]?></p>
                    </div>
                </div>
            </div>
            
        <?php } ?>
        <div style="clear: both"></div>
    </div>
</div>