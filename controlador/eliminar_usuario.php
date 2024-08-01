<?php
require_once('../modelo/conexion.php');

$conexion = conexion();

if(!empty($_GET["id"])){
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE from usuarios where id=$id ");
    if($sql==1){
        echo '<div class="alert alert-success" role="alert">usuario eliminado correctamente</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">error al eliminar usuario</div>';
    }
}

?>