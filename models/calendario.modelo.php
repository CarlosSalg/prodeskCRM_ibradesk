<?php

require_once "conexion.php";

class ModeloCalendario{


    public static function mdlCrearEvento($tabla, $datos){

        $stmt = Conexion::Conectar()->prepare("
            INSERT INTO $tabla 
            (cal_user_id, cal_event_descripcion, cal_type, cal_title, cal_start_date, cal_start_time, cal_end_date, cal_end_time, cal_all_day, cal_url, cal_background_color, cal_border_color)
            VALUES 
            (:cal_user_id, :cal_event_descripcion, :cal_type, :cal_title, :cal_start_date, :cal_start_time, :cal_end_date, :cal_end_time, :cal_all_day, :cal_url, :cal_background_color, :cal_border_color)
        ");

        $stmt -> bindParam(":cal_user_id",$datos['cal_user_id'], PDO::PARAM_INT);
        $stmt -> bindParam(":cal_event_descripcion",$datos['cal_event_descripcion'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_type",$datos['cal_type'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_title",$datos['cal_title'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_start_date",$datos['cal_start_date'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_start_time",$datos['cal_start_time'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_end_date",$datos['cal_end_date'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_end_time",$datos['cal_end_time'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_all_day",$datos['cal_all_day'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_url",$datos['cal_url'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_background_color",$datos['cal_background_color'], PDO::PARAM_STR);
        $stmt -> bindParam(":cal_border_color",$datos['cal_border_color'], PDO::PARAM_STR);


		if($stmt->execute()){
            
            return true;

        }else{
            
            return false;

        }

        $stmt -> close();
        $stmt =null;

    }

    public static function mdlMostrarEventos($tabla, $id){

        $stmt = Conexion::Conectar()->prepare("
            SELECT * FROM $tabla
            WHERE cal_user_id = :id
        ");

        $stmt -> bindParam(":id",$id, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;

    }



}