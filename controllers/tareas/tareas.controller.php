<?php  

class ControladorTareas{

	public static function ctrCrearTarea(){

		if(isset($_POST['nombreTarea'])){

			$ruta = '';
			$nombre = '';

			if(isset($_FILES["archivoAdjunto"]["tmp_name"]) && $_FILES["archivoAdjunto"]["tmp_name"] != null){

                $archivo = $_FILES['archivoAdjunto'];
                $nombre = $archivo['name'];
                $aleatorio = rand(1,1500);
                $directorio = "views/docs/tareas/".$aleatorio;
                mkdir($directorio, 0755);
                $rutaFinal = $directorio;
                $rutaFinal .= "/";
                $rutaFinal .= $nombre;
                move_uploaded_file($_FILES['archivoAdjunto']['tmp_name'], $rutaFinal);
                $ruta = $rutaFinal;
                
            }

			$usuarios = json_encode($_POST['usuariosAsignados']);
			$nombreTarea = $_POST['nombreTarea'];
			$fechaInicio = $_POST['fechaInicio'];
			$horaInicio = $_POST['horaInicio'];
			$fechaFin = $_POST['fechaFin'];
			$horaFin = $_POST['horaFin'];
			$descripcionTarea = $_POST['descripcionTarea'];
			$archivoAdjunto = $ruta;
			$estatusTarea = 'Asignada';

			$tabla = 'tareas';
			$datos = array(
				'usuarios' => $usuarios, 
				'nombreTarea' => $nombreTarea, 
				'fechaInicio' => $fechaInicio, 
				'horaInicio' => $horaInicio, 
				'fechaFin' => $fechaFin, 
				'horaFin' => $horaFin, 
				'descripcionTarea' => $descripcionTarea, 
				'archivoAdjunto' => $archivoAdjunto, 
				'archivoNombre' => $nombre, 
				'creadoPor' => $_SESSION['id'], 
				'estatusTarea' => $estatusTarea
			);

			$respuesta = ModeloTareas::mdlCrearTarea($tabla, $datos);
			$ultimoId = ModeloTareas::mdlObtenerUltimoId($tabla);
			$id = $ultimoId["id"];

			foreach($_POST['usuariosAsignados'] as $key => $usuario){

				Notificaciones::ctrCrearNotificacion($usuario, 'tarea', "Tarea Asignada $id", $datos);
				ControladorCalendario::ctrCrearEvento($usuario, $datos, 'tarea', $nombreTarea, $fechaInicio, $horaInicio, $fechaFin, $horaFin, 0, "index.php?route=ver-tarea&idTarea=$id");

			}
			
			if($respuesta != false){

				Alertas::Alerta('success', "Tarea agregada con ID $id", 'mis-tareas');

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', 'mis-tareas');

			}

		}
	}

	public static function ctrMostrarTareasLimit3(){

		$tabla = 'tareas';
		$respuesta = ModeloTareas::mdlMostarTareasLimit3($tabla);
		return $respuesta;
	}

	public static function ctrBuscarTarea($id){

		$tabla = 'tareas';
		$respuesta = ModeloTareas::mdlBuscarTarea($tabla, $id);
		return $respuesta;
	}

	public static function ctrMostrarTodasMisTareas(){

		$tabla = 'tareas';
		$id = $_SESSION['id'];
		$respuesta = ModeloTareas::mdlMostarTodasMisTareas($tabla, $id);
		return $respuesta;
	}

	public static function ctrMostrarMisTareasCreadas(){

		$tabla = 'tareas';
		$id = $_SESSION['id'];
		$respuesta = ModeloTareas::mdlMostarTodasMisTareasCreadas($tabla, $id);
		return $respuesta;
	}

	public static function ctrMostrarTodasMisTareasAbiertas(){

		$tabla = 'tareas';
		$id = $_SESSION['id'];
		$respuesta = ModeloTareas::mdlMostarTodasMisTareasAbiertas($tabla, $id);
		return $respuesta;
	}

	public static function ctrCrearNota(){

		if(isset($_POST['idTarea'])){

			date_default_timezone_set("America/Mexico_City");
			$fecha = date("d/m/Y");
			$hora = date("h:i:sa");

			$fechaHora = $fecha .' '.$hora;
			$idTarea = $_POST['idTarea'];
			$idUsuario = $_SESSION['id'];
			$estatusActual = $_POST['estatusActual'];
			$estatusTarea = $_POST['estatusTarea'];
			$descripcionTarea = $_POST['descripcionTarea'];
			$avanceTarea = $_POST['avanceTarea'];

			if($estatusActual != $estatusTarea){

				$cambioEstatus = "Cambio de estatus de $estatusActual a $estatusTarea avance del $avanceTarea%";

			}else{

				$cambioEstatus = "No se cambio el estatus avance del $avanceTarea%";

			}

			$datos = array(
				'idTarea' => (int)$idTarea,
				'idUsuario' => (int)$idUsuario,
				'estatusActual' => $estatusActual,
				'estatusTarea' => $estatusTarea,
				'cambioEstatus' => $cambioEstatus,
				'avanceTarea' => $avanceTarea,
				'fechaHora' => $fechaHora,
				'descripcionTarea' => $descripcionTarea);

			// Actualizar Estatus
			$tablaTareas = 'tareas';
			$actualizarEstatusTarea = ModeloTareas::mdlActualizarEstatusTarea($tablaTareas, $datos);

			$tablaNotas = 'tareas_seguimiento';
			$crearNotaSeguimiento = ModeloTareas::mdlCrearNotaSeguimiento($tablaNotas, $datos);

			// Actualizar Avance
			$actualizarAvance = ModeloTareas::mdlActualizarAvanceTarea($tablaTareas, $datos);


			if($actualizarEstatusTarea == true && $crearNotaSeguimiento == true){

				Alertas::Alerta('success', 'Nota agregada correctamente', $_SERVER["REQUEST_URI"]);

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', $_SERVER["REQUEST_URI"]);

			}

		}

	}
	
}