<div style="background-color: #ccc; height: 80px;">
        <div id="tituloKean">
            <div>
                <h2>Kean Store</h2>
            </div>
        </div>
        <?php if(!isset($_SESSION["correo"])){ ?>
            <div id="login">
                <div style="display: flex;">
                    <div style="margin-right: 10px; padding-top: 1px;">
                        <a class="linkLogin" href="crear_usuario.php">Crear Usuario</a>
                    </div>
                    <div>
                        <form action="procesar_login.php" method="post">
                                <input type="text" placeholder="Ingrese su correo" name="correo">
                                <input type="password" placeholder="Ingrese su contraseña" name="password">
                                <button type="submit">Ingresar</button>
                        </form>
                    </div>
                    
                </div>
                <div>
                        <?php if(isset($_GET["error"])){?>
                            <strong class="alerta">El correo o la contraseña son incorrectos</strong>
                        <?php } ?>
                    </div>
            </div>
        <?php } else{?>
            <p id="bienvenido"><a class="linkLogin" href="logout.php">Salir</a>Bienvenido, <?php echo $_SESSION["nombre"]?> <?php echo $_SESSION["apellidoP"]?> <?php echo $_SESSION["apellidoM"]?></p>
        <?php } ?>
        <div style="clear: both"></div>
    </div>