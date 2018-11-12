<?php
$nombre=$_POST["nombreProducto"];
$imagen= $_FILES["imagen"]["name"];
$ruta=$_FILES["imagen"]["tmp_name"];
$destino="productos/".$imagen;
copy($ruta,$destino);
$precio=$_POST["precio"];
$tipo=$_POST["tipo_juguete"];
$descripcion=$_POST["descripcion"];
$idVendedor=$_POST["idVendedor"];
include 'partes/conexion.php';
if($tipo=="nulo"){
    header("Location: registrar_producto.php?nulo=1");
}else{
    $db->query("INSERT INTO producto VALUES (NULL, '$nombre', '$destino', '$precio', '$tipo','$descripcion', '$idVendedor','0','0','0')");
    header("Location: index.php");
}
?>