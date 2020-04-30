<?php

require_once "../../models/notificaciones.modelo.php";

$tabla = 'notificaciones';
$id = $_POST['id'];
$nuevoValorEstatus = $_POST['nuevoValorEstatus'];

$respuesta = ModeloNotificaciones::mdlActualizarEstatus($tabla, $id, $nuevoValorEstatus);

echo $respuesta;