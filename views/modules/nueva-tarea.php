<!--Tareas-->
<div class="content-wrapper">

	<section class="content-header">
	    <div class="container-fluid">
	      <div class="row mb-2">
	        <div class="col-sm-6">
	          <h1>Nueva tarea</h1>
	        </div>
	        <div class="col-sm-6">
	          <ol class="breadcrumb float-sm-right">
	            <li class="breadcrumb-item"><a href="home">Home</a></li>
	            <li class="breadcrumb-item active">Nueva tarea</li>
	          </ol>
	        </div>
	      </div>
	    </div>
	 </section>

	<section class="content">
	    <div class="card">
		    <div class="card-header">
		        <h3 class="card-title">Nueva tarea</h3>
		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		            <i class="fas fa-minus"></i></button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		            <i class="fas fa-times"></i></button>
		        </div>
		    </div>
		 	<div class="card-body">

				<form method="post" class="f-14" enctype="multipart/form-data">
					<div class="row mt-md-4">
						<div class="col-md-4">
							<div class="form-group">
							    <label for="usuariosAsignados"><i class="fa fa-users"></i> Seleccione usuarios para asignar tarea</label>
							    <select required="" style="height: 280px;" multiple class="form-control form-control-sm" id="usuariosAsignados" name="usuariosAsignados[]">
						      		<?php

										$usuarios = ControladorUsuarios::ctrMostrarUsuarios();

										foreach ($usuarios as $key => $value) {

											echo "<option value='".$value['usu_id']."'>".$value['usu_nombre']."</option>";

										}

									?>
							    </select>
							</div>
						</div>
						<div class="col-md-8">
							<div class="form-group">
								<label for="nombreTarea">Dele un nombre a la tarea</label>
								<input type="text" name="nombreTarea" id="nombreTarea" placeholder="Nombre de la tarea" class="form-control form-control-sm" required="">
							</div>
							<div class="row">
								<div class="col-md-6">
									<div class="form-group">
										<label for="fechaInicio"><i class="fa fa-calendar-day"></i> Seleccione una fecha de Inicio</label>
										<input type="date" name="fechaInicio" id="fechaInicio" placeholder="Fecha de Inicio" class="form-control form-control-sm" required="">
									</div>
								</div>
								<div class="col-md-6">
									<div class="form-group">
										<label for="fechaFin"><i class="fa fa-calendar-day"></i> Seleccione una fecha limite de termino</label>
										<input type="date" name="fechaFin" id="fechaFin" placeholder="Fecha Final" class="form-control form-control-sm" required="">
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
							<input type="submit" class="btn btn-primary btn-block" value="Enviar Tarea">
						</div>
					</div>

					<?php 

					$nuevaTarea = new ControladorTareas();
					$nuevaTarea -> ctrCrearTarea();

					?>

				</form>
			</div>

		</div>

	</section>

	<section class="content">
		<div class="card">
			<div class="card-header">
		        <h3 class="card-title">Ultimas tareas</h3>
		        <div class="card-tools">
		          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
		            <i class="fas fa-minus"></i></button>
		          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
		            <i class="fas fa-times"></i></button>
		        </div>
		    </div>
			<div class="card-body">
				<!--Tabla Ultimas Tareas-->
				<div class="">
					<h5>Ultimas tareas registradas</h5>
					<table class="table table-bordered table-striped table-hover f-12 table-responsive">
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
								
							</tr>
						</thead>

						<tbody class="text-center">
							<?php 

								$tareas = ControladorTareas::ctrMostrarTareasLimit3();

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
										echo "-".$usuarioFinal['usu_nombre']."<br>";

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
											
										</tr>
									';
								}
						
							?>		
						</tbody>
					</table>
				</div>
			</div>
		</div>
		
	</section>

</div>