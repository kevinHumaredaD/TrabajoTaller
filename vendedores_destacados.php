<?php
    session_start();
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM usuario");
    $usuario=$sentencia->fetchAll();    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Kean'Store</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <?php include 'partes/cliente.php' ?>
    <?php include 'partes/header.php' ?>
    <?php 
        $uinicial=$usuario[0];        
        $mayor=0;
        $mejor='';
    foreach($usuario as $u){        
        if($mayor<$u["puntaje"]){
            $mayor=$u["puntaje"];
            $mejor=$u["nombre"];
        }        
    } 
    echo $mejor;
    ?>
    
    
</body>
</html>