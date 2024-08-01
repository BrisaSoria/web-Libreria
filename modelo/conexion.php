<?php

function conexion()/*creamos la funcion conexion para que conecte la pagina con la base de datos*/
{
    $host = "localhost";
    $db   = "FinalPP3"; /*nombre de la BD*/   
    $usr  = "root";
    $pass = " "; 
    
    $mysqli = new mysqli($host,$usr,$pass,$db);/*guarda los datos en la variable mysqli*/

    if($mysqli->connect_errno)
    {/*en el caso que la conexio falle va a salir la leyenda "fallo la conexion"*/
        die("Fallo la conexión" . $mysqli->connect_errno);    
    }
    /*si no retorna la conexion*/

    return $mysqli;
}
