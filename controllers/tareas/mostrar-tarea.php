<?php 

require_once "../../models/tareas.modelo.php";

$id = $_POST['id'];
$tabla = 'tareas';

$responseTarea = ModeloTareas::mdlBuscarTarea($tabla, $id);
$usuariosAsignados = json_decode($responseTarea['tar_usuarios']);

echo json_encode($responseTarea);

