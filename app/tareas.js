$(document).ready(function(){

	// Agregar datos a formulario de Seguimiento
	$('.btnAgregarSeguimiento').on('click', function(){

		let id = $(this).attr('idTarea');
		let estatusTarea = $(this).attr('estatusTarea');
		let template = '';

		if(estatusTarea == 'Asignada'){

			template = `
				
				<option value="Asignada">Asignada</option>
	        	<option value="En curso">En curso</option>
	        	<option value="Pendiente">Pendiente</option>
	        	<option value="Completada">Completada</option>

			`;
		}

		if(estatusTarea == 'En curso'){

			template = `
				
	        	<option value="En curso">En curso</option>
	        	<option value="Asignada">Asignada</option>
	        	<option value="Pendiente">Pendiente</option>
	        	<option value="Completada">Completada</option>

			`;
		}

		if(estatusTarea == 'Pendiente'){

			template = `
				
				<option value="Pendiente">Pendiente</option>
	        	<option value="En curso">En curso</option>
	        	<option value="Asignada">Asignada</option>
	        	<option value="Completada">Completada</option>

			`;
		}

		if(estatusTarea == 'Completada'){

			template = `
				
				<option value="Completada">Completada</option>
				<option value="Asignada">Asignada</option>
	        	<option value="En curso">En curso</option>
	        	<option value="Pendiente">Pendiente</option>

			`;
		}

		$('#idTarea').val(id);
		$('#estatusActual').val(estatusTarea);
		$('#estatusTarea').html(template);
	});

	// Llenar informacion de la tarea vista
	$('.btnObservarHistorial').on('click', function(){

		let id = $(this).attr('idTarea');
		let templateStatus = '';
		let templateArchivoAdjunto = '';
		let templateHistorial = '';
		
		//Traer la informacion de la tarea
		$.post('controllers/tareas/mostrar-tarea.php',{id}, function(responseTarea){

			// Convertir responseTarea a formato JSON
			let tarea = JSON.parse(responseTarea);

			// Llenar el template Status de acuerdo a respuesta
			if(tarea["tar_estatus"] == 'Asignada'){
				templateStatus = `<span class="badge badge-warning">Asignada</span>`;
			}
			if(tarea["tar_estatus"] == 'En curso'){
				templateStatus = `<span class="badge badge-info">En curso</span>`;
			}
			if(tarea["tar_estatus"] == 'Pendiente'){
				templateStatus = `<span class="badge badge-secondary">Pendiente</span>`;
			}

			// Llenar el template Archivo Adjunto
			if(tarea["tar_archivo"] == ''){
				templateArchivoAdjunto = `Sin Adjuntos`;
			}else{
				templateArchivoAdjunto = `<a href="${tarea.tar_archivo}" download>${tarea.tar_archivo_nombre}</a>`;
			}

			// Pintar datos de Tarea
			$('#tituloTarea').html('Tarea #' + id);
			$('#modalEstatusTarea').html(templateStatus);
			$('#modalFechaInicio').html(tarea.tar_fecha_inicio);
			$('#modalFechaFinal').html(tarea.tar_fecha_fin);
			$('#nombreTarea').html(tarea.tar_nombre);
			$('#modalArchivoAdjunto').html(templateArchivoAdjunto);
			$('#modalDescripcionTarea').html(tarea.tar_descripcion);

			//Traer la informacion del Autor
			let idAutor = tarea.tar_creado_por;
			$.post('controllers/tareas/mostrar-tarea-usuario.php',{idAutor}, function(responseUsuario){
				// Pintar nombre del Usuario
				$('#modalCreadoPor').html(responseUsuario);
			});

			//Traer la informacion de Usuarios Asignados
			let idUsuariosAsginados = tarea.tar_usuarios
			$.post('controllers/tareas/mostrar-tarea-usuarios-asignados.php',{idUsuariosAsginados}, function(responseUsuariosAsignados){
				
				// Pintar nombre del Usuario
				$('#modalUsuarioAsignado').html(responseUsuariosAsignados);

			});

			//Traer las entradas de la tarea
			$.post('controllers/tareas/mostrar-tarea-historial.php',{id}, function(responseHistorial){
				
				// Pintar el Historial
				$('#modalHistorial').html(responseHistorial);

			});


		});

	});

})