<?php
require_once('../modelo/conexion.php');

$conexion = conexion();

if(!empty($_POST["btnmodificar"])){
    if(!empty($_POST["nombre"])and !empty($_POST["apellido"])and !empty($_POST["email"])and !empty($_POST["dni"])and !empty($_POST["clave"])){
        
        $id=$_POST["id"];
        $nombre=$_POST["nombre"];
        $apellido=$_POST["apellido"];
        $email=$_POST["email"];
        $dni=$_POST["dni"];
        $clave=$_POST["clave"];
  
        $sql=$conexion->query("UPDATE usuarios set nombre='$nombre', apellido='$apellido', email='$email', dni=$dni, clave='$clave' where id=$id");

        // Verifico si la actualización fue exitosa
        if ($sql==1) {
            header("Location: ../vista/Admin.php");
        } else {
            echo '<div class="alert alert-danger" role="alert">ERROR al modificar usuario</div>';
        }
        
    }else{
        echo '<div class="alert alert-danger" role="alert">ALGUNOS DE LOS CAMPOS ESTÁN VACÍOS</div>';
    }
}

?>