<?php
include("../conexion/conexion.php");

//Conexion
$conexion = conectar();

//Consultamos datos
$query = $conexion->prepare("SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto");
$query->execute();
$resultado = $query->get_result();

//Cerramos conexion
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
    <title>Productos</title>
</head>

<body>
    <div class="container">
        <h1>Jugueria - Productos</h1>
        <a href="agregar_producto.html">
            <button type="button" class="btn btn-success mb-3">Nuevo producto!</button>
        </a>
        <a href="buscar_producto.php">
            <button type="button" class="btn btn-primary mb-3">Buscar producto!</button>
        </a>
        <table class="table table-striped table-hover">
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