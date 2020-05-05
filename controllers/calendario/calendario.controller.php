<?php

class ControladorCalendario{

    public static function ctrCrearEvento($usuario, $descripcion, $tipo, $titulo, $fechaInicio, $horaInicio, $fechaFin, $horaFin, $todoElDia, $url){

        // '#f56954', //red
        // '#f39c12', //yellow
        // '#0073b7', //Blue
        // '#00c0ef', //Info (aqua)
        // '#00a65a', //Success (green)
        // '#3c8dbc', //Primary (light-blue)

        $bgColor = '';
        $borderColor = '';

        if($tipo == 'tarea'){

            $bgColor = '#f56954';
            $borderColor = '#f56954';

        }

        if($tipo == 'entrevista'){

            $bgColor = '#3c8dbc';
            $borderColor = '#3c8dbc';

        }

        $tabla = 'calendario';
        $datos = array(

            'cal_user_id'=> $usuario, 
            'cal_event_descripcion'=> json_encode($descripcion),
            'cal_type'=> $tipo,
            'cal_title'=> $titulo,
            'cal_start_date'=> $fechaInicio,
            'cal_start_time'=> $horaInicio,
            'cal_end_date'=> $fechaFin,
            'cal_end_time'=> $horaFin,
            'cal_all_day'=> $todoElDia,
            'cal_url'=> $url,
            'cal_background_color'=> $bgColor,
            'cal_border_color'=> $borderColor
        
        );

    
        ModeloCalendario::mdlCrearEvento($tabla, $datos);

    }


}