<?php

include "../../models/vacantes.modelo.php";

$buscar = $_POST['dato'];

$respuesta = ModeloVacantes::mdlBuscarVacantesSimilares($buscar);

echo json_encode($respuesta);