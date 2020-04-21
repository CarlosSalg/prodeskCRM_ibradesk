<?php 

require_once "../../models/clientes.modelo.php";

$id = $_POST['idCliente'];
$tabla = 'clientes';

$respuesta = ModeloClientes::mdlEliminarCliente($tabla, $id);

if($respuesta){

	echo "Eliminado";

}else{

	echo "Error";
	
}
