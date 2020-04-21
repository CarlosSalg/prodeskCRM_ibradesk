<?php 


$tareasPendientes = ControladorTareas::ctrMostrarTodasMisTareasAbiertas();

if(count($tareasPendientes)>0){

  $cantidadTareas = '<span class="badge badge-warning">'.count($tareasPendientes).'</span>';

}else{

  $cantidadTareas = '0';
}

$tareasAsigadas = ControladorTareas::ctrMostrarTodasMisTareas();

if(count($tareasAsigadas)>0){

  $cantidadTareasAsignadas = '<span class="badge badge-info">'.count($tareasAsigadas).'</span>';

}else{

  $cantidadTareasAsignadas = '0';

}

$tareasCreadas = ControladorTareas::ctrMostrarMisTareasCreadas();

if(count($tareasCreadas)>0){

  $cantidadTareasCreadas = '<span class="badge badge-success">'.count($tareasCreadas).'</span>';

}else{

  $cantidadTareasCreadas = '0';

}