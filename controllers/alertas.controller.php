<?php 

class Alertas{

	static public function EnviarMailRegistro($datos, $idRegistro){

		$email_to = $datos['email'];
		$email_from = "noreply@ibradesk.com";
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
	
	static public function NotificarCandidatoViaMail($datos, $entrevistador, $candidato, $vacante){

		$email_to = $candidato['can_email'];
		$email_from = "noreply@ibradesk.com";
		$email_subject = "Entrevista Programada";

		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: Prodesk'. "\r\n";
		$cabeceras .= 'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

		$email_message_html = '

			<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
				<tr>
					<td style="background-color: #ecf0f1">
						<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
							<h2 style="color: #e67e22; margin: 0 0 7px">Hola '.ucwords($candidato['can_nombre']).'</h2>
							<p style="margin: 2px; font-size: 15px">
								Se programo una nueva entrevista para la vacante de '.$vacante['vac_titulo'].'
							</p>
							<p style="margin: 2px; font-size: 15px">
								Fecha y Hora programada
							</p>
							<br>
							<br>
							<div style="width: 100%; text-align: center">
								<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db">'.$datos['fechaEntrevista'].' '.$datos['horaEntrevista'].'</a>	
							</div>
							<br>
							<br>
							<p style="margin: 2px; font-size: 15px">
								Mucha Suerte!
							</p>
							<p style="margin: 2px; font-size: 15px">
								Por favor no responda a este mensaje
							</p>
							<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Prodesk CRM 2020</p>
						</div>
					</td>
				</tr>
			</table>
	
		';

		mail($email_to, $email_subject, $email_message_html, $cabeceras);

		return "Candidato Notificado";

	}

	static public function NotificarEntrevistadorViaMail($datos, $entrevistador, $candidato, $vacante){

		$email_to = $entrevistador['usu_usuario'];
		$email_from = "noreply@ibradesk.com";
		$email_subject = "Entrevista Programada";

		$cabeceras = 'MIME-Version: 1.0' . "\r\n";
		$cabeceras .= 'Content-type: text/html; charset=utf-8' . "\r\n";
		$cabeceras .= 'From: Prodesk'. "\r\n";
		$cabeceras .= 'Reply-To: '.$email_from."\r\n" .'X-Mailer: PHP/' . phpversion();

		$email_message_html = '

			<table style="max-width: 600px; padding: 10px; margin:0 auto; border-collapse: collapse;">
				<tr>
					<td style="background-color: #ecf0f1">
						<div style="color: #34495e; margin: 4% 10% 2%; text-align: justify;font-family: sans-serif">
							<h2 style="color: #e67e22; margin: 0 0 7px">Hola '.ucwords($entrevistador['usu_nombre']).'</h2>
							<p style="margin: 2px; font-size: 15px">
								Se programo una nueva entrevista para la vacante de '.$vacante['vac_titulo'].'
							</p>
							<p style="margin: 2px; font-size: 15px">
								Datos del Candidato: 
							</p>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Nombre: '.$candidato['can_nombre'].' '.$candidato['can_apellidos'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								E-mail: '.$candidato['can_email'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Telefono: '.$candidato['can_telefono'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Fecha Nacimiento: '.$candidato['can_fecha_nacimiento'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Grado de Estudios: '.$candidato['can_grado_estudios'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Tipo Grado de Estudios: '.$candidato['can_tipo_grado_estudios'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Titulo Grado de Estudios: '.$candidato['can_titulo_grado_estudios'].'
							</a>
							<br>
							<a style="margin: 2px; font-size: 15px">
								Espectativa Economica: $'.$candidato['can_espectativa_economica'].'
							</a>
							<br>
							<a href="'.$_SERVER['host'].''.$candidato['can_cv'].'" style="margin: 2px; font-size: 15px">
								Ver Curriculum Vitae
							</a>
							<p style="margin: 2px; font-size: 15px">
								Fecha y Hora programada
							</p>
							<br>
							<br>
							<div style="width: 100%; text-align: center">
								<a style="text-decoration: none; border-radius: 5px; padding: 11px 23px; color: white; background-color: #3498db">'.$datos['fechaEntrevista'].' '.$datos['horaEntrevista'].'</a>	
							</div>
							<br>
							<br>
			
							<p style="margin: 2px; font-size: 15px">
								Por favor no responda a este mensaje
							</p>
							<p style="color: #b3b3b3; font-size: 12px; text-align: center;margin: 30px 0 0">Prodesk CRM 2020</p>
						</div>
					</td>
				</tr>
			</table>
	
		';

		mail($email_to, $email_subject, $email_message_html, $cabeceras);

		return "Entrevistador Notificado";

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