<?php 

class Alertas{

	static public function EnviarMailRegistro($datos, $idRegistro){

		$email_to = $datos['email'];
		$email_from = "reclutamiento@ge.ibradesk.com";
		$email_subject = "Registro en Portal Web";

		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: Reclutamiento'. "\r\n";
		$cabeceras .= 'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

		$email_message_html = '

			<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
				<tr>
					<td style="background-color: #ecf0f1">
						<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
							<h2 style="color: #e67e22; margin: 0 0 7px">Hola '.ucwords($datos['nombre']).'</h2>
							<p style="margin: 2px; font-size: 15px">
								Gracias por registrarte en nuestro portal Web</p>
							<p style="margin: 2px; font-size: 15px">
								Este es tu ID de registro</p>
							<br>
							<br>
							<div style="width: 100%; text-align: center">
								<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db">ID: '.$idRegistro['id'].'</a>	
							</div>
							<br>
							<br>
			
							<p style="margin: 2px; font-size: 15px">
								Proporcionalo a quien te dio el Link</p>
							<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Prodesk CRM 2020</p>
						</div>
					</td>
				</tr>
			</table>
	
		';

		mail($email_to, $email_subject, $email_message_html, $cabeceras);

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