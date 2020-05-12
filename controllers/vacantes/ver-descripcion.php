<?php

require_once "../../models/vacantes.modelo.php";

$id = $_POST['id'];

$respuesta = ModeloVacantes::mdlBuscarVacanteConCliente($id);

echo json_encode($respuesta);

