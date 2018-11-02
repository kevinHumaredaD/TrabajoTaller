<nav>
    <a href="index.php">Portada</a>
    <a href="mostrar_productos.php">Productos registrados</a>
    <a href="">Vendedores destacados</a>
    <?php if(!isset($_SESSION["correo"])) {?>
        <a href="crear_usuario.php">Crear cuenta de usuario</a>
    <?php }?>
    <?php if(isset($_SESSION["correo"])) {?>
        <a href="logout.php">Cerrar Sesion</a>
<<<<<<< HEAD
        <a href="libro_reclamo.php">Libro de Reclamo</a>
=======
        <a href="registrar_producto.php">Registrar producto</a>
>>>>>>> aa0cdaab4002ca0bb654edc99fe4cce92daa0714
    <?php }else{ ?>
        <a href="login.php">Iniciar sesion</a>
    <?php } ?>
    
</nav>