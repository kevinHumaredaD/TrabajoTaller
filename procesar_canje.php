<?php 
    $id=$_POST["idcanje"];
    $idc=$_POST["idcanjeador"];
    $puntaje=$_POST["puntaje"];
    $pv=$_POST["puntajeventa"];
    $pc=$_POST["puntajecompra"];
    include 'partes/conexion.php';
    if($puntaje>$pc){
        $puntaje=$puntaje-$pc;
        $pc=0;
        $pv=$pv-$puntaje;
    }
    else{
        $pc=$pc-$puntaje;
    }
    $estado=1;
    $db->query("UPDATE canje SET estado='$estado',idCanjeador='$idc' WHERE id='$id'");
    $db->query("UPDATE usuario SET puntajecompra='$pc',puntajeventa='$pv' WHERE idCliente='$idc'");
    header("Location:index.php");
?>