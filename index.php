<?php 
	
	// Require de Dependencias Controller
	require_once "controllers/template.controller.php";
	require_once "controllers/alertas.controller.php";
	require_once "controllers/usuarios/usuario.controller.php";
	require_once "controllers/tareas/tareas.controller.php";

	// Require de Dependencias Model
	require_once "models/usuarios.modelo.php";
	require_once "models/tareas.modelo.php";


	// Realizando Render del TEMPLATE
	$template = new Template();
	$template -> Render();
