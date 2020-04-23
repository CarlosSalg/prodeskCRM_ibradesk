<?php

    // Obteniendo valores GET
    if(isset($_GET['vacante']) && isset($_GET['title'])){
        
        // Obtener la Vacante de la Base de Datos
        require_once "models/vacantes.modelo.php";
        $id = $_GET['vacante'];
        $title = $_GET['title'];
        $tabla = 'vacantes';

        $respuesta = ModeloVacantes::mdlBuscarVacante($tabla, $id);
        
        // Validar si coinciden los datos id Vacante y Titulo
        if($respuesta["vac_id"] == $id && $respuesta["vac_titulo"] == $title){

            require_once "views/modules/registro-candidato-form.php";
            die();

        }else{

            require_once "views/modules/error-link-registro.php";
            die();

        }

    }
    
?>
