<?php

class Notificaciones{

    public static function ctrNotificarNuevaProgramacionEntrevista($notificacion){

        $tabla = 'notificaciones';
        $respuesta = ModeloNotificaciones::mdlCrearNotificacion($tabla, $notificacion);
        
    }

    public static function ctrMostarNotificacionesActivas(){

        $tabla = 'notificaciones';
        $id = $_SESSION['id'];
        $respuesta = ModeloNotificaciones::mdlMostarNotificacionesActivas($tabla, $id);

        return $respuesta;
        
    }

    public static function ctrMostrarTodasLasNotificaciones(){

        $tabla = 'notificaciones';
        $id = $_SESSION['id'];
        $respuesta = ModeloNotificaciones::mdlMostrarTodasLasNotificaciones($tabla, $id);

        return $respuesta;
        
    }

    public static function ctrBuscarNotificacion($idNotificacion){

        $tabla = 'notificaciones';
        $respuesta = ModeloNotificaciones::mdlBuscarNotificacion($tabla, $idNotificacion);

        return $respuesta;
        
    }

    public static function ctrMarcarLeidaNotificacion($idNotificacion){

        $tabla = 'notificaciones';
        $respuesta = ModeloNotificaciones::mdlMarcarLeidaNotificacion($tabla, $idNotificacion);
        
    }


}