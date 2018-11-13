<nav>
    <ul>
        <li>
            <a href="index.php"> <div><p>Portada</p></div></a>
            <ul class="submenu">
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="muebles">
                        <button type="submit">Muebles</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="tecnologia">
                        <button type="submit">Tecnología</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="electrodomesticos">
                        <button type="submit">Electrodomesticos</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="deportes">
                        <button type="submit">Deportes</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="juguetes">
                        <button type="submit">Juguetes</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="accesorios para vehiculos">
                        <button type="submit">Accesorios para Vehiculos</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="ropa y accesorios">
                        <button type="submit">Ropa y Accesorios</button>
                   </form>
                </li>
                <li>
                    <form action="producto_especifico.php" method="get">
                        <input type="hidden" name="tipo" value="joyas">
                        <button type="submit">Joyas</button>
                   </form>
                </li>                
            </ul>
        </li>
    
        <li><a href="vendedores_destacados.php"><div>Vendedores Destacados</div></a></li>

    <?php if(isset($_SESSION["correo"])) {?>
        
        <li><a href="libro_reclamo.php"><div>Libro de Reclamo</div></a></li>
        <li><a href="registrar_producto.php"><div>Registrar Producto</div></a></li>
        
        <?php if($_SESSION["correo"]=="admin@admin"){?>
            <li><a href="registrar_canje.php"><div>Registrar Canje</div></a></li>
        <?php } else{ ?>
            <li><a href="canjear.php"><div>Canjear</div></a></li>
        <?php } ?>
        <li>
            <a href="perfil.php"><div><?php echo $_SESSION["nombre"]?> <?php echo $_SESSION["apellidoP"]?> <?php echo $_SESSION["apellidoM"]?></div></a>
                <ul class="submenu">
                    <li>
                        <form action="mostrar_canje.php" method="get">                            
                            <button type="submit">Mostrar Canje</button>
                            <input type="hidden" name="correoCliente" value="<?php echo $_SESSION["correo"]?>">
                        </form>
                    </li> 
                    <li>
                        <form action="editar_perfil.php" method="get">
                            <input type="hidden" name="correoCliente" value="<?php echo $_SESSION["correo"]?>">
                            <button type="submit">Editar perfil</button>
                        </form>
                    </li>
                    <li>
                        <form action="editar_password.php" method="get">
                            <input type="hidden" name="correoCliente" value="<?php echo $_SESSION["correo"]?>">
                            <button type="submit">Modificar contraseña</button>
                        </form>
                    </li>
                    <li>
                        <form action="logout.php" method="post">                            
                            <button type="submit">Cerrar Sesion</button>
                        </form>
                    </li> 
                </ul>
            
        </li>
    <?php }else{ ?>
        <li><a href="crear_usuario.php"><div>Crear cuenta</div></a></li>
    <?php } ?>
    </ul>
</nav>