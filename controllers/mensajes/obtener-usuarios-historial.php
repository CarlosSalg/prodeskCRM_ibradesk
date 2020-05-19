<?php 

require_once "../../models/mensajes.modelo.php";

$tabla = 'mensajes';

$datos = array(

    'idEmisor' => $_POST['idEmisor'],

);

$respuesta = ModeloMensajes::mdlObtenerUsuariosHistorial($tabla, $datos);

echo json_encode($respuesta);