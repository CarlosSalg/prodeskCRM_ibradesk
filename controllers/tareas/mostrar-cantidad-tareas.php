<?php 

require_once "../../models/tareas.modelo.php";

$tabla = 'tareas';
$id = $_POST['id'];

$asignadas = ModeloTareas::mdlMostarAsignadas($tabla, $id);
$curso = ModeloTareas::mdlMostarEnCurso($tabla, $id);
$pendiente = ModeloTareas::mdlMostarPendientes($tabla, $id);
$comletada = ModeloTareas::mdlMostarCompletadas($tabla, $id);

$total = $asignadas[0] + $curso[0] + $pendiente[0] + $comletada[0];

$resultado = array('asignadas'=>intval($asignadas[0]), 
                    'curso'=>intval($curso[0]), 
                    'pendientes' => intval($pendiente[0]),
                    'completada'=>intval($comletada[0]), 
                    'total'=>intval($total), 

            );

echo json_encode($resultado);