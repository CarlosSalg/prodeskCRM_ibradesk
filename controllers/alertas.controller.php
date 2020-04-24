<?php 

class Alertas{

	static public function EnviarMailRegistro($datos, $idRegistro){

		$email_to = $datos['email'];
		$email_from = "reclutamiento@ge.ibradesk.com";
		$email_subject = "Registro en Portal Web";
		
		$email_message = "Gracias por registrarte en el portal Web\n\n\n";
		$email_message .= ucwords($datos['nombre']).", hemos recibido tus datos corretamente\n";
		$email_message .= "Este es tu ID de Registro: ".$idRegistro."\n\n\n";
		$email_message .= "Por favor no responda a este mensaje\n";

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