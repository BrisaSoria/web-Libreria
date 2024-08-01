<?php
require_once('../modelo/conexion.php');

// Establecer conexión con la base de datos
$conexion = conexion();

// Verificar si la conexión fue exitosa
if (!$conexion) {
    die("La conexión a la base de datos ha fallado.");
}

// Obtener los datos del formulario
$id = $_POST['id'];
$estado = $_POST['estado'];

try {
    // Ejecutar la consulta SQL directamente
    $result = $conexion->query("UPDATE pedidos SET estado = '$estado' WHERE id = '$id'");

    if (!$result) {
        throw new Exception("Error ejecutando la consulta SQL.");
    }

    // Redireccionar de nuevo a la pagina anterior
    header('Location: ../vista/pedidos.php');
    exit;
} catch (Exception $e) {
    // Manejo errores
    echo "Error: " . $e->getMessage();
    die();
}
?>
