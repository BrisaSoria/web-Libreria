<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/estilos2.css">
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

        
    </style>
</head>
<body class="background-container"style="margin-top: 60px;">
    <script>
        function eliminar(){
            var respuesta=confirm("Estas seguro que deseas eliminar este Producto?");
            return respuesta
        }

    </script>
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
        <?php
        include "../modelo/conexion.php";
        include "../controlador/eliminar_producto.php";
        ?>
    <div class="container-fluid row">
        <form action="../controlador/registrar_producto.php" class="col-4 p-3" method="post" enctype="multipart/form-data">
            <h3 class="text-center alert alert-info">Registro de Productos</h3>
            <?php
              if (isset($_GET["error"]) && $_GET["error"] == "empty_fields") {
                  echo '<div class="alert alert-danger" role="alert">ALGUNOS DE LOS CAMPOS ESTÁN VACÍOS</div>';
              }elseif (isset($_GET["success"]) && $_GET["success"] == "true") {
                  echo '<div class="alert alert-success">Producto registrado correctamente</div>';
              }elseif (isset($_GET["success"]) && $_GET["success"] == "false") {
                  echo '<div class="alert alert-danger">ERROR al registrar</div>';
              }
              
            ?>
            <div class="mb-3">
              <label for="exampleInputEmail1" class="form-label"></label>
              <input type="text" class="form-control" placeholder="Nombre ..." name="nombre">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="text" class="form-control" placeholder="Codigo ..." name="codigo">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="text" class="form-control" placeholder="Descripción ..." name="descripcion">
              </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="text" class="form-control" placeholder="Precio ..." name="precio">
            </div>
            <div class="mb-3">
                <label for="exampleInputEmail1" class="form-label"></label>
                <input type="file" class="form-control" placeholder="imagen..." name="imagen">
            </div>
            
            <button type="submit" class="btn btn-info" name="btnregistrarProducto" value="ok">Registrar Producto</button>
            
            
          </form>

          <div class="col-8 p-4">
            <table class="table table-bordered border-dark table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Código</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Precio</th>
                    <th scope="col">Imagen</th>
                    <th scope="col"></th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //include "../modelo/conexion.php";
                    $conexion = conexion();
                    $sql=$conexion->query("SELECT * FROM productos ORDER BY id ASC");
                    while($datos=$sql->fetch_object()){?> 
                          <tr>
                              <td><?= $datos->id ?></td>
                              <td><?= $datos->nombre ?></td>
                              <td><?= $datos->codigo ?></td>
                              <td><?= $datos->descripcion ?></td>
                              <td><?= $datos->precio ?></td>
                              <td><img src="<?= $datos->imagen ?>" width=80px height=auto></td>
                              <td>
                                  <a href="modificar_producto.php?id=<?=$datos->id ?>" class="btn btn-small btn-info"><i class='bx bx-edit'></i></a>
                                  <a onclick="return eliminar()" href="productos.php?id=<?=$datos->id ?>" class="btn btn-small btn-danger"><i class='bx bx-task-x'></i></a>
                              </td>
                          </tr>
                     <?php }
                     ?>
                    
                  
                  
                </tbody>
              </table>
          </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>