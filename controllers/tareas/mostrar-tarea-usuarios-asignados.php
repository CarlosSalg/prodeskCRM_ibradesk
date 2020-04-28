<?php 

require_once "../../models/usuarios.modelo.php";

$usuarioString = '';
$cadena = '';
$usuarios = $_POST['idUsuariosAsginados'];
$usuariosArray = json_decode($usuarios);

if(count($usuariosArray)>1){
	

	foreach ($usuariosArray as $key => $usuario) {
		$tabla = 'usuarios';
		$nombreUsuario = ModeloUsuarios::mdlBuscarUsuario($tabla, $usuario);
		$cadena .= $nombreUsuario['usu_nombre'];
		$cadena .= ', ';
	}

	$usuarioString = substr($cadena, 0, -2);

}else{

	foreach ($usuariosArray as $key => $usuario) {
		$tabla = 'usuarios';
		$nombreUsuario = ModeloUsuarios::mdlBuscarUsuario($tabla, $usuario);
		$usuarioString .= $nombreUsuario['usu_nombre'];
	}

}

echo $usuarioString;