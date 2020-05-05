<?php 

require_once "conexion.php";

class ModeloTareas{

	public static function mdlCrearTarea($tabla, $datos){

		$stmt = Conexion::Conectar()->prepare("
			INSERT INTO $tabla (tar_usuarios, tar_nombre, tar_fecha_inicio, tar_hora_inicio, tar_fecha_fin, tar_hora_fin, tar_descripcion, tar_archivo, tar_archivo_nombre, tar_creado_por, tar_estatus)
			VALUES (:tar_usuarios, :tar_nombre, :tar_fecha_inicio, :tar_hora_inicio, :tar_fecha_fin, :tar_hora_fin, :tar_descripcion, :tar_archivo, :tar_archivo_nombre, :tar_creado_por, :tar_estatus)
		");

		$stmt -> bindParam(":tar_usuarios",$datos['usuarios'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_nombre",$datos['nombreTarea'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_fecha_inicio",$datos['fechaInicio'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_hora_inicio",$datos['horaInicio'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_fecha_fin",$datos['fechaFin'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_hora_fin",$datos['horaFin'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_descripcion",$datos['descripcionTarea'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_archivo",$datos['archivoAdjunto'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_archivo_nombre",$datos['archivoNombre'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_creado_por",$datos['creadoPor'], PDO::PARAM_INT);
		$stmt -> bindParam(":tar_estatus",$datos['estatusTarea'], PDO::PARAM_STR);


		if($stmt->execute()){
            
            return true;

        }else{
            
            return false;

        }

        $stmt -> close();
        $stmt =null;
	}

	public static function mdlMostarTareasLimit3($tabla){

		$stmt = Conexion::Conectar()->prepare("
			SELECT * FROM $tabla 
			JOIN usuarios ON tar_creado_por = usu_id
			ORDER BY tar_id DESC LIMIT 3");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;
	}

	public static function mdlMostarTodasMisTareas($tabla, $id){

		$idUsuario = '%"';
		$idUsuario .= $id;
		$idUsuario .= '"%';

		$stmt = Conexion::Conectar()->prepare("

			SELECT * FROM $tabla 
			JOIN usuarios ON tar_creado_por = usu_id
			WHERE tar_usuarios LIKE :id 
			ORDER BY tar_id DESC");

		$stmt -> bindParam(":id",$idUsuario, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;
	}

	public static function mdlMostarTodasMisTareasCreadas($tabla, $id){

		$stmt = Conexion::Conectar()->prepare("

			SELECT * FROM $tabla 
			JOIN usuarios ON tar_creado_por = usu_id
			WHERE tar_creado_por LIKE :id 
			ORDER BY tar_id DESC");

		$stmt -> bindParam(":id",$id, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;
	}

	public static function mdlObtenerUltimoId($tabla){

		$stmt = Conexion::Conectar()->prepare("
			SELECT MAX(TAR_ID) AS id FROM $tabla
			");

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;

	}

	public static function mdlMostarTodasMisTareasAbiertas($tabla, $id){

		$idUsuario = '%"';
		$idUsuario .= $id;
		$idUsuario .= '"%';

		$stmt = Conexion::Conectar()->prepare("

			SELECT * FROM $tabla 
			JOIN usuarios ON tar_creado_por = usu_id
			WHERE tar_usuarios LIKE :id AND tar_estatus != 'Completada'
			ORDER BY tar_id DESC");

	

		$stmt -> bindParam(":id",$idUsuario, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;
	}

	public static function mdlActualizarEstatusTarea($tablaTareas, $datos){

		$stmt = Conexion::Conectar()->prepare("

			UPDATE $tablaTareas 
			SET tar_estatus = :tar_estatus
			WHERE tar_id = :tar_id");

		$stmt -> bindParam(":tar_estatus",$datos['estatusTarea'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_id",$datos['idTarea'], PDO::PARAM_STR);

		if($stmt->execute()){
            
            return true;

        }else{
            
            return false;

        }

        $stmt -> close();
        $stmt = null;
	}

	public static function mdlCrearNotaSeguimiento($tablaNotas, $datos){

		$stmt = Conexion::Conectar()->prepare("

			INSERT INTO $tablaNotas (tar_id, usu_id, tar_seg_nota, tar_cambio_estatus, tar_seg_nuevo_estatus, tar_seg_fecha)
			VALUES (:tar_id, :usu_id, :tar_seg_nota, :tar_cambio_estatus, :tar_seg_nuevo_estatus, :tar_seg_fecha)
			");

		$stmt -> bindParam(":tar_id",$datos['idTarea'], PDO::PARAM_INT);
		$stmt -> bindParam(":usu_id",$datos['idUsuario'], PDO::PARAM_INT);
		$stmt -> bindParam(":tar_seg_nota",$datos['descripcionTarea'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_cambio_estatus",$datos['cambioEstatus'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_seg_nuevo_estatus",$datos['estatusTarea'], PDO::PARAM_STR);
		$stmt -> bindParam(":tar_seg_fecha",$datos['fechaHora'], PDO::PARAM_STR);

		if($stmt->execute()){
            
            return true;

        }else{
            
            return false;

        }

        $stmt -> close();
        $stmt = null;
	}

	public static function mdlBuscarTarea($tabla, $id){

		$stmt = Conexion::Conectar()->prepare("

			SELECT * FROM $tabla 
			JOIN usuarios ON tar_creado_por = usu_id
			WHERE tar_id = :tar_id
		");

		$stmt -> bindParam(":tar_id",$id, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;
	}

	public static function mdlMostarHistorialTarea($tabla, $id){

		$stmt = Conexion::Conectar()->prepare("

			SELECT t.tar_cambio_estatus, u.usu_nombre, t.tar_seg_fecha, t.tar_seg_nota, t.tar_seg_nuevo_estatus FROM tareas_seguimiento t
			JOIN usuarios u ON t.usu_id = u.usu_id
			WHERE tar_id = :id
			ORDER BY tar_seg_id DESC

		");

		$stmt -> bindParam(":id",$id, PDO::PARAM_STR);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;
	}
	
}











