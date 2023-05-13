<?php 
include("../conexion/conexion.php");
$conexion = conectar();

$id_producto = $_POST['id_producto'];
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precio_venta = $_POST['precio_venta'];

$query = $conexion->prepare("UPDATE producto SET nombre = ?, descripcion = ?, stock = ?, precio_venta = ? WHERE id_producto = ?");
$query->bind_param('sssss',$nombre, $descripcion, $stock, $precio_venta, $id_producto);
$query->execute();

desconectar($conexion);
header('location:productos.php');
?>