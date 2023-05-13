<?php
include('../conexion/conexion.php');

// Conexion
$conexion = conectar();

// Verificamos la busqueda
if(isset($_GET['buscar'])) {
    $buscar = $_GET['buscar'];

    // Consulta para buscar un producto por el nombre
    $sql = "SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto WHERE nombre LIKE '%$buscar%'";
    $resultado = mysqli_query($conexion, $sql);
    
} else {
    $sql = 'SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto';
    $resultado = mysqli_query($conexion, $sql);
}

// Cerramos conexion
desconectar($conexion);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" 
    rel="stylesheet" integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ" 
    crossorigin="anonymous">
    <title>Buscar producto</title>
</head>
<body>
    <div class="container">
        <h1>Buscador de producto</h1>
            <form method="get" autocomplete="off">
                <div class="form-group">
                    <label for="buscar">Ingresa lo que buscas:</label>
                    <input type="text" name="buscar" size="40">
                </div>
                <div class="mt-3">
                <button type="submit" class="btn btn-primary col-3">Buscar</button>
                </div>
            </form>
            <br>
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nombre</th>
                        <th>Descripcion</th>
                        <th>Stock</th>
                        <th>Precio</th>
                        <th>&nbsp;</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    while ($producto = $resultado->fetch_assoc()) {

                    echo '<tr>';
                    echo '<td>' . $producto['id_producto'] . '</td>';
                    echo '<td>' . $producto['nombre'] . '</td>';
                    echo '<td>' . $producto['descripcion'] . '</td>';
                    echo '<td>' . $producto['stock'] . '</td>';
                    echo '<td>' . $producto['precio_venta'] . '</td>';
                    echo '<td><a href="editar_producto.php?id=' . $producto['id_producto'] . '"><button type="button" class="btn btn-secondary">Editar</button></a>
                    <a href="eliminar_producto.php?id=' . $producto['id_producto'] . '"><button type="button" class="btn btn-danger">Eliminar</button></a></td>';
                    echo '</tr>';
                    }
                    ?>
                </tbody>    
            </table>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>
</body>
</html>