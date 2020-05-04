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
			$fechaFin = $_POST['fechaFin'];
			$descripcionTarea = $_POST['descripcionTarea'];
			$archivoAdjunto = $ruta;
			$estatusTarea = 'Asignada';

			$tabla = 'tareas';
			$datos = array(
				'usuarios' => $usuarios, 
				'nombreTarea' => $nombreTarea, 
				'fechaInicio' => $fechaInicio, 
				'fechaFin' => $fechaFin, 
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
				ControladorCalendario::ctrCrearEvento($usuario, $datos, 'tarea', $datos['nombreTarea'], $fechaInicio, null, $fechaFin, null, 0, "index.php?route=ver-tarea&idTarea=$id");

			}
			
			if($respuesta != false){

				Alertas::Alerta('success', "Tarea agregada con ID $id", 'nueva-tarea');

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', 'nueva-tarea');

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

			if($estatusActual != $estatusTarea){

				$cambioEstatus = "Cambio de estatus de $estatusActual a $estatusTarea";

			}else{

				$cambioEstatus = "No se cambio el estatus";

			}

			$datos = array(
				'idTarea' => (int)$idTarea,
				'idUsuario' => (int)$idUsuario,
				'estatusActual' => $estatusActual,
				'estatusTarea' => $estatusTarea,
				'cambioEstatus' => $cambioEstatus,
				'fechaHora' => $fechaHora,
				'descripcionTarea' => $descripcionTarea);

			$tablaTareas = 'tareas';
			$actualizarEstatusTarea = ModeloTareas::mdlActualizarEstatusTarea($tablaTareas, $datos);

			$tablaNotas = 'tareas_seguimiento';
			$crearNotaSeguimiento = ModeloTareas::mdlCrearNotaSeguimiento($tablaNotas, $datos);

			if($actualizarEstatusTarea == true && $crearNotaSeguimiento == true){

				Alertas::Alerta('success', 'Nota agregada correctamente', $_SERVER["REQUEST_URI"]);

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', $_SERVER["REQUEST_URI"]);

			}

		}

	}
	
}