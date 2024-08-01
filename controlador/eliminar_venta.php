<?php
require_once('../modelo/conexion.php');

$conexion = conexion();

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE from ventas where id=$id ");
    if($sql==1){
        echo '<div class="alert alert-success" role="alert">registro de venta eliminado correctamente</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">error al eliminar el registro de venta</div>';
    }
}

?>