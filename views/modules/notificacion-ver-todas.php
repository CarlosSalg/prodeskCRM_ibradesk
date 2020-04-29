<div class="content-wrapper">
  
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Notificaciones</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Notificaciones</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>


<?php

    echo'

    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
    
    ';


    $notificaciones = Notificaciones::ctrMostrarTodasLasNotificaciones();

    foreach($notificaciones as $key => $notificacion){

        if($notificacion['not_tipo']=='entrevista'){

            $descripcion = json_decode($notificacion['not_descripcion'], true);
            $candidato = ControladorVacantes::ctrBuscarCandidato($descripcion['candidato']);
            $creador = ControladorUsuarios::ctrBuscarUsuario($notificacion['not_usu_id_creador']);
            $vacante = ControladorVacantes::ctrBuscarVacanteConCliente($candidato['can_vac_id']);
            $fechaLarga = Funciones::ConvertirFechaCortaHaciaFechaLarga($descripcion['fechaEntrevista']);
            $fechaNotificacion = Funciones::SepararFechaLarga($notificacion['not_fecha']);
            $fechaCorta = Funciones::ConvertirFechaCortaHaciaFechaCorta($fechaNotificacion[0]);
            
            $descripcionCorta = $creador['usu_nombre']." te ha programado una nueva entrevista para la vacante de ".$vacante['vac_titulo']." para el dia ".$fechaLarga." a las ".$descripcion['horaEntrevista']. ". Te estara esperando el candidato ".ucwords($candidato['can_nombre']). " ".ucwords($candidato['can_apellidos']). " <br> Dirigete al panel <a href='mis-entrevistas'>Mis Entrevistas</a> para que no salga de tu radar";
        
        }

        echo '

            <div class="timeline">
                <div class="time-label">
                    <span class="bg-primary">'.$fechaCorta.'</span>
                </div>
                
                <div>
                    <i class="fas fa-calendar bg-blue"></i>
                    <div class="timeline-item card-outline card-info">
                        <span class="time"><i class="fas fa-clock"></i>'.$fechaNotificacion[1].'</span>
                        <h3 class="timeline-header">'.$notificacion['not_texto'].'</h3>
                        <div class="timeline-body">
                            '.$descripcionCorta.'
                        </div>
                        <!-- <div class="timeline-footer text-right">
                            <a class="btn btn-primary btn-sm btnMarcarNoLeida" id="notificacion" idNotificacion="<?=$idNotificacion?>">Marcar como no Leida</a>
                        </div> -->
                    </div>
                </div>
                
                <div>
                    <i class="fas fa-clock bg-gray"></i>
                </div>

            </div>
        
        
        
        ';

    }

    echo '

            </div>
        </div>
    </section>

    ';

?>


</div>