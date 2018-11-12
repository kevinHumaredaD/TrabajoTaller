<?php
$nombre=$_POST["nombre"];
$imagen= $_FILES["imagen"]["name"];
$ruta=$_FILES["imagen"]["tmp_name"];
$destino="canje/".$imagen;
copy($ruta,$destino);
$puntaje=$_POST["puntaje"];
$descripcion=$_POST["descripcion"];
include 'partes/conexion.php';
if(empty($nombre) || empty($imagen) || empty($puntaje) || empty($descripcion)){
    header("Location: registrar_canje.php?vacio=1");
    }
else{
    $db->query("INSERT INTO canje VALUES (NULL, '$nombre','$descripcion', '$destino','$puntaje','0','0')");
    header("Location: index.php");
    }
    
?>