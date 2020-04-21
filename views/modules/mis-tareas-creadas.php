<!--Mis tareas creadas-->
<div class="content-wrapper">
	<section class="content-header">
	    <div class="container-fluid">
	      	<div class="row mb-2">
	        	<div class="col-sm-6">
	          		<h1>Mis tareas creadas</h1>
	        	</div>
	        	<div class="col-sm-6">
	          		<ol class="breadcrumb float-sm-right">
	            		<li class="breadcrumb-item"><a href="home">Home</a></li>
	            		<li class="breadcrumb-item active">Mis tareas creadas</li>
	          		</ol>
	        	</div>
	      	</div>
	    </div>
	 </section>

	<section class="content">
		<div class="card">

			<div class="card-header">
		        <h3 class="card-title">Mis tareas creadas</h3>
		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		            <i class="fas fa-minus"></i></button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		            <i class="fas fa-times"></i></button>
		        </div>
		    </div>

			<div class="card-body">		
				<?php 

				$tareas = ControladorTareas::ctrMostrarMisTareasCreadas();
				$clase = 'default';

				if(count($tareas)>0){

					echo '

						<table class="table tabla table-striped table-hover f-12 my-4 table-responsive">
							<thead class="text-center">
								<tr>
									<th style="width: 5%;">Id</th>
									<th style="width: 15%;">Asignado a:</th>
									<th style="width: 15%;">Creada por:</th>
									<th style="width: 15%;">Nombre</th>
									<th style="width: 10%;">Fecha Inicio</th>
									<th style="width: 10%;">Fecha Fin</th>
									<th style="width: 25%;">Descripcion</th>
									<th style="width: 20%;">Adjuntos</th>
									<th style="width: 10%;">Estatus</th>
									<th style="width: 10%;" class="text-center">Aciones</th>
									
								</tr>
							</thead>

							<tbody class="text-center">

					';


					foreach ($tareas as $key => $tarea) {

						if($tarea["tar_estatus"] == 'Asignada'){

							$clase = 'badge badge-warning';

						}

						if($tarea["tar_estatus"] == 'En curso'){

							$clase = 'badge badge-info';

						}

						if($tarea["tar_estatus"] == 'Pendiente'){

							$clase = 'badge badge-secondary';

						}

						if($tarea["tar_estatus"] == 'Completada'){

							$clase = 'badge badge-success';

						}


						echo '
							<tr>
								<td>'.$tarea["tar_id"].'</td>';

						echo '<td>';

						$usuarios = json_decode($tarea["tar_usuarios"]);

						foreach ($usuarios as $key => $usuario) {

							$usuarioFinal = ControladorUsuarios::ctrBuscarUsuario($usuario);
							if($usuarioFinal['usu_nombre'] == null){
								echo "-Usuario Eliminado id: $usuario<br>";
							}else{
								echo "-".$usuarioFinal['usu_nombre']."<br>";
							}
							

						}
						echo '</td>';
						echo '
								<td>'.$tarea["usu_nombre"].'</td>
								<td>'.$tarea["tar_nombre"].'</td>
								<td>'.$tarea["tar_fecha_inicio"].'</td>
								<td>'.$tarea["tar_fecha_fin"].'</td>
								<td>'.$tarea["tar_descripcion"].'</td>
						';

						if($tarea["tar_archivo"]!= ""){

							echo '<td><a href="'.$tarea["tar_archivo"].'" target="_blank" >'.$tarea["tar_archivo_nombre"].'</td>';

						}else{

							echo '<td class="text-muted">Sin Adjuntos</td>';

						}

						echo	'

								<td class="f-14"><span class="'.$clase.'">'.$tarea["tar_estatus"].'</span></td>
								<td>

									<div class="btn-group">

										<button class="btn btn-primary btn-sm btnAgregarSeguimiento" estatusTarea="'.$tarea["tar_estatus"].'" idTarea="'.$tarea["tar_id"].'" type="button" data-toggle="modal" data-target="#modaAgregarSeguimiento">
											<i class="fa fa-plus"></i>
										</button>
										<button class="btn btn-info btn-sm btnObservarHistorial" idTarea="'.$tarea["tar_id"].'" type="button" data-toggle="modal" data-target="#modalVerHistorial">
											<i class="fa fa-eye"></i>
										</button>

									</div>

								</td>
							</tr>
						';
					}
				}else{

					echo '
						<div class="container-fluid py-2 px-5 mt-4">
							<div class="jumbotron">
								
								<div class="row">	
									<div class="col-md-6">
										<p class="lead">Relajate no hay tareas pendientes</p>
									</div>
								</div>
								<hr>
								<p>Puedes crear una nueva tarea haciendo <a href="nueva-tarea">click aqui</a></p>
							</div>
						</div>
					';
				}
				?>		

					</tbody>
				</table>
			</div>
		</div>
	</section>
</div>

<!--Modal modaAgregarSeguimiento-->
<div class="modal fade" id="modaAgregarSeguimiento" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
    	<form method="post" enctype="multipart/form-data">

      		<div class="modal-header">

        		<h5 class="modal-title">Agregar Nota de Seguimiento</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>

      		</div>

      		<div class="modal-body">

				<label for="idTarea"># de Tarea</label>
	        	<div class="input-group">	        		
			         <span class="input-group-text">
			         	#
			         </span>
			        <input type="text" class="form-control" name="idTarea" id="idTarea" required readonly="">
		      	</div>
				<br>
				<label for="estatusTarea">Estatus de la tarea</label>
				<input type="hidden" name="estatusActual" id="estatusActual">
		      	<div class="input-group mt-2">
			        <span class="input-group-text">
			         	<i class="fa fa-cogs"></i>
			        </span>
			        <select name="estatusTarea" id="estatusTarea" class="form-control" required>
			        </select>
		      	</div>
		      	<br>
		      	<label for="idTarea">Descripcion</label>
	        	<div class="input-group">	        		
			         <span class="input-group-text">
			         	<i class="fa fa-tasks"></i>
			         </span>
			        <textarea style="resize: none;" rows="5" class="form-control form-control-sm" placeholder="Descripcion" name="descripcionTarea" id="descripcionTarea" required></textarea>
		      	</div>

		    </div>
		    <div class="modal-footer">

		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>

		    </div>

		    <?php  

		    $crearNota = new ControladorTareas();
		    $crearNota -> ctrCrearNota();

		    ?>

	    </form>
    </div>
  </div>
</div>

<!--Modal modalVerHistorial-->
<div class="modal fade" id="modalVerHistorial" tabindex="-1" role="document" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
			
			<!--Titulo Modal-->
	  		<div class="modal-header">
	    		<h5>Ver tarea</h5>
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	      		<span aria-hidden="true">&times;</span>
	    		</button>
	  		</div>
			
			<!--Cuerpo Modal-->
	  		<div class="modal-body f-13">

				<!--Titulo-->
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-muted" id="tituloTarea"></h4> <!--tituloTarea-->		
					</div>
					<div class="col-md-6 text-right">
						<b>Estatus:</b><a id="modalEstatusTarea" class="f-14"></a> <!--modalEstatusTarea-->	
					</div>
				</div>
				<hr>

				<!--Fechas de Inicio y Cierre-->
				<div class="row">
					<div class="col-md-6">
						<p class=""><b>Fecha Inicio:</b> <a class="text-muted" id="modalFechaInicio"></a></p> <!--modalFechaInicio-->
					</div>
					<div class="col-md-6 text-right">
						<p class=""><b>Fecha Limite</b> <a class="text-muted" id="modalFechaFinal"></a></p> <!--modalFechaFinal-->
					</div>
				</div>
				<hr>

				<!--Nombre, Descripcion y Adjuntos-->
				<div class="row">
					<div class="col-md-6">
						<p class=""><b>Nombre de la tarea:</b> <a class="text-muted" id="nombreTarea"></a></p> <!--nombreTarea-->
					</div>
					<div class="col-md-6 text-right">
						<p class=""><b>Adjuntos:</b> <a class="text-muted" id="modalArchivoAdjunto"></a></p> <!--modalArchivoAdjunto-->
					</div>

				</div>
				<div class="row">
					<div class="col-md-12">
						<b>Descripcion</b>
						<br>
						<a class="text-muted" id="modalDescripcionTarea"></a> <!--modalDescripcionTarea-->
					</div>

				</div>
				<hr>

				<!--Usuarios, Creador y Asignados-->
				<div class="row">
					<div class="col-md-6">
						<p class=""><b>Asignado a:</b> <a class="text-muted" id="modalUsuarioAsignado"></a></p> <!--modalUsuarioAsignado-->
					</div>
					<div class="col-md-6 text-right">
						<p class=""><b>Creado por:</b> <a class="text-muted" id="modalCreadoPor"></a></p> <!--modalCreadoPor-->
					</div>
				</div>
				<hr>

				<!--Historial Notas Seguimiento-->
				<h5><i class="fa fa-list"></i> Historial</h5>
				<div id="modalHistorial"></div>

	  		</div>
			
			<!--Pie de Modal-->
	  		<div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
		    </div>

	    </div>
	</div>
</div>