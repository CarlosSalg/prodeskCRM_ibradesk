<?php 

class ControladorClientes{

	public static function ctrCrearCliente(){

		if(isset($_POST['razonSocial'])){

			$razonSocial = $_POST['razonSocial'];
			$nombreComercial = $_POST['nombreComercial'];
			$statusCliente = $_POST['statusCliente'];
			$contactoComprasNombre = $_POST['contactoComprasNombre'];
			$contactoComprasApellidos = $_POST['contactoComprasApellidos'];
			$contactoComprasCorreo = $_POST['contactoComprasCorreo'];
			$contactoComprasTelefono = $_POST['contactoComprasTelefono'];

			$tabla = 'clientes';
			$datos = array(
				'razonSocial' => $razonSocial, 
				'nombreComercial' => $nombreComercial, 
				'statusCliente' => $statusCliente, 
				'contactoComprasNombre' => $contactoComprasNombre, 
				'contactoComprasApellidos' => $contactoComprasApellidos, 
				'contactoComprasCorreo' => $contactoComprasCorreo, 
				'contactoComprasTelefono' => $contactoComprasTelefono
			);

			$respuesta = ModeloClientes::mdlCrearCliente($tabla, $datos);

			if($respuesta){

				Alertas::Alerta('success', 'Cliente registrado correctamente', 'clientes');

			}else{
				
				Alertas::Alerta('error', 'Contacta al Administrador', 'clientes');

			}

		}

	}

	public static function ctrMostrarClientes(){

		$tabla = 'clientes';
		$respuesta = ModeloClientes::mdlMostrarClientes($tabla);

		return $respuesta;

	}

}