<?php

    $idNotificacion = $_GET['idNotificacion'];
    $notificacion = Notificaciones::ctrBuscarNotificacion($idNotificacion);
    Notificaciones::ctrMarcarLeidaNotificacion($idNotificacion);

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


?>

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

    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

                <div class="timeline">
                    <div class="time-label">
                        <span class="bg-info">Notificacion</span>
                    </div>
                    <div class="">
                        <i class="<?=$icono?>"></i>
                        <div class="timeline-item border-dark">
                            <span class="time"><i class="fas fa-clock"></i> <?=$fechaCorta?> <?=$fechaNotificacion[1]?></span>
                            <h3 class="timeline-header"><?=$notificacion['not_texto']?></h3>
                            <div class="timeline-body">
                                <?=$descripcionCorta?>
                            </div>
                        </div>
                    </div>
                    <div class="time-label">
                        <span class="bg-info">Notificacion</span>
                    </div>
                    
                </div>
             
            </div>
        </div>
    </section>

</div>