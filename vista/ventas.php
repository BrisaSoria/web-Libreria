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
    <script>
        function eliminar(){
            var respuesta=confirm("Seguro quieres eliminar este registro de venta?");
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
        include "../controlador/eliminar_venta.php";
        ?>

          <div class="col-12 p-4">
            <table class="table table-bordered border-dark table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI usuario</th>
                    <th scope="col">Nombre usuario</th>
                    <th scope="col">Producto</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Precio uni $</th>
                    <th scope="col">Total $</th>
                    <th scope="col">Tarjeta</th>
                    <th scope="col">Nº tarteja</th>
                    <th scope="col">Vencimiento</th>
                    <th scope="col">CVV</th>
                    <th scope="col">Direccion envio</th>
                    <th scope="col">Codigo postal</th>
                    <th scope="col">Fecha de venta</th>
                    <th scope="col"></th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //include "../modelo/conexion.php";
                    $conexion = conexion();
                    $sql=$conexion->query("SELECT * FROM ventas ORDER BY id DESC");
                    while($datos=$sql->fetch_object()){?> 
                          <tr>
                              <td><?= $datos->id?></td>
                              <td><?= $datos->id_usuario?></td>
                              <td><?= $datos->nombre_usuario?></td>
                              <td><?= $datos->productos?></td>
                              <td><?= $datos->cantidad?></td>
                              <td><?= $datos->precio_uni?></td>
                              <td><?= $datos->total_pago?></td>
                              <td><?= $datos->tipo_tarjeta?></td>
                              <td><?= $datos->numero_tarjeta?></td>
                              <td><?= $datos->fecha_vencimiento?></td>
                              <td><?= $datos->cvv?></td>
                              <td><?= $datos->direccion_envio?></td>
                              <td><?= $datos->cod_postal?></td>
                              <td><?= $datos->fecha_venta?></td>
                              
                              <td>
                                  <a onclick="return eliminar()" href="ventas.php?id=<?=$datos->id ?>" class="btn btn-small btn-danger"><i class='bx bx-task-x'></i></a>
                              </td>
                          </tr>
                     <?php }
                     ?>
                    
                  
                  
                </tbody>
              </table>
          </div>
    



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>
</body>
</html>