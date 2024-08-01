<?php

require_once('../modelo/conexion.php');

$conexion = conexion();

if(!empty($_POST["btnregistrarProducto"])){
    if(!empty($_POST["nombre"])and !empty($_POST["codigo"])and !empty($_POST["descripcion"])and !empty($_POST["precio"])and !empty($_FILES["imagen"])){
        
        $nombre=$_POST["nombre"];
        $codigo=$_POST["codigo"];
        $descripcion=$_POST["descripcion"];
        $precio=$_POST["precio"];
        $imagen='';
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
            if($tipo != 'image/jpg' && $tipo !='image/JPG' && $tipo !='image/jpeg' && $tipo !='image/png' && $tipo !='image/gif' ){
                echo "Error el archvo no es una imagen";
            }else{
                $src = $carpeta.$nombrefoto;
                move_uploaded_file($ruta_provisional, $src);
                $imagen="../imagenes/".$nombrefoto;
            }
        }

        

        $sql=$conexion->query("INSERT into productos (nombre, codigo, descripcion, precio, imagen) values ('$nombre', '$codigo', '$descripcion', '$precio', '$imagen')");
        
        
        if($sql==1){
            header("Location: ../vista/productos.php?success=true");
            exit();
        }else{
            header("Location: ../vista/productos.php?success=false");
            exit();
            
        }


    }else{
        header("Location: ../vista/productos.php?error=empty_fields"); // Redirecciona con el parámetro de error
        exit();
    }

}
?>