<div class="content-wrapper">

	<section class="content-header">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tareas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
						<li class="breadcrumb-item active">Tareas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
				
				<!-- Seccion de Widgets con Informacion -->
				<?php include "views/modules/widgets/dash-tareas.php"; ?>
				
				<!-- Seccion de Tareas -->
				<div class="row mt-3">
					<div class="col-md-12">
						<div class="card f-13">
							<div class="card-header bg-gradient-info">
								<h3 class="card-title">Tareas</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<a href="nueva-tarea" class="btn btn-sm btn-info mb-3" type="button" data-toggle="modal" data-target="#modalNuevaTarea">
									<i class="fas fa-plus"></i> Nueva Tarea
								</a>
								<table class="f-14 table table-hover tabla">
									<thead class="bg-gradient-gray-dark">
										<tr>
											<th style="width:5%" class="text-center">#</th>
											<th style="width:25%">Tarea</th>
											<th style="width:20%">Descripcion:</th>
											<th style="width:10%">Asignado:</th>
											<th style="width:10%" class="text-center">Estatus:</th>
											<th style="width:20%" class="text-center">Avance:</th>
											<th style="width:10%" class="text-center">Acciones:</th>
										</tr>
									</thead>
									<tbody id="tablaTareas">
									<?php 

										$tareas = ControladorTareas::ctrMostrarTodasMisTareasAbiertas();

										foreach ($tareas as $key => $tarea) {

											$adjunto = '<span class="text-muted">Sin adjunto</span>';
											$clase = 'bagde badge-default';

											$fechaInicio = Funciones::ConvertirFechaCortaHaciaFechaLarga($tarea["tar_creado"]);
											$arrayFecha = explode(" ", $tarea['tar_creado']);

											$arrayHora = explode(':', $arrayFecha[1]);
											$hora = '';
											$hora = $arrayHora[0];
											$hora .= ':';
											$hora .= $arrayHora[1];

											$creado = Funciones::TiempoNotificacion($arrayFecha[0], $hora);

											$fechaTermino = Funciones::ConvertirFechaCortaHaciaFechaLarga($tarea["tar_fecha_fin"]);

											if($tarea["tar_estatus"] == 'Asignada'){

												$clase = 'badge badge-warning';
			
											}
			
											if($tarea["tar_estatus"] == 'En curso'){
			
												$clase = 'badge badge-info';
			
											}
			
											if($tarea["tar_estatus"] == 'Pendiente'){
			
												$clase = 'badge badge-secondary';
			
											}

											if($tarea["tar_archivo"] != ""){

												$adjunto = '<a href="'.$tarea["tar_archivo"].'" target="_blank">'.$tarea["tar_archivo_nombre"].'</a>';

											}

											if($tarea["tar_avance"] >= 0 && $tarea["tar_avance"] <= 30){

												$claseBar = 'bg-danger';

											}

											if($tarea["tar_avance"] > 30 && $tarea["tar_avance"] < 50){

												$claseBar = 'bg-warning';

											}

											if($tarea["tar_avance"] > 50 && $tarea["tar_avance"] < 80){

												$claseBar = 'bg-lightblue';

											}

											if($tarea["tar_avance"] > 80 && $tarea["tar_avance"] <= 100){

												$claseBar = 'bg-success';

											}

											echo '

												<tr>
													<td class="text-center">
														'.$tarea["tar_id"].'
													</td>
													<td>
														<a href="index.php?route=ver-tarea&idTarea='.$tarea["tar_id"].'" class="f-14">'.$tarea["tar_nombre"].'</a><br>
														Por: '.$tarea["usu_nombre"].'<br>
														Vence: '.$fechaTermino.' '.$tarea["tar_hora_fin"].'<br>
														Adjunto: '.$adjunto.'
													</td>
													<td>
														'.$tarea["tar_descripcion"].'
													</td>
													<td>
													'.$creado.'
													</td>
													<td class="text-center">
														<span class="'.$clase.' f-12"> '.$tarea["tar_estatus"].'</span>
													</td>
													<td class="text-center">
														<div class="progress progress-xs">
														<div class="progress-bar '.$claseBar.'" style="width: '.$tarea["tar_avance"].'%"></div>
														</div>
														<small>
															'.$tarea["tar_avance"].'% Completado
														</small>
													</td>
													<td class="text-center">
														<div class="btn-group">
															<button class="btn btn-outline-info btn-sm btnAgregarSeguimiento" estatusTarea="'.$tarea["tar_estatus"].'" avanceTarea="'.$tarea["tar_avance"].'" idTarea="'.$tarea["tar_id"].'" type="button" data-toggle="modal" data-target="#modaAgregarSeguimiento">
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

									?>
									
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

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
				<div class="row">
					<div class="col-md-6">	
						<label for="estatusTarea">Estatus de la tarea</label>
						<input type="hidden" name="estatusActual" id="estatusActual">
						<div class="input-group mt-2">
							<span class="input-group-text">
								<i class="fa fa-cogs"></i>
							</span>
							<select name="estatusTarea" id="estatusTarea" class="form-control" required>
							</select>
						</div>
					</div>
					<div class="col-md-6">
						<label for="estatusTarea">Avance</label>
						<div class="input-group mt-2">
							<span class="input-group-text">
								<i class="fa fa-bars"></i>
							</span>
							<select name="avanceTarea" id="avanceTarea" class="form-control" required>
							</select>
						</div>
					</div>
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
	  		<div class="modal-header">
	    		<h5>Ver tarea</h5>
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	      		<span aria-hidden="true">&times;</span>
	    		</button>
	  		</div>
	  		<div class="modal-body f-13">
				<!--Titulo-->
				<div class="row">
					<div class="col-md-6">
						<h4 class="text-muted" id="tituloTarea"></h4> <!--tituloTarea-->		
					</div>
					<div class="col-md-6">
						<b>Estatus:</b><a id="modalEstatusTarea" class="f-14"></a> <!--modalEstatusTarea-->	
					</div>
				</div>
				<hr>
				<!--Fechas de Inicio y Cierre-->
				<div class="row">
					<div class="col-md-6">
						<p class=""><b>Fecha Inicio:</b> <a class="text-muted" id="modalFechaInicio"></a></p> <!--modalFechaInicio-->
					</div>
					<div class="col-md-6">
						<p class=""><b>Fecha Limite</b> <a class="text-muted" id="modalFechaFinal"></a></p> <!--modalFechaFinal-->
					</div>
				</div>
				<hr>
				<!--Nombre, Descripcion y Adjuntos-->
				<div class="row">
					<div class="col-md-6">
						<p class=""><b>Nombre de la tarea:</b> <a class="text-muted" id="nombreTarea"></a></p> <!--nombreTarea-->
					</div>
					<div class="col-md-6">
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
					<div class="col-md-6">
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

<!--Modal modalNuevaTarea-->
<div class="modal fade" id="modalNuevaTarea" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-xl" role="document">
    <div class="modal-content">
    	<form method="post" class="f-14" enctype="multipart/form-data">
      		<div class="modal-header">
        		<h5 class="modal-title">Nueva Tarea</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
				<div class="row mt-md-4">
					<div class="col-md-3">
						<div class="form-group">
							<label for="usuariosAsignados"><i class="fa fa-users"></i> Asignar Usuarios</label>
							<select required="" style="height: 268px;" multiple class="form-control form-control-sm" id="usuariosAsignados" name="usuariosAsignados[]">
								<?php

									$usuarios = ControladorUsuarios::ctrMostrarUsuarios();

									foreach ($usuarios as $key => $value) {

										echo "<option value='".$value['usu_id']."'>".$value['usu_nombre']."</option>";

									}

								?>
							</select>
						</div>
					</div>
					<div class="col-md-9">
						<div class="form-group">
							<label for="nombreTarea">Dele un nombre a la tarea</label>
							<input type="text" name="nombreTarea" id="nombreTarea" placeholder="Nombre de la tarea" class="form-control form-control-sm" required="">
						</div>
						<div class="row">
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fechaInicio"><i class="fa fa-calendar-day"></i> Fecha de Inicio</label>
											<input type="date" name="fechaInicio" id="fechaInicio" placeholder="Fecha de Inicio" class="form-control form-control-sm" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="horaInicio"><i class="fa fa-calendar-day"></i> Hora de Inicio</label>
											<input type="time" name="horaInicio" id="horaInicio" class="form-control form-control-sm" required="">
										</div>
									</div>
								</div>
							</div>
							<div class="col-md-6">
								<div class="row">
									<div class="col-md-6">
										<div class="form-group">
											<label for="fechaFin"><i class="fa fa-calendar-day"></i> Fecha limite termino</label>
											<input type="date" name="fechaFin" id="fechaFin" placeholder="Fecha Final" class="form-control form-control-sm" required="">
										</div>
									</div>
									<div class="col-md-6">
										<div class="form-group">
											<label for="horaFin"><i class="fa fa-calendar-day"></i> Hora limite termino</label>
											<input type="time" name="horaFin" id="horaFin" placeholder="Fecha Final" class="form-control form-control-sm" required="">
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label for="descripcionTarea"><i class="fa fa-list"></i> Descripcion de la tarea</label>
							<textarea style="resize: none;" name="descripcionTarea" id="descripcionTarea" placeholder="Descripcion de la tarea" class="form-control form-control-sm" rows="5" required=""></textarea>
						</div>
						<div class="input-group my-2">
							<label for="archivoAdjunto" class=""><i class="fa fa-file"></i> Puede adjuntar 1 archivo</label>
							<input type="file" class="form-control-file form-control-sm" name="archivoAdjunto" id="archivoAdjunto"  accept=".xlsx, .xls, .csv, .pdf, .doc, .docx, .ppt, .pptx, .rar, .zip">
							<small  class="form-text text-muted">
								Selecciona una archivo no mayor a 5 MB
							</small>
						</div>
					</div>
				</div>

		    </div>

		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-info">Guardar</button>
		    </div>

		    <?php 

			$nuevaTarea = new ControladorTareas();
			$nuevaTarea -> ctrCrearTarea();

			?>

	    </form>
    </div>
  </div>
</div>