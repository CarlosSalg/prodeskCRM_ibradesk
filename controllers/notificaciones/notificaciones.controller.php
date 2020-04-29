<?php

class Notificaciones{

    public static function ctrCrearNotificacion($idUsuarioNotificado, $tipo, $titulo, $descripcion){

        date_default_timezone_set('America/Mexico_City');
        $time = time();
        $fechaHora = date("Y-m-d H:i:s", $time);

        $notificacion = array(
            'usuarioNotificado' => $idUsuarioNotificado,
            'usuarioCreador' => $_SESSION['id'],
            'tipoNotificacion' => $tipo,
            'textoNotificacion' => $titulo,
            'descripcionNotificacion' => json_encode($descripcion),
            'fechaHoraNotificacion' => $fechaHora,
            'estatusNotificacion' => 1,
        );

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