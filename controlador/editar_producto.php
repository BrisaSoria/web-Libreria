<?php
// incluyo el archivo de conexión a la base de datos
require_once('../modelo/conexion.php');
// Establece la conexión a la base de datos
$conexion = conexion();

//verifico si se envio el formulario
if(!empty($_POST["btnmodificar"])){
    //verifica que los campos no esten vacios
    if(!empty($_POST["nombre"])and !empty($_POST["codigo"])and !empty($_POST["descripcion"])and !empty($_POST["precio"])and !empty($_FILES["imagen"])){
        
        // obtengo los valores enviados por el formulario
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $codigo=$_POST["codigo"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $imagen='';
        // Verifica si se envio una imagen
        if(isset($_FILES["imagen"])){
            $file = $_FILES["imagen"];
            $nombrefoto = $file["name"];
            $tipo = $file["type"];
            $ruta_provisional = $file["tmp_name"];
            $size = $file["size"];
            $dimensiones = getimagesize($ruta_provisional);
            $width = $dimensiones[0];
            $height = $dimensiones[1];
            $carpeta = "../imagenes/";
            // Verifica si el archivo enviado es una imagen 
            if($tipo != 'image/jpg' && $tipo !='image/JPG' && $tipo !='image/jpeg' && $tipo !='image/png' && $tipo !='image/gif' ){
                echo "Error el archvo no es una imagen";
            }else{
                // Mueve la imagen a la carpeta de imagenes
                $src = $carpeta.$nombrefoto;
                move_uploaded_file($ruta_provisional, $src);
                $imagen="../imagenes/".$nombrefoto;
            }
        }

        // Actualiza los datos del producto en la base de datos
        $sql=$conexion->query("UPDATE productos set nombre='$nombre', codigo='$codigo', descripcion='$descripcion', precio=$precio, imagen='$imagen' where id=$id");

        if ($sql==1) {
            header("Location: ../vista/productos.php");
        } else {
            echo '<div class="alert alert-danger" role="alert">ERROR al modificar usuario</div>';
        }
        
    }else{
        echo '<div class="alert alert-danger" role="alert">ALGUNOS DE LOS CAMPOS ESTÁN VACÍOS</div>';
    }
}

?>