<?php

class ModeloNotificaciones{

    public static function mdlCrearNotificacion($tabla, $notificacion){

        $stmt = Conexion::Conectar()->prepare("
			INSERT INTO $tabla (not_usu_id, not_usu_id_creador, not_tipo, not_texto, not_descripcion, not_fecha, not_estatus)
			VALUES (:not_usu_id, :not_usu_id_creador, :not_tipo, :not_texto, :not_descripcion, :not_fecha, :not_estatus)
		");

        $stmt -> bindParam(":not_usu_id",$notificacion['usuarioNotificado'], PDO::PARAM_STR);
        $stmt -> bindParam(":not_usu_id_creador",$notificacion['usuarioCreador'], PDO::PARAM_STR);
		$stmt -> bindParam(":not_tipo",$notificacion['tipoNotificacion'], PDO::PARAM_STR);
        $stmt -> bindParam(":not_texto",$notificacion['textoNotificacion'], PDO::PARAM_STR);
        $stmt -> bindParam(":not_descripcion",$notificacion['descripcionNotificacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":not_fecha",$notificacion['fechaHoraNotificacion'], PDO::PARAM_STR);
		$stmt -> bindParam(":not_estatus",$notificacion['estatusNotificacion'], PDO::PARAM_STR);

		if($stmt->execute()){
            
            return "ok";

        }else{
            
            return "error";

        }

        $stmt -> close();
        $stmt =null;

    }

    public static function mdlMostarNotificacionesActivas($tabla, $id){

        $stmt = Conexion::Conectar()->prepare("
            SELECT * FROM $tabla
            WHERE not_usu_id = :id AND not_estatus = 1
            ORDER BY not_id DESC
        ");
        
        $stmt -> bindParam(":id",$id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt = null;

    }

    public static function mdlMostrarTodasLasNotificaciones($tabla, $id){

        $stmt = Conexion::Conectar()->prepare("
            SELECT * FROM $tabla
            WHERE not_usu_id = :id
            ORDER BY not_id DESC
            LIMIT 50
        ");
        
        $stmt -> bindParam(":id",$id, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt = null;

    }

    public static function mdlBuscarNotificacion($tabla, $idNotificacion){

        $stmt = Conexion::Conectar()->prepare("
            SELECT * FROM $tabla
            WHERE not_id = :id
        ");
        
        $stmt -> bindParam(":id",$idNotificacion, PDO::PARAM_INT);
		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt = null;

    }

    public static function mdlMarcarLeidaNotificacion($tabla, $idNotificacion){

        $stmt = Conexion::Conectar()->prepare("
            UPDATE $tabla
            SET not_estatus = 0
            WHERE not_id = :id
        ");
        
        $stmt -> bindParam(":id",$idNotificacion, PDO::PARAM_INT);
        
        if($stmt -> execute()){

            return true;

        }else{

            return false;
            
        }
		

		$stmt -> close();
        $stmt = null;

    }


}