<?php

include "../../models/vacantes.modelo.php";

$tipo = $_POST['tipo'];

if($tipo == 'abiertas'){

    $respuesta = ModeloVacantes::mdlMostrarVacantesConClienteAbiertas();

}

if($tipo == 'pendientes'){

    $respuesta = ModeloVacantes::mdlMostrarVacantesConClientePendientes();

}

if($tipo == 'cerradas'){

    $respuesta = ModeloVacantes::mdlMostrarVacantesConClienteCerradas();

}

if($tipo == 'todas'){

    $respuesta = ModeloVacantes::mdlMostrarVacantesConClienteTodas();

}

echo json_encode($respuesta);