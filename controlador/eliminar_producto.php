<?php
require_once('../modelo/conexion.php');

$conexion = conexion();

// Verifica si se envio un parametro "id" en el  metodo GET

if(!empty($_GET["id"])){
    //obtengo el id
    $id=$_GET["id"];
    $sql=$conexion->query("DELETE from productos where id=$id ");
    // Elimina el producto de la base de datos utilizando el id
    if($sql==1){
        echo '<div class="alert alert-success" role="alert">producto eliminado correctamente</div>';
    }else{
        echo '<div class="alert alert-danger" role="alert">error al eliminar producto</div>';
    }
}

?>