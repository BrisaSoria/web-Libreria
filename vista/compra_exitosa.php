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
        <div class="col-4 p-3 mx-auto my-5">
        
            <?php
             session_start();

                    // Verificar si el usuario ha iniciado sesión
                    if (!isset($_SESSION['id_user'])) {
                        // Si el usuario no ha iniciado sesión, redirigirlo al inicio de sesión
                        header('Location: login.html');
                        exit(); // Terminar el script para evitar que se ejecute más código
                    }

                    include "../modelo/conexion.php";
                    $conexion = conexion();

                    // Obtener el número de compra desde la URL
                    $num_venta = isset($_GET['num_venta']) ? $_GET['num_venta'] : '';

                    // Realizar una consulta para obtener los detalles de la compra asociados al número de compra
                    $sql = "SELECT pedidos.num_venta, productos.nombre, pedidos.cantidad, pedidos.id_precio
                            FROM pedidos
                            INNER JOIN productos ON pedidos.id_producto = productos.codigo
                            WHERE pedidos.num_venta = '$num_venta'";
                
                    $result = $conexion->query($sql);

                    if ($result === false) {
                        
                        echo "Error: " . $conexion->error . "<br>";
                    } elseif ($result->num_rows > 0) {
                        echo '<h1>Muchas Gracias por tu compra!!!</h1>';
                        // si se encontraron resultados, mostrar los detalles de la compra
                        while ($row = $result->fetch_assoc()) {
                            // imprimir los detalles de la compra
                            echo "Número de compra: " . $row['num_venta'] . "<br>";
                            echo "Producto: " . $row['nombre'] . "<br>";
                            echo "Cantidad: " . $row['cantidad'] . "<br>";
                            echo "Precio unitario: $" . $row['id_precio'] . "<br>";
                            
                        }
                    } else {
                        echo "No se encontraron detalles de la compra.";
                    }

                    // Cerrar la conexión
                    $conexion->close();
                                    
                ?>

                <div style="display: flex; justify-content: space-between; align-items: center; margin-top: 20px;">
                    <a   href="home.php" type="button" class="btn btn-secondary">Volver a la tienda</a>
                    
                </div>
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






