<?php

require_once "../../models/vacantes.modelo.php";

$tabla = 'candidatos';
$id = $_POST['id'];

$respuesta = ModeloVacantes::mdlDescartarCandidato($tabla, $id);

echo $respuesta;