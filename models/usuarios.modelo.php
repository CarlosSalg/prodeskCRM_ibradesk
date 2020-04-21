<?php 

require_once "conexion.php";

class ModeloUsuarios{

	public static function mdlIngresarUsuario($tabla, $usuario){

		$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE usu_usuario = :usuario");
		$stmt -> bindParam(":usuario",$usuario, PDO::PARAM_STR);
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;

	}

	public static function mdlBuscarUsuario($tabla, $id){

		$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla WHERE usu_id = :id");
		$stmt -> bindParam(":id",$id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt = null;

	}

	public static function mdlCrearUsuario($tabla, $datos){

		$stmt = Conexion::Conectar()->prepare("
			INSERT INTO $tabla (usu_nombre, usu_usuario, usu_roll, usu_foto, usu_password)
			VALUES (:usu_nombre, :usu_usuario, :usu_roll, :usu_foto, :usu_password)
		");

		$stmt -> bindParam(":usu_nombre",$datos['nombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":usu_usuario",$datos['usuario'], PDO::PARAM_STR);
		$stmt -> bindParam(":usu_roll",$datos['roll'], PDO::PARAM_STR);
		$stmt -> bindParam(":usu_foto",$datos['foto'], PDO::PARAM_STR);
		$stmt -> bindParam(":usu_password",$datos['password'], PDO::PARAM_STR);

		if($stmt->execute()){
            
            return "ok";

        }else{
            
            return "error";

        }

        $stmt -> close();
        $stmt =null;

	}

	public static function mdlMostrarUsuarios($tabla){

		$stmt = Conexion::Conectar()->prepare("SELECT * FROM $tabla");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;

    }


    public static function mdlActualizarEstatusUsuario($tabla, $estatusUsuario, $idUsuario){

    	$stmt = Conexion::Conectar()->prepare("

    			UPDATE $tabla 
    			SET usu_estatus = :usu_estatus 
    			WHERE usu_id = :usu_id

    		");

    	$stmt->bindParam(":usu_estatus",$estatusUsuario,PDO::PARAM_STR);
    	$stmt->bindParam(":usu_id",$idUsuario,PDO::PARAM_STR);

    	if($stmt->execute()){
    		return "ok";
    	}else{
    		return "error";
    	}

    	$stmt -> close();
    	$stmt = null;
    	
    }

    public static function mdlEliminarUsuario($tabla, $id){

    	$stmt = Conexion::Conectar()->prepare("
				DELETE FROM $tabla
				WHERE usu_id = :usu_id
    		");
    	$stmt->bindParam(":usu_id",$id,PDO::PARAM_INT);

    	if($stmt->execute()){
    		return "ok";
    	}else{
    		return "error";
    	}

    	$stmt -> close();
    	$stmt = null;

    }

    public static function mdlActualizarUsuario($tabla, $datos){

        $stmt = Conexion::Conectar()->prepare("

                UPDATE $tabla 
                SET usu_nombre = :usu_nombre, usu_roll = :usu_roll, usu_password = :usu_password, usu_foto = :usu_foto   
                WHERE usu_id = :usu_id

            ");

        $stmt->bindParam(":usu_nombre",$datos['nombre'],PDO::PARAM_STR);
        $stmt->bindParam(":usu_roll",$datos['roll'],PDO::PARAM_STR);
        $stmt->bindParam(":usu_password",$datos['password'],PDO::PARAM_STR);
        $stmt->bindParam(":usu_foto",$datos['foto'],PDO::PARAM_STR);
        $stmt->bindParam(":usu_id",$datos['id'],PDO::PARAM_STR);

        if($stmt->execute()){

            return true;

        }else{

            return false;
            
        }

        $stmt -> close();
        $stmt = null;
        
    }

}