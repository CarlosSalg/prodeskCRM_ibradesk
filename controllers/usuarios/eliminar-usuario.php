<?php 

require_once "../../models/usuarios.modelo.php";

$id = $_POST['idUsuario'];
$tabla = 'usuarios';

$usuario = ModeloUsuarios::mdlBuscarUsuario($tabla, $id);

if($usuario['usu_foto'] != ""){

	$foto = $usuario['usu_foto'];
	$directorio = $usuario["usu_usuario"];

	unlink($foto);
	rmdir($directorio);
}

$respuesta = ModeloUsuarios::mdlEliminarUsuario($tabla, $id);
echo $respuesta;