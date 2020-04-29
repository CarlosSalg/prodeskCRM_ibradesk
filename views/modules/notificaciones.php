<?php

    if(isset($_GET['idNotificacion'])){

        $idNotificacion = $_GET['idNotificacion'];
        $notificacion = Notificaciones::ctrBuscarNotificacion($idNotificacion);
        require_once "views/modules/notificacion-ver-notificacion.php";
        die();

    }else{

        require_once "views/modules/notificacion-ver-todas.php";
        die();

    }

?>

