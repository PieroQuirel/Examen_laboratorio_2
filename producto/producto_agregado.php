<?php 

include("../conexion/conexion.php");

//Recogemos los valores del formulario
$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$stock = $_POST['stock'];
$precio_venta = $_POST['precio_venta'];

//Conexion
$conexion = conectar();

//Utilizamos los valores para completar la consulta
$query = $conexion->prepare("INSERT INTO producto (nombre, descripcion, stock, precio_venta) VALUES (?,?,?,?)"); 
$query->bind_param('ssss',$nombre, $descripcion, $stock, $precio_venta);

if ($query->execute()) {
    header('location:productos.php');
}
else {
    echo 'Problema con el ingreso de dato, no se agregó el producto';
}

//Cerramos conexion
desconectar($conexion);