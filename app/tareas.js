$(document).ready(function(){

	// Agregar datos a formulario de Seguimiento
	$('.btnAgregarSeguimiento').on('click', function(){

		let id = $(this).attr('idTarea');
		let estatusTarea = $(this).attr('estatusTarea');
		let avanceTarea = $(this).attr('avanceTarea');
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

		let avanceTareaSelect = `<option value="${avanceTarea}">${avanceTarea}</option>`;

		 avanceTareaSelect += `

			<option value="10">10</option>
			<option value="20">20</option>
			<option value="30">30</option>
			<option value="40">40</option>
			<option value="50">50</option>
			<option value="60">60</option>
			<option value="70">70</option>
			<option value="80">80</option>
			<option value="90">90</option>
			<option value="100">100</option>

		`;



		$('#idTarea').val(id);
		$('#estatusActual').val(estatusTarea);
		$('#avanceTarea').html(avanceTareaSelect);
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

	// Llenar dashboard tareas
	const actualizarDashboard = function(){

		// Obtener cantidad de Tareas en base de datos
		let id = $('#idUsuario').val();
		$.post('controllers/tareas/mostrar-cantidad-tareas.php',{id}, function(responseTareasCantidad){

			let dashTareas = JSON.parse(responseTareasCantidad);

			$('#tareasAsignadasSpan').html(dashTareas.asignadas);
			$('#tareasCursoSpan').html(dashTareas.curso);
			$('#tareasPendientesSpan').html(dashTareas.pendientes);
			$('#tareasCompletadasSpan').html(dashTareas.completada);
			$('#tareasTotalSpan').html(dashTareas.total);
			
			let total = dashTareas.asignadas + dashTareas.curso + dashTareas.pendientes;

			// Donut Chart
			var donutChartCanvas = $('#donutChartTareas').get(0).getContext('2d')
			var donutData        = {
			labels: [
				dashTareas.asignadas + ' Asignado', 
				dashTareas.curso + ' En curso',
				dashTareas.pendientes + ' Pendiente', 
			],
			datasets: [
				{
				data: [dashTareas.asignadas,dashTareas.curso,dashTareas.pendientes],
				backgroundColor : ['#f39c12', '#17a2b8', '#6c757d'],
				}
			]
			}

			var donutOptions     = {
				maintainAspectRatio : false,
				responsive : true,
				}
			// Create pie or douhnut chart
			// You can switch between pie and douhnut using the method below.
			var donutChart = new Chart(donutChartCanvas, {
				type: 'pie',
				data: donutData,
				options: donutOptions      
			})

			// Donut Chart Total
			var donutChartCanvasTotal = $('#donutChartTareasTotal').get(0).getContext('2d')
			var donutDataTotal        = {
			labels: [
				dashTareas.completada + ' Completadas', 
				total + ' Abiertas', 
			],
			datasets: [
				{
				data: [dashTareas.completada, total],
				backgroundColor : ['#28a745', '#17a2b8'],
				}
			]
			}
			
			var donutOptions     = {
				maintainAspectRatio : false,
				responsive : true,
				}
			// Create pie or douhnut chart
			// You can switch between pie and douhnut using the method below.
			var donutChart = new Chart(donutChartCanvasTotal, {
				type: 'doughnut',
				data: donutDataTotal,
				options: donutOptions      
			})

		});


	}

	actualizarDashboard();

	$('.actualizarDashboardTareas').on('click', function(event){
		
		event.preventDefault();
		actualizarDashboard();

	})

})