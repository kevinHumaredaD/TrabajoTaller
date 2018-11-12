<?php 
    session_start();
    if(!isset($_SESSION["correo"])){
        header("Location: login.php?compra=1");
    }else{
        $correoventa=$_POST["correovendedor"];
        $correocompra=$_SESSION["correo"];
        $id=$_POST["idproducto"];
        $idcomprador=$_POST["idcomprador"];
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
            $puntoc=$c['puntajecompra']+5;
            $puntov=$v['puntajeventa']+20;
            $estado=1;
            
            $db->query("UPDATE producto SET estadovendido='$estado', idComprador='$idcomprador' WHERE id='$id'");
            $db->query("UPDATE usuario SET puntajecompra='$puntoc' WHERE correo='$correocompra'");
            $db->query("UPDATE usuario SET puntajeventa='$puntov' WHERE correo='$correoventa'");
            
            header("Location:index.php");

        }
    }
?>