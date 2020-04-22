<?php 

class ControladorVacantes{

    public static function ctrMostrarVacantesConCliente(){

		$respuesta = ModeloVacantes::mdlMostrarVacantesConCliente();
        return $respuesta;
        
	}

}
