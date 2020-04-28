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

            // Guardar Form en Array
            $datos = array(
                
                'candidato' => $_POST['candidato'],
                'entrevistador' => $_POST['entrevistador'],
                'fechaEntrevista' => $_POST['fechaEntrevista'],
                'horaEntrevista' => $_POST['horaEntrevista'],
                'notificarEntrevistador' => $notificarEntrevistador,
                'notificarCandidato' => $notificarCandidato,
            );

            // Buscar datos de Entrevistador
            $idEntrevistador = $datos['entrevistador'];
            $entrevistador = ControladorUsuarios::ctrBuscarUsuario($idEntrevistador);

            // Buscar datos de Candidato
            $idCandidato = $datos['candidato'];
            $candidato = ControladorVacantes::ctrBuscarCandidato($idCandidato);

            // Buscar datos de Vacante
            $idVacante = $candidato['can_vac_id'];
            $vacante = ModeloVacantes::mdlBuscarVacante('vacantes',$idEntrevistador);

            // Crear Registro en la Base de Datos

            // Notificar al Entrevistador
            if($notificarEntrevistador == 'si'){

                Alertas::NotificarEntrevistadorViaMail($datos, $entrevistador, $candidato, $vacante);
                
            }

            // Notificar al Candidato
            if($notificarCandidato == 'si'){

                Alertas::NotificarCandidatoViaMail($datos, $entrevistador, $candidato, $vacante);

            }

            echo "
                <script>
                    swal({
                        position: 'center',
                        type: 'success',
                        title: 'Entrevista programada correctamente',
                    }).then(function(result){
                            if(result.value){

                                location.reload();
                            }
                        });
                </script>
            ";

            

        }

    }

}