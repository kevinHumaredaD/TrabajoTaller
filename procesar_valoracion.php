<?php 
    $valor=$_POST["valor"];
    $id=$_POST["id"];
    include 'partes/conexion.php';
    $sentencia=$db->query("SELECT * FROM usuario WHERE idCliente='$id'");
    $usuario= $sentencia->fetchAll(); 
    $u=$usuario[0];
    $valoracion=$u["valoracion"];
    $valoracion=$valoracion+$valor;
    $contador=$u["contador"];
    $contador=$contador+1;
    $db->query("UPDATE usuario SET valoracion='$valoracion', contador='$contador' WHERE idCliente='$id'");        
    header("Location:index.php");

?>