<?php 

require_once "../../models/tareas.modelo.php";

$tabla = 'tareas';
$id = $_POST['id'];

$respuesta = ModeloTareas::mdlMostarTodasMisTareasAbiertas($tabla, $id);

$respuestaTareas = ModeloTareas::mdlMostarHistorialTarea($tabla, $id);


echo json_encode($respuesta);