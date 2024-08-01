<?php

require_once('../modelo/conexion.php');

$conexion = conexion();

if(!empty($_POST["btnregistrar"])){
    if(!empty($_POST["nombre"])and !empty($_POST["apellido"])and !empty($_POST["email"])and !empty($_POST["dni"])and !empty($_POST["clave"])){
        
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $dni=$_POST["dni"];
        $clave=$_POST["clave"];

        $sql=$conexion->query("INSERT into usuarios (nombre, apellido, email, dni, clave) values ('$nombre', '$apellido', '$email', '$dni', '$clave')");
        if($sql==1){
            header("Location: ../vista/Admin.php?success=true");
            exit();
        }else{
            header("Location: ../vista/Admin.php?success=false");
            exit();
            
        }


    }else{
        header("Location: ../vista/Admin.php?error=empty_fields"); // Redirecciona con el parámetro de error
        exit();
    }

}
?>