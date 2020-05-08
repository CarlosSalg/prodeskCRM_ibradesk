<?php 

class ControladorVacantes{

    public static function ctrCrearVacante(){


        if(isset($_POST['tituloVacante'])){

            $tokenLink = rand(11111111, 99999999);
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
                'tokenLink' => $tokenLink, 
				'creadoPor' => $_SESSION['id'], 
            );

            $respuesta = ModeloVacantes::mdlCrearVacante($tabla, $datos);

            if($respuesta == "ok"){

				Alertas::Alerta('success', 'Vacante agregada correctamente', 'ver-vacantes');

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', 'ver-vacantes');

			}

		}
      
    }

    public static function ctrMostrarVacantesConCliente(){

        
		$respuesta = ModeloVacantes::mdlMostrarVacantesConCliente();
        return $respuesta;
        
    }

    public static function ctrBuscarVacanteConCliente($id){

        $dato = $id;
		$respuesta = ModeloVacantes::mdlBuscarVacanteConCliente($dato);
        return $respuesta;
        
    }

    public static function ctrBuscarCandidato($id){

        $dato = $id;
        $tabla = 'candidatos';
		$respuesta = ModeloVacantes::mdlBuscarCandidato($dato, $tabla);
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
                'vacanteAplicada' => $_POST['idVacante'],
                'nombre' => strtolower($_POST['nombre']),
                'apellidos' => strtolower($_POST['apellidos']),
                'email' => strtolower($_POST['email']),
                'telefono' => $_POST['telefono'],
                'fechaNacimiento' => $_POST['fechaNacimiento'],
                'gradoEstudios' => $_POST['gradoEstudios'],
                'tipoGradoEstudios' => $_POST['tipoGradoEstudios'],
                'tituloGradoEstudios' => $_POST['tituloGradoEstudios'],
                'espectativaEconomica' => $_POST['espectativaEconomica'],
                'curriculum' => $ruta
            );

            $respuesta = ModeloVacantes::mdlCrearCandidato($tabla, $datos);
			
			if($respuesta == "ok"){

                $idRegistro = ModeloVacantes::mdlObtenerUltimoIdCandidato('candidatos');
                $liga = 'index.php?route=postulacion-exitosa&nombre='.$_POST['nombre'].'&email='.$_POST['email'].'&idRegistro='.$idRegistro['id'];
                Alertas::EnviarMailRegistro($datos, $idRegistro);
                Alertas::AlertaReenvio($liga);

			}else{
				
				echo '<br><div class="alert alert-danger">Hubo un error en el registro, intente mas tarde</div>';

			}

        }

    }

}
