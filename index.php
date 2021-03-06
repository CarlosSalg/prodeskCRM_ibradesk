<?php 
	
	// Require de Dependencias Controller
	require_once "controllers/template.controller.php";
	require_once "controllers/alertas.controller.php";
	require_once "controllers/funciones.controller.php";
	require_once "controllers/usuarios/usuario.controller.php";
	require_once "controllers/tareas/tareas.controller.php";
	require_once "controllers/clientes/clientes.controller.php";
	require_once "controllers/vacantes/vacantes.controller.php";
	require_once "controllers/entrevistas/entrevistas.controller.php";
	require_once "controllers/notificaciones/notificaciones.controller.php";
	require_once "controllers/calendario/calendario.controller.php";

	// Require de Dependencias Model
	require_once "models/usuarios.modelo.php";
	require_once "models/tareas.modelo.php";
	require_once "models/clientes.modelo.php";
	require_once "models/vacantes.modelo.php";
	require_once "models/notificaciones.modelo.php";
	require_once "models/calendario.modelo.php";
	require_once "models/entrevistas.modelo.php";
	require_once "models/mensajes.modelo.php";


	// Realizando Render del TEMPLATE
	$template = new Template();
	$template -> Render();
