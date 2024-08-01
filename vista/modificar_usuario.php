<?php
 include "../modelo/conexion.php";
 $conexion=conexion();

 $id=$_GET["id"];

 $sql=$conexion->query("SELECT * FROM usuarios where id=$id");

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos2.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>Document</title>
</head>
<body style="margin-top: 60px;">
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
                <button class="navbar-toggler" type="button" data-bs-toggle="offcanvas" data-bs-target="#offcanvasNavbar" aria-controls="offcanvasNavbar" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
                </button>
                <div class="offcanvas offcanvas-end" tabindex="-1" id="offcanvasNavbar" aria-labelledby="offcanvasNavbarLabel">
                <div class="offcanvas-header">
                <img src="../css/Logoo.png" alt="">
                    <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                </div>
                <div class="offcanvas-body">
                    <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="Admin.php">Usuarios</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="productos.php">Productos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="registro_login.php">Registros Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="pedidos.php">Pedidos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="ventas.php">Ventas</a>
                    </li>
                    <form method="post"action="../controlador/logout.php">
                        <input class="nav-link" type="submit" name="salir" value="Cerrar Sesión">
                    </form>
                    </ul>
                    
                </div>
                </div>
            </div>
        </nav>

        <div class="container-fluid row" style="background-color: rgba(255, 255, 255, .2);backdrop-filter: blur(10px);">
            <form action="" class="col-4 p-3 mx-auto my-5" method="post">
                <h3 class="text-center alert alert-info">Modificar Datos de Usuario</h3>
                <input type="hidden" name="id" value="<?=$_GET["id"] ?>">
                <?php
                include "../controlador/editar_usuario.php";             
                while ($datos=$sql->fetch_object()) {?>
                    <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input type="text" class="form-control" name="nombre" value="<?= $datos->nombre ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Apellido</label>
                    <input type="text" class="form-control" name="apellido" value="<?= $datos->apellido ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="text" class="form-control" name="email" value="<?= $datos->email ?>">
                    </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">DNI</label>
                    <input type="text" class="form-control" name="dni"  value="<?= $datos->dni ?>">
                </div>
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Contraseña</label>
                    <input type="text" class="form-control" name="clave" value="<?= $datos->clave ?>">
                </div>
                <?php }
                ?>
           
            
                <button type="submit" class="btn btn-info" name="btnmodificar" value="ok">Modificar</button>
            
            
            </form>  
               
        </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>