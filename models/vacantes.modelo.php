<?php 

require_once "conexion.php";

class ModeloVacantes{

    public static function mdlBuscarVacante($tabla, $id){

		$stmt = Conexion::Conectar()->prepare("
                
                SELECT * FROM vacantes 
                WHERE vac_id = :vac_id
            
            ");

        $stmt -> bindParam(":vac_id",$id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;

    }

    public static function mdlMostrarVacantesConCliente(){

		$stmt = Conexion::Conectar()->prepare("
                
                SELECT * FROM vacantes 
                JOIN clientes 
                ON vacantes.vac_cli_id = clientes.cli_id
                ORDER BY vacantes.vac_id DESC
            
            ");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;

    }

    public static function mdlCrearVacante($tabla, $datos){

		$stmt = Conexion::Conectar()->prepare("
            INSERT INTO $tabla 
            (vac_titulo, vac_descripcion, vac_zona_trabajo, vac_sueldo_ofertado, vac_link_occ, vac_estatus, vac_token_link, vac_cli_id, vac_creado_por)
            VALUES 
            (:vac_titulo, :vac_descripcion, :vac_zona_trabajo, :vac_sueldo_ofertado, :vac_link_occ, :vac_estatus, :vac_token_link, :vac_cli_id, :vac_creado_por)
		");

        $stmt -> bindParam(":vac_titulo",$datos['tituloVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_descripcion",$datos['descripcionVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_zona_trabajo",$datos['zonaVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_sueldo_ofertado",$datos['sueldoVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_link_occ",$datos['linkVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_estatus",$datos['estatusVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_token_link",$datos['tokenLink'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_cli_id",$datos['clienteVacante'], PDO::PARAM_INT);
        $stmt -> bindParam(":vac_creado_por",$datos['creadoPor'], PDO::PARAM_INT);

		if($stmt->execute()){
            
            return "ok";

        }else{
            
            return "error";

        }

        $stmt -> close();
        $stmt =null;

    }
    
    public static function mdlCrearCandidato($tabla, $datos){

		$stmt = Conexion::Conectar()->prepare("
            INSERT INTO $tabla 
            (can_nombre, can_apellidos, can_email, can_telefono, can_fecha_nacimiento, can_grado_estudios, can_tipo_grado_estudios, can_titulo_grado_estudios, can_espectativa_economica, can_cv, can_vac_id)
            VALUES 
            (:can_nombre, :can_apellidos, :can_email, :can_telefono, :can_fecha_nacimiento, :can_grado_estudios, :can_tipo_grado_estudios, :can_titulo_grado_estudios, :can_espectativa_economica, :can_cv, :can_vac_id)
		");

        $stmt -> bindParam(":can_nombre",$datos['nombre'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_apellidos",$datos['apellidos'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_email",$datos['email'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_telefono",$datos['telefono'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_fecha_nacimiento",$datos['fechaNacimiento'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_grado_estudios",$datos['gradoEstudios'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_tipo_grado_estudios",$datos['tipoGradoEstudios'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_titulo_grado_estudios",$datos['tituloGradoEstudios'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_espectativa_economica",$datos['espectativaEconomica'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_cv",$datos['curriculum'], PDO::PARAM_STR);
        $stmt -> bindParam(":can_vac_id",$datos['vacanteAplicada'], PDO::PARAM_INT);
        

		if($stmt->execute()){
            
            return "ok";

        }else{
            
            return "error";

        }

        $stmt -> close();
        $stmt =null;

    }
    
    public static function mdlObtenerUltimoIdCandidato($tabla){

		$stmt = Conexion::Conectar()->prepare("
			SELECT MAX(can_id) AS id FROM $tabla
			");

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;
    }
    
    public static function mdlMostarPostulados($tabla, $id){

        $stmt = Conexion::Conectar()->prepare("
                
                SELECT * FROM candidatos 
                WHERE can_vac_id = :id
                ORDER BY can_id DESC
            
            ");

        $stmt -> bindParam(":id",$id, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;

    }

    public static function mdlBuscarVacanteConCliente($dato){

		$stmt = Conexion::Conectar()->prepare("
                
                SELECT * FROM vacantes 
                JOIN clientes 
                ON vacantes.vac_cli_id = clientes.cli_id
                WHERE vacantes.vac_id = :id
            
            ");
        
        $stmt -> bindParam(":id",$dato, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;

    }

    public static function mdlBuscarCandidato($dato, $tabla){

		$stmt = Conexion::Conectar()->prepare("
                
                SELECT * FROM $tabla 
                WHERE can_id = :id
            
            ");
        
        $stmt -> bindParam(":id",$dato, PDO::PARAM_INT);

		$stmt -> execute();
		return $stmt -> fetch();

		$stmt -> close();
        $stmt =null;

    }

}


