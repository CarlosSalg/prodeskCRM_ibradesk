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

                <div class="timeline">
                    <div class="time-label">
                        <span class="bg-info">Todas las Notificaciones</span>
                    </div>

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
            $icono = 'fas fa-calendar';
            $descripcionCorta = "<b>".$creador['usu_nombre']."</b> te ha programado una nueva entrevista para la vacante de <b>".$vacante['vac_titulo']."</b> para el dia <b>".$fechaLarga."</b> a las <b>".$descripcion['horaEntrevista']. "</b>. Te estara esperando el candidato <b>".ucwords($candidato['can_nombre']). " ".ucwords($candidato['can_apellidos']). "</b> <br> Dirigete al panel <a href='mis-entrevistas'>Mis Entrevistas</a> para que no salga de tu radar";
        }

        if($notificacion['not_tipo']=='tarea'){
            $descripcion = json_decode($notificacion['not_descripcion'], true);
            $creador = ControladorUsuarios::ctrBuscarUsuario($notificacion['not_usu_id_creador']);
            $fechaLarga = Funciones::ConvertirFechaCortaHaciaFechaLarga($descripcion['fechaFin']);
            $fechaNotificacion = Funciones::SepararFechaLarga($notificacion['not_fecha']);
            $fechaCorta = Funciones::ConvertirFechaCortaHaciaFechaCorta($fechaNotificacion[0]);
            $icono = 'fas fa-edit';
            $descripcionCorta = "<b>".$creador['usu_nombre']."</b> te ha asignado la tarea <b>".$descripcion['nombreTarea']."</b> con fecha limite de entrega para el <b>".$fechaLarga."</b><br>Dirigete al panel <a href='mis-tareas'>Mis Tareas</a> para que no salga de tu radar";
        }
        echo '
                    <div>
                        <i class="'.$icono.'"></i>
                        <div class="timeline-item">
                            <span class="time"><i class="fas fa-clock"></i> '.$fechaCorta. ' ' .$fechaNotificacion[1].'</span>
                            <h3 class="timeline-header">'.$notificacion['not_texto'].'</h3>
                            <div class="timeline-body">
                                '.$descripcionCorta.'
                            </div>
                            <div class="timeline-footer text-right">
       ';
                            if($notificacion['not_estatus'] == 1){
                                echo '
                                    <button class="btn btn-info btn-sm btnCambiarEstatusNotificacion" cambiaEstatus ="0" idNotificacion="'.$notificacion['not_id'].'">
                                        Marcar leida
                                    </button>
                                ';
                            }else{
                                echo '
                                    <button class="btn btn-outline-info btn-sm btnCambiarEstatusNotificacion" cambiaEstatus ="1" idNotificacion="'.$notificacion['not_id'].'">
                                        Marcar no leida
                                    </button>
                                ';
                            }
        echo'                                
                            </div>
                        </div>
                    </div>
        ';

    }

    echo '
                    <div class="time-label">
                        <span class="bg-info">Todas las Notificaciones</span>
                    </div>
                </div>
            </div>
        </div>
    </section>

    ';
?>
</div>

<script>    

    $(document).ready(function(){

        $('.btnCambiarEstatusNotificacion').on('click', function(){

            let id = $(this).attr('idNotificacion');
            let nuevoValorEstatus = $(this).attr('cambiaEstatus');
            const datos = {
                id: id,
                nuevoValorEstatus:nuevoValorEstatus,
            };

            $.post('controllers/notificaciones/cambiar-estatus-notificacion.php',datos, function(res){

                console.log(res);

            });

            if(nuevoValorEstatus == 1){

                $(this).removeClass('btn-outline-info');
                $(this).addClass('btn-info');
                $(this).attr('cambiaEstatus',0);
                $(this).html('Marcar leida');

            }else{

                $(this).removeClass('btn-info');
                $(this).addClass('btn-outline-info');
                $(this).attr('cambiaEstatus',1);
                $(this).html('Marcar no leida');

            }


        });

    });

</script>