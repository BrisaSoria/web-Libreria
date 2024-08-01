<?php
 session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/styles.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
    <style>
        .background-container {
            background-image: url('../css/fondologin2.jpg');
            background-size: cover;
            background-position: center;
            background-attachment: fixed;
            
        }
        .container-cart-products {
            position: fixed; 
            top: 50px;
            right: 0;
            background-color: #fff;
            width: 400px;
            z-index: 1;
            box-shadow: 0 10px 20px rgba(0,0,0,0.20);
            border-radius: 10px;
            max-height: 70vh; 
            overflow-y: auto; 
            padding-bottom: 50px;
        }
        
    </style>
</head>
<body class="background-container" style="margin-top: 100px;">
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
                        <div class="container-cart-products hidden-cart">
                            <img src="../css/Logoo.png" alt="" >
                            <div class="row-product hidden">

                                 <div class="cart-product">
                                <div class="info-cart-product"> 
                                    <span class="cantidad-producto-carrito"></span>
                                    <p class="titulo-producto-carrito"></p>
                                    <span class="precio-producto-carrito"></span>
                                </div>
                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="icon-close" viewBox="0 0 16 16">
                                    <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14m0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16"/>
                                    <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708"/>
                                </svg>
                            </div>

                            </div>
                           
                            <div class="cart-total hidden">
                                <h3>Total:</h3>
                                <span class="total-pagar">
                                </span>
                            </div>

                            <p class="cart-empty"></p>

                                 <div class="info-product">
                                    <button type="submit" id="btn-finalizar-compra" class="btn-add-cart">Finalizar compra</button> 
                                    </div>
                            
                        </div>
                    
                </div>
            </div>
        </nav>
     
        <div class="container">
            <div class="row justify-content-center">
                <?php 
                include "../modelo/conexion.php";
                $conexion = conexion();
                $sql=$conexion->query("SELECT * FROM productos ORDER BY id ASC");
                while($datos=$sql->fetch_object()){?>
                <div class="col-4 p-4 mx-auto ">
                    <div class="item">
                        <figure>
                            <img src="<?= $datos->imagen?>" alt="producto">
                        </figure>
                        <div class="info-product">
                            <h3><?= $datos->nombre ?></h3>
                            <h10><?= $datos->descripcion ?></h10>
                            <p class="price"><?= $datos->precio ?></p>
                            <button class="btn-add-cart">Añadir al carrito</button>
                        </div>
                    </div>
                </div>
                <?php }
                ?>
            </div>
    </div>
        

        <script src="../controlador/home.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
        
        <form id="form-detalles-compra" method="post" action="detalles_compra.php" style="display: none;">
            <input type="text" id="datos-carrito" name="datos-carrito" value="">
            <input type="hidden" id="total-pagar" name="total-pagar" value=""> 
        </form>

        <?php
            // Verificar si el usuario ha iniciado sesión
            if (isset($_SESSION['id_user'])) {
            // Imprimir el nombre de usuario
            echo '<script>console.log("Usuario actual: ' . $_SESSION['id_user'] . '");</script>';
            }
        ?>

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