<?php

require_once('../modelo/conexion.php');

$conexion = conexion();

// Verificar si se envio el formulario
if(isset($_POST["ingresar"])) {
    // Verificar si los campos estan vacios
    if(empty($_POST["dni"]) or empty($_POST["clave"])) {
        echo '<script language="javascript">alert("LOS CAMPOS ESTAN VACIOS");</script>';
    } else {
        $usuario = $_POST["dni"];
        $clave = $_POST["clave"];

        // Consultar la base de datos para el usuario y la contraseña
        $sql = $conexion->query("SELECT id, dni, clave, email FROM usuarios where dni='$usuario' and clave='$clave' ");
        $rows = $sql->num_rows;
        

        if($rows > 0) {
            // Si los datos son correctos, realizar registro y establecer sesión
            $row = $sql->fetch_assoc();
            date_default_timezone_set('america/argentina/buenos_aires');
            $conecEntrada=date('y-m-d G:i:s');
            $_REQUEST['fecha_entrada']=$conecEntrada;
            
            $sql=$conexion->query("INSERT into registro (id_usuario, fecha_entrada) values ('$row[dni]', '$conecEntrada')");
            $_SESSION['id_user'] = $row["id"];

            // Redireccionar según el tipo de usuario
            if($row['id'] == 1) {
                session_start();
                $_SESSION['id_user'] = $usuario;
                header('Location: ../vista/Admin.php');
                exit(); 
            } else {
                session_start();
                $_SESSION['id_user'] = $usuario;
                header('Location: ../vista/home.php');
                exit(); 
            }
        } else {
            // Si los datos son incorrectos, muestra mensaje de error
             header('Location: ../login.html');
            echo '<script language="javascript">alert("dni y clave incorrecta");</script>';
            exit();
        }
    }
} else {
    // Si no se envio el formulario, redireccionar a la pagina de inicio de sesión
    header('Location: ../login.html');
    exit(); 
}
?>
