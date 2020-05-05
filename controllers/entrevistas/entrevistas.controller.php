<?php

class ControladorEntrevistas{

    public static function ctrCrearEntrevista(){

        if(isset($_POST['candidato'])){

            if(isset($_POST['notificarEntrevistador'])){

                $notificarEntrevistador = "si";

            }else{

                $notificarEntrevistador = "no";

            }

            if(isset($_POST['notificarCandidato'])){

                $notificarCandidato = "si";

            }else{

                $notificarCandidato = "no";

            }

            // Buscar datos de Entrevistador
            $idEntrevistador = $_POST['entrevistador'];
            $entrevistador = ControladorUsuarios::ctrBuscarUsuario($idEntrevistador);

            // Buscar datos de Candidato
            $idCandidato = $_POST['candidato'];
            $candidato = ControladorVacantes::ctrBuscarCandidato($idCandidato);

            // Buscar datos de Vacante
            $idVacante = $candidato['can_vac_id'];
            $vacante = ModeloVacantes::mdlBuscarVacante('vacantes',$idVacante);

            $tabla = 'entrevistas';
            
            // Guardar Form en Array
            $datos = array(
                
                'vacante' => $idVacante,
                'candidato' => $_POST['candidato'],
                'entrevistador' => $_POST['entrevistador'],
                'fechaEntrevista' => $_POST['fechaEntrevista'],
                'horaEntrevista' => $_POST['horaEntrevista'],
                'horaEntrevistaFin' => $_POST['horaEntrevistaFin']
            );
            
            // Crear Registro en la Base de Datos
            $respuesta = ModeloEntrevistas::mdlCrearEntrevista($tabla, $datos);
            
            // Crear Evento en el Calendario
            $titulo = "Entrevista". $vacante["vac_titulo"];
            $ultimoIdEntrevista = ModeloEntrevistas::mdlObtenerUltimoId($tabla);
            $id = $ultimoIdEntrevista['id'];

            ControladorCalendario::ctrCrearEvento($_POST['entrevistador'], $datos, 'entrevista', $titulo, $_POST['fechaEntrevista'], $_POST['horaEntrevista'], $_POST['fechaEntrevista'], $_POST['horaEntrevistaFin'], 0, "index.php?route=ver-entrevista&idVacante=$id");

            // Notificar al Entrevistador via Mail
            $notificacion = '';

            if($notificarEntrevistador == 'si'){

                $notificacion .= Alertas::NotificarEntrevistadorViaMail($datos, $entrevistador, $candidato, $vacante);
                $notificacion .= ' ';
                
            }

            // Notificar al Candidato via Mail
            if($notificarCandidato == 'si'){

                $notificacion .= Alertas::NotificarCandidatoViaMail($datos, $entrevistador, $candidato, $vacante);

            }

            Notificaciones::ctrCrearNotificacion($idEntrevistador, 'entrevista', 'Nueva Entrevista', $datos);

            echo "
                <script>
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Entrevista programada correctamente ".$notificacion."',
                    }).then(function(result){
                            if(result.value){

                                window.location = '".$_SERVER['REQUEST_URI']."'
                            }
                        });
                </script>
            ";

            

        }

    }

}