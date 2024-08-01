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
            var respuesta=confirm("");
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
        ?>

          <div class="col-12 p-4">
            <table class="table table-bordered border-dark table-hover">
                <thead class="table-dark">
                  <tr>
                    <th scope="col">ID</th>
                    <th scope="col">DNI usuario</th>
                    <th scope="col">Email usuario</th>
                    <th scope="col">Codigo Producto</th>
                    <th scope="col">Precio uni $</th>
                    <th scope="col">Cantidad</th>
                    <th scope="col">Direccion envio</th>
                    <th scope="col">Fecha del Pedido</th>
                    <th scope="col">Imagen</th>
                    <th scope="col">Estado</th>
                    
                  </tr>
                </thead>
                <tbody>
                    <?php
                    //include "../modelo/conexion.php";
                    $conexion = conexion();
                    $sql = $conexion->query("SELECT p.*, pr.imagen FROM pedidos p INNER JOIN productos pr ON p.id_producto = pr.codigo ORDER BY p.id DESC");
                    while($datos=$sql->fetch_object()){?> 
                          <tr>
                              <td><?= $datos->id?></td>
                              <td><?= $datos->id_usuario?></td>
                              <td><?= $datos->email_usuario?></td>
                              <td><?= $datos->id_producto?></td>
                              <td><?= $datos->id_precio?></td>
                              <td><?= $datos->cantidad?></td>
                              <td><?= $datos->direccion_envio?></td>
                              <td><?= $datos->fecha_pedido?></td>
                              <td><img src="<?= $datos->imagen ?>" width=80px height=auto></td>
                              
                              
                              <td>
                                    <form action="../controlador/actualizar_estado_pedido.php" method="post">
                                        <select name="estado" onchange="this.form.submit()" class="form-control <?= $datos->estado == 1 ? 'bg-success' : 'bg-danger' ?> text-white">
                                            <option value="0" <?= $datos->estado == 0 ? 'selected' : '' ?>>No entregado</option>
                                            <option value="1" <?= $datos->estado == 1 ? 'selected' : '' ?>>Entregado</option>
                                        </select>
                                        <input type="hidden" name="id" value="<?= $datos->id ?>">
                                        <button type="submit" style="display: none;">Actualizar</button>
                                    </form>
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