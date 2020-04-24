<?php

    // Obteniendo valores GET
    if(isset($_GET['vacante']) && isset($_GET['token'])){
        
        // Obtener la Vacante de la Base de Datos
        require_once "models/vacantes.modelo.php";
        $id = $_GET['vacante'];
        $token = $_GET['token'];
        $tabla = 'vacantes';

        $respuesta = ModeloVacantes::mdlBuscarVacante($tabla, $id);
        
        // Validar si coinciden los datos id Vacante y Titulo
        if($respuesta["vac_id"] == $id && $respuesta["vac_token_link"] == $token){

            require_once "views/modules/registro-candidato-form.php";
            die();

        }else{

            require_once "views/modules/error-link-registro.php";
            die();

        }

    }else{

        require_once "views/modules/error-link-registro.php";
        die();

    }
    
?>
