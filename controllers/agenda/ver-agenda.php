<?php

//require_once "../../models/agenda.modelo.php";

$template = "

        {
        title          : 'Entrevista',
        start          : new Date(2020, 3, 15),
        backgroundColor: '#f56954', //red
        borderColor    : '#f56954', //red
        allDay         : true
        }

";

$datos = array('titulo'=>'Entrevista', 'start' => '(2020-3-15)', );

echo json_encode($template);