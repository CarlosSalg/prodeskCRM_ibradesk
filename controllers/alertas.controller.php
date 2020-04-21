<?php 

class Alertas{

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
	
}