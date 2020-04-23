<?php 

class ControladorVacantes{

    public static function ctrCrearVacante(){


        if(isset($_POST['tituloVacante'])){

            $tituloVacante = $_POST['tituloVacante'];
            $descripcionVacante = $_POST['descripcionVacante'];
            $zonaVacante = $_POST['zonaVacante'];
            $sueldoVacante = $_POST['sueldoVacante'];
            $clienteVacante = $_POST['clienteVacante'];
            $linkVacante = $_POST['linkVacante'];
			
			$tabla = 'vacantes';
			$datos = array(
				'tituloVacante' => $tituloVacante, 
				'descripcionVacante' => $descripcionVacante, 
				'zonaVacante' => $zonaVacante, 
				'sueldoVacante' => $sueldoVacante, 
                'clienteVacante' => $clienteVacante, 
                'estatusVacante' => "abierta", 
				'linkVacante' => $linkVacante, 
				'creadoPor' => $_SESSION['id'], 
            );

            $respuesta = ModeloVacantes::mdlCrearVacante($tabla, $datos);

            if($respuesta == "ok"){

				Alertas::Alerta('success', 'Vacante agregada correctamente', 'vacantes');

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', 'vacantes');

			}

		}
      
    }

    public static function ctrMostrarVacantesConCliente(){

		$respuesta = ModeloVacantes::mdlMostrarVacantesConCliente();
        return $respuesta;
        
    }
    
    public static function ctrCrearPostulante(){

        if(isset($_POST['nombre'])){

            $ruta = "";

            if(isset($_FILES["cv"]["tmp_name"]) && $_FILES["cv"]["tmp_name"] != null){

                $archivo = $_FILES['cv'];
                $nombre = $archivo['name'];
                $aleatorio = rand(1,1500);
                $directorio = "views/docs/vacantes/candidatos/cv/".$aleatorio;
                mkdir($directorio, 0755);
                $rutaFinal = $directorio;
                $rutaFinal .= "/";
                $rutaFinal .= $nombre;
                move_uploaded_file($_FILES['cv']['tmp_name'], $rutaFinal);
                $ruta = $rutaFinal;
                
            }

            $tabla = 'candidatos';
            $datos = array(
                'nombre' => strtolower($_POST['nombre']),
                'apellidos' => strtolower($_POST['apellidos']),
                'email' => strtolower($_POST['email']),
                'telefono' => $_POST['telefono'],
                'fechaNacimiento' => $_POST['fechaNacimiento'],
                'gradoEstudios' => $_POST['gradoEstudios'],
                'tipoGradoEstudios' => $_POST['tipoGradoEstudios'],
                'tituloGradoEstudios' => $_POST['tituloGradoEstudios'],
                'curriculum' => $ruta
            );

            $respuesta = ModeloVacantes::mdlCrearPostulante($tabla, $datos);
			
			if($respuesta != false){

				Alertas::Alerta('success', 'Tarea agregada correctamente', 'nueva-tarea');

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', 'nueva-tarea');

			}

        }

    }

}
