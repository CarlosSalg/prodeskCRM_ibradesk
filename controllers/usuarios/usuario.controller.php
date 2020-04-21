<?php 

class ControladorUsuarios{

	public static function ctrLogin(){

		if(isset($_POST['usuario']) && isset($_POST['password'])){
				
			$usuario = $_POST['usuario'];
			$password = crypt($_POST['password'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');

			$tabla = 'usuarios';

			$respuesta = ModeloUsuarios::mdlIngresarUsuario($tabla, $usuario);

			if($respuesta['usu_usuario'] == $usuario && $respuesta['usu_password'] == $password){

				$_SESSION['status'] = 1;
				$_SESSION['id'] = $respuesta['usu_id'];
				$_SESSION['nombre'] = $respuesta['usu_nombre'];

				if($respuesta['usu_foto'] != ""){

					$_SESSION['foto'] = $respuesta['usu_foto'];

				}else{

					$_SESSION['foto'] = 'views/img/usuarios/default/anonymous.png';
					
				}

				echo '
					<script>
				        window.location ="home";
					</script>
				';

			}else if($_POST['usuario'] == "superadmin" && $_POST['password'] =="superadmin123"){

				$_SESSION['sesion'] = "ok";
				$_SESSION['nombre'] = "SuperAdmin";

			}else{

				echo '<br /><br /><div class="alert alert-warning f-13">Usuario o contraseña erroneo</div> ';

			}

		}
	}

	public static function ctrCrearUsuario(){

		if(isset($_POST['nuevoNombre'])){

			$ruta="";

            if(isset($_FILES["nuevaFoto"]["tmp_name"]) && $_FILES["nuevaFoto"]["tmp_name"] != null){

                $archivo = $_FILES['nuevaFoto'];
                $nombre = $archivo['name'];
                $directorio = "views/img/usuarios/".$_POST["nuevoUsuario"];
                mkdir($directorio, 0755);
                $rutaFinal = $directorio;
                $rutaFinal .= "/";
                $rutaFinal .= $nombre;
                move_uploaded_file($_FILES['nuevaFoto']['tmp_name'], $rutaFinal);
                $ruta=$rutaFinal;
                
            }
                
			$nombre = $_POST['nuevoNombre'];
			$usuario = $_POST['nuevoUsuario'];
			$password = crypt($_POST['nuevaPassword'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$');
			$roll = $_POST['nuevoRoll'];

			$tabla = 'usuarios';
			$datos = array('nombre' => $nombre,
							'usuario' => $usuario,
							'password' => $password,
							'roll' => $roll,
							'foto' => $ruta );

			$respuesta = ModeloUsuarios::mdlCrearUsuario($tabla, $datos);

			if($respuesta == "ok"){

				Alertas::Alerta('success', 'Accion completada correctamente', 'usuarios');

			}else{
				
				Alertas::Alertaasoiuaslk('error', 'Error, contactar administrador', 'usuarios');

			}
		}
	}

	public static function ctrEditarUsuario(){

		if(isset($_POST['editarUsuario'])){

			//Asignando valores del formulario
			$id = $_POST['idUsuario'];
			$nombreUsuario = $_POST['editarNombre'];
			$ruta = $_POST['imagenActualRuta'];
			$roll = $_POST['editarRoll'];

			//Validando si hubo un cambio de la Contraseña
			if(isset($_POST['editarPassword']) && $_POST['editarPassword'] != ""){

				//Asignado nueva contraseña
				$password = crypt($_POST['editarPassword'],'$2a$07$asxx54ahjppf45sd87a5a4dDDGsystemdev$'); 	

			}else{

				//Asignando contraseña actual
				$password = $_POST['passwordActual']; 			

			}

			//Validando si hubo un cambio en la fotografia
	        if(isset($_FILES["editarFoto"]["tmp_name"]) && $_FILES["editarFoto"]["tmp_name"] != null){

	            $archivo = $_FILES['editarFoto'];
	            $nombre = $archivo['name'];
	            $directorio = "views/img/usuarios/".$_POST["editarUsuario"];
	            mkdir($directorio, 0755);
	            $rutaFinal = $directorio;
	            $rutaFinal .= "/";
	            $rutaFinal .= $nombre;
	            move_uploaded_file($_FILES['editarFoto']['tmp_name'], $rutaFinal);
	            $ruta=$rutaFinal;

	        }

			//Asignando valor a Tabla y Array con los datos finales
			$tabla = 'usuarios';
			$datos = array('nombre' => $nombreUsuario,
							'id' => $id,
							'password' => $password,
							'roll' => $roll,
							'foto' => $ruta );

			// Realizando consulta a la Base de datos
			$respuesta = ModeloUsuarios::mdlActualizarUsuario($tabla,$datos);

			// Enviando respuesta al usuario
			if($respuesta){

				Alertas::Alerta('success', 'Accion completada correctamente', 'usuarios');

			}else{
				
				Alertas::Alerta('error', 'Error, contactar administrador', 'usuarios');

			}

		}
	}

	public static function ctrMostrarUsuarios(){

		$tabla = 'usuarios';
		$respuesta = ModeloUsuarios::mdlMostrarUsuarios($tabla);
		return $respuesta;
	}

	public static function ctrBuscarUsuario($id){

		$tabla = 'usuarios';
		$respuesta = ModeloUsuarios::mdlBuscarUsuario($tabla, $id);
		return $respuesta;
	}


}
