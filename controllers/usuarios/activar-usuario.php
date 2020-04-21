<?php 

require_once "../../models/usuarios.modelo.php";

$estatusUsuario = $_POST['estatusUsuario'];
$idUsuario = $_POST['idUsuario'];
$tabla = 'usuarios';

$respuesta = ModeloUsuarios::mdlActualizarEstatusUsuario($tabla, $estatusUsuario, $idUsuario);

echo $respuesta;