<?php 

require_once "../../models/tareas.modelo.php";

$tabla = 'tareas_seguimiento';
$id = $_POST['id'];
$cadena = '';

$responseHistorial = ModeloTareas::mdlMostarHistorialTarea($tabla, $id);

if(count($responseHistorial)>0){

	foreach ($responseHistorial as $key => $value) {

		if($value["tar_seg_nuevo_estatus"] == 'Asignada'){

			$clase = 'warning';

		}

		if($value["tar_seg_nuevo_estatus"] == 'En curso'){

			$clase = 'info';

		}

		if($value["tar_seg_nuevo_estatus"] == 'Pendiente'){

			$clase = 'secondary';

		}

		if($value["tar_seg_nuevo_estatus"] == 'Completada'){

			$clase = 'success';

		}

		$cadena .= '

			<div class="card border-'.$clase.' my-4">

				<div class="card-header">
					<div class="row">
						<div class="col-md-6">
							<b>Enviada por:</b> <a class="text-muted">'.$value["usu_nombre"].'</a>
						</div>
						<div class="col-md-6">
							<b>Fecha/Hora:</b> <a class="text-muted">'.$value["tar_seg_fecha"].'</a>
						</div>
					</div>
				</div>


				<div class="card-body">
					<a class="">'.$value["tar_seg_nota"].'</a>
					<hr>
					<div class="row">
						<div class="col-md-12 text-muted">
							'.$value["tar_cambio_estatus"].'
						</div>
					</div>
				</div>

			</div>

		';
	}

}else{

	$cadena = '<p class="text-muted">No existen registros de seguimiento</p>';

}

echo $cadena;
