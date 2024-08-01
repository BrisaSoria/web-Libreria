<?php
// controlador/registrar_pago.php

include "../modelo/conexion.php";
$conexion = conexion();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Verificar que ningún campo esté vacío
    if (empty($_POST['tipo_tarjeta']) || empty($_POST['numero_tarjeta']) || empty($_POST['fecha_vencimiento']) || empty($_POST['cvv'])) {
        // Si algún campo está vacío, redirige al usuario de vuelta al formulario con un mensaje de error
        header("Location: ../vista/formulario_pago.php?error=campos_vacios");
        exit();
    }

    // Recuperar datos del producto y total del formulario
    $datosCarritoJSON = isset($_POST['datos-carrito']) ? $_POST['datos-carrito'] : '';
    $totalJSON = isset($_POST['total-pagar']) ? $_POST['total-pagar'] : 0;

    // Convertir datos JSON a matrices PHP
    $datosCarrito = json_decode($datosCarritoJSON, true);
    $total = floatval($totalJSON);

    // Obtener los datos del formulario
    $tipo_tarjeta = $_POST['tipo_tarjeta'];
    $numero_tarjeta = $_POST['numero_tarjeta'];
    // En el campo de fecha del formulario, se espera un formato "YYYY-MM"
    $fecha_vencimiento = $_POST['fecha_vencimiento'];

    // Añadir el día 1 al valor del campo de fecha
    $fecha_vencimiento .= '-01'; 
    
    $cvv = $_POST['cvv'];

    // Nuevos campos agregados
    $direccion_envio = $_POST['direccion'];
    $codigo_postal = $_POST['codigo_postal'];

    // Obtener los datos del usuario de la sesión
    session_start();
    $usuario = $_SESSION['id_user'];
    $sql=$conexion->query("SELECT nombre, email FROM usuarios where dni = $usuario");

    $fila = $sql->fetch_assoc();
    $nombre_usuario = $fila['nombre'];
    $email_usuario = $fila['email'];
   

    

    // Obtener la fecha y hora actual
    date_default_timezone_set('America/Argentina/Buenos_Aires');
    $fecha_venta = date('Y-m-d H:i:s');

    // Generar un código aleatorio para el número de compra
  
    $num_venta = random_int(100000, 999999);


    // Insertar los datos en la tabla de ventas
    foreach ($datosCarrito as $producto) {
        $nombre_producto = $producto['title'];
        $cantidad = $producto['quantity'];
        $precio_unitario = $producto['price'];

         // Obtener el ID del producto y su precio desde la tabla "productos"
         $sql_producto = "SELECT codigo, precio FROM productos WHERE nombre = '$nombre_producto'";
         $result_producto = $conexion->query($sql_producto);
         $row_producto = $result_producto->fetch_assoc();
         $id_producto = $row_producto['codigo'];
         $precio = $row_producto['precio'];

         $stmt = $conexion->query("INSERT INTO ventas (id_usuario, nombre_usuario, productos, cantidad, precio_uni, total_pago, tipo_tarjeta, numero_tarjeta, fecha_vencimiento, cvv, direccion_envio, cod_postal, fecha_venta) VALUES ('$usuario', '$nombre_usuario', '$nombre_producto', '$cantidad','$precio_unitario', '$total', '$tipo_tarjeta', '$numero_tarjeta', '$fecha_vencimiento', '$cvv','$direccion_envio', '$codigo_postal', '$fecha_venta')");
         

        // Insertar los datos en la tabla de pedidos
        $stmt_pedido = $conexion->query("INSERT INTO pedidos (id_usuario, email_usuario, id_producto, id_precio, cantidad, direccion_envio, fecha_pedido, num_venta) VALUES ('$usuario', '$email_usuario', '$id_producto','$precio', '$cantidad', '$direccion_envio', '$fecha_venta', '$num_venta')");

        if ($stmt_pedido === false) {
            die("Error al ejecutar la consulta: " . $conexion->error);
        }
    }

    // Cerrar la conexión
    $conexion->close();

    // Redirigir o mostrar un mensaje de éxito al usuario
    header("Location: ../vista/compra_exitosa.php?num_venta=$num_venta");
    exit();

    
}


?>
