<?php 

require_once "../../models/usuarios.modelo.php";

$tabla = 'usuarios';
$id = $_POST['idAutor'];

$responseUsuario = ModeloUsuarios::mdlBuscarUsuario($tabla, $id);

echo $responseUsuario['usu_nombre'];
