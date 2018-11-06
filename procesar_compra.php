<?php 
    session_start();
    $correoventa=$_POST["correovendedor"];
    $correocompra=$_SESSION["correo"];
    $id=$_POST["idproducto"];
    include 'partes/conexion.php';      
    if($correoventa==$correocompra){
        header("Location:detalles.php?id=$id&error=1");
    }
    else{
        $sentencia=$db->query("SELECT * FROM usuario WHERE correo='$correocompra'");
        $comprador= $sentencia->fetchAll();    
        $stm=$db->query("SELECT * FROM usuario WHERE correo='$correoventa'");
        $vendedor= $stm->fetchAll();
        $c=$comprador[0];
        $v=$vendedor[0];
        $puntoc=$c['puntaje']+5;
        $puntov=$v['puntaje']+20;
        $estado=1;
        $db->query("UPDATE producto SET estado='$estado' WHERE id='$id'");
        $db->query("UPDATE usuario SET puntaje='$puntoc' WHERE correo='$correocompra'");
        $db->query("UPDATE usuario SET puntaje='$puntov' WHERE correo='$correoventa'");

        header("Location:index.php");

    }
    
?>