<nav>
    <a href="index.php">Portada</a>
    <a href="mostrar_productos.php">Productos registrados</a>
    <a href="">Vendedores destacados</a>
    <a href="crear_usuario.php">Crear cuenta de usuario</a>
    <?php if(isset($_SESSION["correo"])) {?>
        <a href="logout.php">Cerrar Sesion</a>
    <?php }else{ ?>
        <a href="login.php">Iniciar sesion</a>
    <?php } ?>
</nav>