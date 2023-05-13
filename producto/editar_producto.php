<?php

include("../conexion/conexion.php");

// Conexion
$conexion = conectar();

//Llamar a la id del producto que elejimos a partir de la url
$id = $_GET['id'];

//Buscamos el producto con la id y lo guardamos
$query = $conexion->prepare("SELECT id_producto, nombre, descripcion, stock, precio_venta FROM producto where id_producto = ?");
$query->bind_param('s',$id);
$query->execute();
$resultado = $query->get_result();
$producto = $resultado->fetch_assoc();

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
    <title>Editar producto</title>
</head>
<body>
    <div class="container mt-4">
        <div class="row justify-content-center pt-5 mt-5 mr-1 text-center">
            <h1>Editar producto</h1>
            <form name="formulario2" method="post" action="producto_editado.php">
                <table style="position:relative; margin:auto; width:100%;">
                    <tr class="row mb-3">
                    <input type="hidden" name="id_producto" value="<?php echo $producto['id_producto'] ?>" required>
                    </tr>
                    <tr class="row mb-3">
                        <td>Nombre</td>
                        <td>
                            <input type="text" name="nombre" value="<?php echo $producto['nombre'] ?>" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Descripcion</td>
                        <td>
                            <textarea name="descripcion" cols="40" rows="5" maxlength="250"><?php echo $producto['descripcion'] ?></textarea>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Stock del producto</td>
                        <td>
                            <input type="number" name="stock" value="<?php echo $producto['stock'] ?>" required>
                        </td>
                    </tr>
                    <tr class="row mb-3">
                        <td>Precio por unidad</td>
                        <td>
                            <input type="number" step="0.01" name="precio_venta" value="<?php echo $producto['precio_venta'] ?>">
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <button class="btn btn-secondary col-4" type="submit">Actualizar</button>
                        </td>
                    </tr>
                </table>
            </form>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js" 
    integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" 
    crossorigin="anonymous"></script>