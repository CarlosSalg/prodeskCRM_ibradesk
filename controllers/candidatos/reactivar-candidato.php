<?php

require_once "../../models/vacantes.modelo.php";

$tabla = 'candidatos';
$id = $_POST['id'];

$respuesta = ModeloVacantes::mdlReactivarCandidato($tabla, $id);

echo $respuesta;