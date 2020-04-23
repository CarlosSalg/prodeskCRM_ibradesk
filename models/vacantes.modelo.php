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
            (vac_titulo, vac_descripcion, vac_zona_trabajo, vac_sueldo_ofertado, vac_link_occ, vac_estatus, vac_cli_id, vac_creado_por)
            VALUES 
            (:vac_titulo, :vac_descripcion, :vac_zona_trabajo, :vac_sueldo_ofertado, :vac_link_occ, :vac_estatus, :vac_cli_id, :vac_creado_por)
		");

        $stmt -> bindParam(":vac_titulo",$datos['tituloVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_descripcion",$datos['descripcionVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_zona_trabajo",$datos['zonaVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_sueldo_ofertado",$datos['sueldoVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_link_occ",$datos['linkVacante'], PDO::PARAM_STR);
        $stmt -> bindParam(":vac_estatus",$datos['estatusVacante'], PDO::PARAM_STR);
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

}


