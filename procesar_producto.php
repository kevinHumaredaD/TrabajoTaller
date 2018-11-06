<?php
$nombre=$_POST["nombreProducto"];
$imagen= addslashes(file_get_contents($_FILES["imagen"]["tmp_name"]));
$precio=$_POST["precio"];
$tipo=$_POST["tipo_juguete"];
$descripcion=$_POST["descripcion"];
$id=$_POST["id"];
include 'partes/conexion.php';
if($tipo==nulo){
    header("Location: registrar_producto.php?nulo=1");
}else{
    $db->query("INSERT INTO producto VALUES (NULL, '$nombre', '$imagen', '$precio', '$tipo','$descripcion', '$id','0')");
    header("Location: index.php");
}
?>