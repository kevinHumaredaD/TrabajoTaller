<?php
$idCliente=$_POST["idC"];
$imagen= $_FILES["fotoPerfil"]["name"];
$ruta=$_FILES["fotoPerfil"]["tmp_name"];
$destino="fotos/".$imagen;
copy($ruta,$destino);
include 'partes/conexion.php';
$db->query("UPDATE usuario SET foto='$destino' WHERE idCliente='$idCliente' ");
header("Location: index.php");

?>