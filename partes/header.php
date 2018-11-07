<nav>
    <a href="index.php">Portada</a>
    
    <a href="vendedores_destacados.php">Vendedores destacados</a>
    <?php if(isset($_SESSION["correo"])) {?>
        <a href="mostrar_productos.php">Mis Productos</a>
        <a href="libro_reclamo.php">Libro de Reclamo</a>
        <a href="registrar_producto.php">Registrar producto</a>
    <?php }else{ ?>
        <a href="crear_usuario.php">Crear cuenta</a>
    <?php } ?>
    
</nav>