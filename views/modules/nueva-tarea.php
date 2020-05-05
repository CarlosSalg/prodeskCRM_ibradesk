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
		<div class="row">
			<div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
				<div class="card">
					<div class="card-header">
						<h3 class="card-title">Nueva tarea</h3>
					</div>
					<div class="card-body">

						<form method="post" class="f-14" enctype="multipart/form-data">
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
									<input type="submit" class="btn btn-info btn-block" value="Crear Tarea">
								</div>
							</div>

							<?php 

							$nuevaTarea = new ControladorTareas();
							$nuevaTarea -> ctrCrearTarea();

							?>

						</form>
					</div>

				</div>
			</div>	
		</div>
	</section>
</div>