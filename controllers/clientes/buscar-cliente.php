<?php 

require_once "../../models/clientes.modelo.php";

$id = $_POST['idCliente'];
$tabla = 'clientes';

$respuesta = ModeloClientes::mdlBuscarCliente($tabla, $id);

echo json_encode($respuesta);
