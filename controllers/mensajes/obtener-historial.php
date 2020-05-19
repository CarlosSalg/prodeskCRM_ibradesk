<?php 

require_once "../../models/mensajes.modelo.php";

$tabla = 'mensajes';

$datos = array(

    'idEmisor' => $_POST['idEmisor'],
    'idReceptor' => $_POST['idReceptor'],

);

$respuesta = ModeloMensajes::mdlObtenerHistorial($tabla, $datos);

echo json_encode($respuesta);