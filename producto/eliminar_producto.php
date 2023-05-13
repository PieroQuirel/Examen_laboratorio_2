<?php 
include("../conexion/conexion.php");
$conexion = conectar();
$id = $_GET['id'];

$query = $conexion->prepare("DELETE FROM producto where id_producto = ?");
$query->bind_param('s',$id);
$query->execute();

desconectar($conexion);
header('location:productos.php');
?>