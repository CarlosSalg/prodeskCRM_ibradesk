<?php

require_once "conexion.php";

class ModeloMensajes{


    public static function mdlCrearMensaje($tabla, $datos){

        $stmt = Conexion::Conectar()->prepare("
            INSERT INTO $tabla 
            (men_usu_emisor, men_usu_receptor, men_texto, men_fecha, men_hora)
            VALUES 
            (:men_usu_emisor, :men_usu_receptor, :men_texto, :men_fecha, :men_hora)
		");

		$stmt -> bindParam(":men_usu_emisor",$datos['idEmisor'], PDO::PARAM_INT);
		$stmt -> bindParam(":men_usu_receptor",$datos['idReceptor'], PDO::PARAM_INT);
		$stmt -> bindParam(":men_texto",$datos['mensaje'], PDO::PARAM_STR);
		$stmt -> bindParam(":men_fecha",$datos['fecha'], PDO::PARAM_STR);
		$stmt -> bindParam(":men_hora",$datos['hora'], PDO::PARAM_STR);

		if($stmt->execute()){
            
            return true;

        }else{
            
            return false;

        }

        $stmt -> close();
        $stmt =null;

    }    

    public static function mdlObtenerHistorial($tabla, $datos){

        $stmt = Conexion::Conectar()->prepare("
            
            SELECT m.men_id, m.men_usu_emisor, m.men_usu_receptor, m.men_texto, m.men_fecha, m.men_hora, u.usu_nombre, u.usu_foto FROM mensajes m
            JOIN usuarios u ON m.men_usu_emisor = u.usu_id
            WHERE m.men_usu_emisor = :idUno AND m.men_usu_receptor = :idDos OR  m.men_usu_emisor = :idDos AND m.men_usu_receptor = :idUno
            ORDER BY m.men_id ASC

		");

		$stmt -> bindParam(":idUno",$datos['idEmisor'], PDO::PARAM_INT);
		$stmt -> bindParam(":idDos",$datos['idReceptor'], PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt = null;

    }   

    public static function mdlObtenerUsuariosHistorial($tabla, $datos){

        $stmt = Conexion::Conectar()->prepare("
            
            SELECT m.men_id, m.men_usu_emisor, m.men_usu_receptor, m.men_texto, m.men_fecha, m.men_hora, u.usu_id, u.usu_usuario, u.usu_nombre, u.usu_foto FROM mensajes m
            JOIN usuarios u ON m.men_usu_emisor = u.usu_id
            WHERE m.men_usu_emisor = :idUno OR m.men_usu_receptor = :idUno
            ORDER BY m.men_id ASC

		");

		$stmt -> bindParam(":idUno",$datos['idEmisor'], PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt = null;

    }   


}