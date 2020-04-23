<?php 

class Alertas{

	static public function ctrNotificarRegistro(){

		$usuarioFInal = $_POST["correo"];
		$usuarioFInal .= $_POST["nuevoDominio"];

		$nombreFInal = $_POST["nombre"];
		$nombreFInal .= " ";
		$nombreFInal .= $_POST["apellidoPaterno"];
		$nombreFInal .= " ";
		$nombreFInal .= $_POST["apellidoMaterno"];

		$email_to = "fzarate@nstrantor.com.mx, rmar@nstrantor.com.mx";
		$email_from = "soporte@nstrantor.com.mx";

		$email_subject = "Nuevo registro para ingreso";
		
		$email_message = "Detalles de la solicitud:\n\n";
		$email_message .= "Nombre: " .$nombreFInal. "\n";
		$email_message .= "Usuario: " .$usuarioFInal. "\n\n";
		$email_message .= "Por favor revise que los datos esten correctos\n";
		$email_message .= "Ingrese con su usuario de Admministrador para activar el usuario\n";
		$email_message .= "http://www.nstrantor.com.mx/admin-ns/inicio";

		$headers = 'From: '.$email_from."\r\n".'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

		mail($email_to, $email_subject, $email_message, $headers);

		return "ok";

    }

	public static function Alerta($tipo, $mensaje, $ruta){

		echo "
		<script>
			swal({
			  	position: 'center',
			  	type: '".$tipo."',
			  	title: '".$mensaje."',
			}).then(function(result){
                    if(result.value){

                        window.location = '".$ruta."';
                    }
                });
		</script>
		";
	}

	public static function AlertaReenvio($ruta){

		echo "
		<script>
            window.location = '".$ruta."';
		</script>
		";
	}
	
}