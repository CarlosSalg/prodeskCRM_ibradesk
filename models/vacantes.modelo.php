<?php 

require_once "conexion.php";

class ModeloVacantes{

    public static function mdlMostrarVacantesConCliente(){

		$stmt = Conexion::Conectar()->prepare("
                
                SELECT * FROM vacantes 
                JOIN clientes 
                ON vacantes.vac_cli_id = clientes.cli_id
            
            ");

		$stmt -> execute();
		return $stmt -> fetchAll();

		$stmt -> close();
        $stmt =null;

    }

}


