<?php

class Funciones{


    /**
    * Convierte Un numero de mes a String con el nombre del Mes ej. toma 12 y retorna Diciembre
    * @return string $mes 
    * @param int $numero 
    */
    public static function ConvertirNumeroAMes($numero){

        $mes = '';

        if($numero == 1){
            $mes = 'Enero';
        }
        if($numero == 2){
            $mes = 'Febrero';
        }
        if($numero == 3){
            $mes = 'Marzo';
        }
        if($numero == 4){
            $mes = 'Abril';
        }
        if($numero == 5){
            $mes = 'Mayo';
        }
        if($numero == 6){
            $mes = 'Junio';
        }
        if($numero == 7){
            $mes = 'Julio';
        }
        if($numero == 8){
            $mes = 'Agosto';
        }
        if($numero == 9){
            $mes = 'Septiembre';
        }
        if($numero == 10){
            $mes = 'Octubre';
        }
        if($numero == 11){
            $mes = 'Noviembre';
        }
        if($numero == 12){
            $mes = 'Diciembre';
        }

        return $mes;

    }

    /**
    * Convierte String de Fecha Americana ej. 2020-04-29 a Fecha Larga ej. 29 de Abril del 2020
    * @return string si la fecha es correcta
    * @param string $fecha 
    */
    public static function ConvertirFechaCortaHaciaFechaLarga($fecha){

        $arrayFecha = explode("-", $fecha);
        $diaFecha = $arrayFecha[2];
        $mesFecha = Funciones::ConvertirNumeroAMes($arrayFecha[1]);
        $anoFecha = $arrayFecha[0];

        $fechaLarga = "$diaFecha de $mesFecha del $anoFecha";

        return $fechaLarga;

    }

    /**
    * Convierte String de Fecha y Hora Americana completa ej. 2020-04-29 11:48:19 a un array 
    * Retorna Array con 2 indices en el indice 0 envia ej. 2020-04-29 y en el indice 1 envia ej. 11:48
    * @return array si la fecha es correcta
    * @param string $fechaHora formato 2020-04-29 11:48:19
    */
    public static function SepararFechaLarga($fechaHora){

        $arrayFechaHora = explode(" ", $fechaHora);
        $arrayHoraSinSegundos = explode(":",$arrayFechaHora[1]);
        $fecha = $arrayFechaHora[0];
        $horaSinSegundos = "$arrayHoraSinSegundos[0]:$arrayHoraSinSegundos[1]";

        $dato = array($fecha,$horaSinSegundos);

        return $dato;

    }

    /**
    * Convierte String de Fecha y Hora Americana completa ej. 2020-04-29 a una fecha corta ej. 29 de Abril
    * 
    * @return string 
    * @param string $fecha formato 2020-04-29
    */
    public static function ConvertirFechaCortaHaciaFechaCorta($fecha){

        $arrayFecha = explode("-", $fecha);
        $diaFecha = $arrayFecha[2];
        $mesFecha = Funciones::ConvertirNumeroAMes($arrayFecha[1]);
        
        $fechaCorta = "$diaFecha de $mesFecha";

        return $fechaCorta;

    }

    /**
    * Convierte Hora y Fecha a formato para notificaciones, deben entrar 2 parametros, fecha y hora
    * 
    * @return string si la fecha es correcta
    * @param string $fecha formato 2020-04-29 string $hora formato 11:48
    */
    public static function TiempoNotificacion($fecha, $hora){

        date_default_timezone_set('America/Mexico_City');
        $fecha1= new DateTime($fecha);
        $fechaDiferencia = date("Y-m-d");
        $fecha2= new DateTime($fechaDiferencia);
        $diff = $fecha1->diff($fecha2);
        $diferenciaDias = $diff->days;
        $cadena = '';

        if($diferenciaDias == 0){

            $cadena = "hoy $hora";

        }else if($diferenciaDias == 1){

            $cadena = "ayer $hora";

        }else{

            $cadena = "hace $diferenciaDias dias";

        }

        return $cadena;

    }

}