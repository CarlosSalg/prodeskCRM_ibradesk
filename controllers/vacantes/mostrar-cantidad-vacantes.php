<?php 

require_once "../../models/vacantes.modelo.php";

$tabla = 'vacantes';

$abiertas = ModeloVacantes::mdlCantidadEstatusAbiertas($tabla);
$pendientes = ModeloVacantes::mdlCantidadEstatusPendientes($tabla);
$cerradas = ModeloVacantes::mdlCantidadEstatusCerrados($tabla);

$total = $abiertas[0] + $pendientes[0] + $cerradas[0];

$resultado = array('abiertas'=>intval($abiertas[0]), 
                    'pendientes'=>intval($pendientes[0]), 
                    'cerradas' => intval($cerradas[0]),
                    'total'=>intval($total), 

            );

echo json_encode($resultado);