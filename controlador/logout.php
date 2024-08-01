<?php
require_once('../modelo/conexion.php');
session_start();
$conexion = conexion();

// Obtiene el ID de usuario de la sesión actual
$usuario =  $_SESSION['id_user'];
// Verifica si se ha enviado el formulario de salida
if(!empty($_POST['salir'])){

// Consulta el registro más reciente de entrada del usuario
    $sql=$conexion->query("SELECT * FROM registro where fecha_entrada = (SELECT max(fecha_entrada) FROM registro) ");
            
    $rows = $sql->num_rows;
    if($rows > 0){
        $row = $sql->fetch_assoc();
        date_default_timezone_set('america/argentina/buenos_aires');// Establece la zona horaria
        $conecSalida=date('y-m-d G:i:s');// Obtiene la fecha y hora de salida
        
            
// Actualiza la fecha y hora de salida en el registro correspondiente
            $sql=$conexion->query("UPDATE registro set fecha_entrada='$row[fecha_entrada]', fecha_salida='$conecSalida' where id='$row[id]'");

//destruye la sesion
    session_destroy();
    header('Location: ../login.html');
    }
}


?>