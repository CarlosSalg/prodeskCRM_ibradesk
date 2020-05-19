<?php 

require_once "../../models/mensajes.modelo.php";

$tabla = 'mensajes';
$datos = array(

    'idEmisor' => $_POST['idEmisor'],
    'idReceptor' => $_POST['idReceptor'],
    'mensaje' => $_POST['mensaje'],
    'fecha' => $_POST['fecha'],
    'hora' => $_POST['hora'],

);

$respuesta = ModeloMensajes::mdlCrearMensaje($tabla, $datos);

echo $respuesta;