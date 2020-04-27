<?php

require_once "../../models/vacantes.modelo.php";

$tabla = 'candidatos';
$id = $_POST['id'];

$respuesta = ModeloVacantes::mdlMostarPostulados($tabla, $id);

echo json_encode($respuesta);

