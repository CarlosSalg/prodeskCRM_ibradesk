<?php

require_once "../../models/calendario.modelo.php";

$tabla = 'calendario';
$id = $_POST['id'];

$respuesta = ModeloCalendario::mdlMostrarEventos($tabla, $id);

echo json_encode($respuesta);