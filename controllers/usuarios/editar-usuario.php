<?php 

require_once "../../models/usuarios.modelo.php";

$id = $_POST['idUsuario'];
$tabla = 'usuarios';

$usuario = ModeloUsuarios::mdlBuscarUsuario($tabla, $id);

echo json_encode($usuario);