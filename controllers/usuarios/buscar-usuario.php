<?php 

require_once "../../models/usuarios.modelo.php";

$tabla = 'usuarios';
$id = $_POST['id'];

$respuesta = ModeloUsuarios::mdlBuscarUsuario($tabla, $id);

echo json_encode($respuesta);