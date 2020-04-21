<?php 

require_once "conexion.php";

class ModeloClientes{

	public static function mdlCrearCliente($tabla, $datos){

		$stmt = Conexion::Conectar()->prepare("
			INSERT INTO $tabla 
			(cli_razon_social, cli_nombre_comercial, cli_contacto_compras_nombres, cli_contacto_compras_apellidos, cli_contacto_compras_correo, cli_contacto_compras_telefono, cli_estatus)
			VALUES 
			(:cli_razon_social, :cli_nombre_comercial, :cli_contacto_compras_nombres, :cli_contacto_compras_apellidos, :cli_contacto_compras_correo, :cli_contacto_compras_telefono, :cli_estatus)
			");

		$stmt -> bindParam(":cli_razon_social",$datos['razonSocial'], PDO::PARAM_STR);
		$stmt -> bindParam(":cli_nombre_comercial",$datos['nombreComercial'], PDO::PARAM_STR);
		$stmt -> bindParam(":cli_contacto_compras_nombres",$datos['contactoComprasNombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":cli_contacto_compras_apellidos",$datos['contactoComprasApellidos'], PDO::PARAM_STR);
		$stmt -> bindParam(":cli_contacto_compras_correo",$datos['contactoComprasCorreo'], PDO::PARAM_STR);
		$stmt -> bindParam(":cli_contacto_compras_telefono",$datos['contactoComprasTelefono'], PDO::PARAM_STR);
		$stmt -> bindParam(":cli_estatus",$datos['statusCliente'], PDO::PARAM_STR);

		if($stmt -> execute()){

			return true;

		}else{

			return false;

		}

		$stmt -> close();
        $stmt =null;

	}

	public static function mdlMostrarClientes($tabla){

		$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");
		$stmt -> execute();

		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;

	}

	public static function mdlEliminarCliente($tabla, $id){

		$stmt = Conexion::Conectar()->prepare("DELETE FROM $tabla WHERE cli_id = :id");
		$stmt -> bindParam(":id",$id, PDO::PARAM_INT);

		if($stmt -> execute()){

			return true;

		}else{

			return false;

		}

		$stmt -> close();
        $stmt =null;

	}

}