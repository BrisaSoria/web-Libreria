

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="margin-top: 100px;">
    <nav class="navbar bg-body-tertiary fixed-top">
            <div class="container-fluid">
                <a class="navbar-brand" href="#">
                    <img src="../css/Logoo.png" alt="" width="150" height="35">
                </a>
                <div class="social-links">
                    <a href="#" class="navbar-brand">
                        <i class='bx bxl-facebook' ></i>
                    </a>
                    <a href="#" class="navbar-brand">
                        <i class='bx bxl-twitter' ></i>
                    </a>
                        <a href="#" class="navbar-brand">
                            <i class='bx bxl-instagram' ></i>
                        </a>
            </div>
            
            <?php if (isset($_SESSION['id_user'])): ?>
                    <form action="../controlador/logout.php" method="post">
                        <input type="hidden" name="salir" value="<?php echo $_SESSION['id_user']; ?>">
                        <button type="submit" class="btn btn-outline-info text-muted">Cerrar sesión</button>
                    </form>
                    <?php endif; ?>
                    
                <div class="container-icon">
                    <div class="container-cart-icon" >
                        <button class="navbar-toggler icon" type="button">
                            <svg xmlns="http://www.w3.org/2000/svg" width="25" height="25" fill="currentColor" class="icon" viewBox="0 0 16 16">
                                <path d="M8 1a2.5 2.5 0 0 1 2.5 2.5V4h-5v-.5A2.5 2.5 0 0 1 8 1m3.5 3v-.5a3.5 3.5 0 1 0-7 0V4H1v10a2 2 0 0 0 2 2h10a2 2 0 0 0 2-2V4zM2 5h12v9a1 1 0 0 1-1 1H3a1 1 0 0 1-1-1z"/>
                            </svg>
                            <div class="count-products">
                                <span id="contador-productos">0</span>
                            </div>
                        </button>

                    </div>
                    
                </div>
            </div>
        </nav>
     
        <div class="container-fluid row" style="background-color: rgba(255, 255, 255, .2);backdrop-filter: blur(10px);">
        <div class="col-8 mx-auto my-5">
        <form action="../controlador/registrar_pago.php"  method="post">
            <?php
            session_start();

            // Verificar si el usuario ha iniciado sesión
            if (!isset($_SESSION['id_user'])) {
                // Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
                header('Location: ../login.html');
                exit(); // Terminar el script para evitar que se ejecute más código
            }

            include "../modelo/conexion.php";
                    $conexion = conexion();
            // Obtener el nombre de usuario de la sesión
            $usuario = $_SESSION['id_user'];

            // Realizar una consulta para obtener el nombre de usuario asociado al ID de usuario
            $sql=$conexion->query("SELECT nombre, email FROM usuarios where dni = $usuario");

            $fila = $sql->fetch_assoc();
            $nombre_usuario = $fila['nombre'];
            $email_usuario = $fila['email'];
           


            // Obtener los datos del carrito desde el formulario
            $datosCarritoJSON = isset($_POST['datos-carrito']) ? $_POST['datos-carrito'] : '';
            $totalJSON = isset($_POST['total-pagar']) ? $_POST['total-pagar'] : 0;
            // Convertir los datos del carrito a un array de PHP
            $datosCarrito = json_decode($datosCarritoJSON, true);
            $total = floatval($totalJSON);

           
            // Verificar si hay datos en el carrito
            if (!empty($datosCarrito)) {
                // Mostrar el encabezado
                echo '<h1>Detalles del Carrito</h1>';
                echo '<p>Hola, ' . $nombre_usuario . ' DNI: ' . $usuario . ' EMAIL: ' . $email_usuario . ' .... ya casi finalizas la compra!!.</p>';
                echo '<table>';
                echo '<tr><th>Producto</th><th>Precio</th><th>Cantidad</th></tr>';

                // Iterar sobre cada producto en el carrito
                foreach ($datosCarrito as $producto) {
                    echo '<tr>';
                    echo '<td>' . $producto['title'] . ' </td> ';
                    echo '<td>  $' . $producto['price'] . ' </td> ';
                    echo '<td>' . $producto['quantity'] . ' </td>';
                    echo '</tr>';
                }

                // Agregar una fila para mostrar el valor total
                    echo '<tr><th colspan="2">Valor Total</th><th> $' . $total . '</th></tr>';

                echo '</table>';
            } else {
                // Si el carrito está vacío, mostrar un mensaje
                echo '<p>No hay productos en el carrito.</p>';
            }
            ?>

             <!-- Agregar campos ocultos para los datos del producto y total -->
             <input type="hidden" id="datos-carrito" name="datos-carrito" value="<?php echo htmlspecialchars(json_encode($datosCarrito)); ?>">
                <input type="hidden" id="total-pagar" name="total-pagar" value="<?php echo htmlspecialchars($total); ?>">

        
            <!-- Campos para detalles de la tarjeta de pago -->
            <h2>Detalles de la Tarjeta de Pago</h2>
            <div class="mb-3">
                <label for="tipo_tarjeta" class="form-label">Tipo de Tarjeta:</label>
                <select class="form-select" id="tipo_tarjeta" name="tipo_tarjeta">
                    <option value="visa_debito">Visa Debito</option>
                    <option value="visa_credito">Visa Credito</option>
                    <option value="mastercard">Mastercard</option>
                    <option value="american_express">American Express</option>
                    
                </select>
            </div>
                <div class="mb-3">
                    <label for="numero_tarjeta" class="form-label">Número de Tarjeta:</label>
                    <input type="text" class="form-control" id="numero_tarjeta" name="numero_tarjeta" placeholder="0000 0000 0000 0000">
                </div>
                <div class="mb-3">
                    <label for="fecha_vencimiento" class="form-label">Fecha de Vencimiento (Mes y Año):</label>
                    <input type="month" class="form-control" id="fecha_vencimiento" name="fecha_vencimiento">
                </div>
                <div class="mb-3">
                    <label for="cvv" class="form-label">CVV:</label>
                    <input type="text" class="form-control" id="cvv" name="cvv" placeholder="ej: 104">
                </div>
                <div class="mb-3">
                    <label for="direccion" class="form-label">Dirección de Envío:</label>
                    <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Ingrese la dirección de envío">
                </div>
                <div class="mb-3">
                    <label for="codigo_postal" class="form-label">Código Postal:</label>
                    <input type="text" class="form-control" id="codigo_postal" name="codigo_postal" placeholder="Ingrese el código postal">
                </div>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <button type="submit" class="btn btn-primary">Registrar Pago</button>
                    <a   href="home.php" type="button" class="btn btn-secondary" onclick="cancelarCompra()">Cancelar compra</a>
                    
                </div>
        </form>

        <script>
        function cancelarCompra(){
            var respuesta=confirm("Estas seguro que deseas cancelar la compra?");
            return respuesta
        }

    </script>

        </div>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <p class="text-muted">© 2024 Escolar Vibes. Todos los derechos reservados.</p>
                </div>
                <div class="col-md-6">
                    <ul class="list-inline text-muted">
                        <li class="list-inline-item">
                            <a href="#" class="text-muted"><i class='bx bxl-facebook' ></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-muted"><i class='bx bxl-twitter' ></i></a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#" class="text-muted"><i class='bx bxl-instagram' ></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-6">
                    <a href="#" class="text-muted">
                        <i class='bx bxl-facebook' > Libreria_Vibes </i>
                    </a>
                    <a href="#" class="text-muted">
                        <i class='bx bxl-twitter' > @escolar_Vibes </i>
                    </a>
                        <a href="#" class="text-muted">
                            <i class='bx bxl-instagram' > @EscolarVibes </i>
                        </a>
                    <a href="" class="text-muted">
                        <i class='bx bx-mail-send' > LibreriaVibes@gmail.com </i>
                    </a>
                    <a href="tel:+1234567890" class="text-muted">
                        <i class='bx bxs-phone' > tel:+1234567890 </i>
                    </a>
            </div>
            </div>
        </div>
    </footer>
    
</body>
</html>

