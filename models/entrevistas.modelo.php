<?php

require_once "conexion.php";

class ModeloEntrevistas{


    public static function mdlCrearEntrevista($tabla, $datos){

        $stmt = Conexion::Conectar()->prepare("
            INSERT INTO $tabla 
            (ent_vac_id, ent_candidato, ent_entrevistador, ent_fecha, ent_hora_inicio, ent_hora_fin)
            VALUES 
            (:ent_vac_id, :ent_candidato, :ent_entrevistador, :ent_fecha, :ent_hora_inicio, :ent_hora_fin)
		");

		$stmt -> bindParam(":ent_vac_id",$datos['vacante'], PDO::PARAM_INT);
		$stmt -> bindParam(":ent_candidato",$datos['candidato'], PDO::PARAM_INT);
		$stmt -> bindParam(":ent_entrevistador",$datos['entrevistador'], PDO::PARAM_INT);
		$stmt -> bindParam(":ent_fecha",$datos['fechaEntrevista'], PDO::PARAM_STR);
		$stmt -> bindParam(":ent_hora_inicio",$datos['horaEntrevista'], PDO::PARAM_STR);
		$stmt -> bindParam(":ent_hora_fin",$datos['horaEntrevistaFin'], PDO::PARAM_STR);

		if($stmt->execute()){
            
            return true;

        }else{
            
            return false;

        }

        $stmt -> close();
        $stmt =null;


    }

    public static function mdlObtenerUltimoId($tabla){

		$stmt = Conexion::Conectar()->prepare("
			SELECT MAX(ent_id) AS id FROM $tabla
			");

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;

	}

    


}