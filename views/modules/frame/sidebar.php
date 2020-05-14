<?php 

	$tareasPendientes = ControladorTareas::ctrMostrarTodasMisTareasAbiertas();

	if(count($tareasPendientes)>0){

		$cantidadTareas = '<span class="badge badge-warning right">'.count($tareasPendientes).'</span>';
		$avisoTareas = '  <span class="badge badge-danger right">T</span>';

	}else{

		$cantidadTareas = '';
		$avisoTareas = '';

	}

?>

<aside class="main-sidebar elevation-4 sidebar-dark-info">

	<a href="home" class="brand-link">
		<img src="views/img/template/icono.png" alt="Logo" class="brand-image elevation-3" style="opacity: .9">
		<span class="brand-text font-weight-light">Prodesk / CRM</span>
	</a>

	<div class="sidebar">

		<div class="user-panel mt-3 pb-3 mb-3 d-flex">

			<div class="image">
				<img src="<?=$_SESSION['foto']?>" class="img-circle elevation-2" alt="User_Image">
			</div>

			<div class="info">
				<a href="#" class="d-block f-14"><?=$_SESSION['nombre']?></a>
			</div>

		</div>

		<nav class="mt-2">

			<ul class="nav nav-pills nav-sidebar flex-column f-13" data-widget="treeview" role="menu" data-accordion="false">

				<li class="nav-item">
					<a href="home" class="nav-link">
						<i class="nav-icon fas fa-home"></i>
						<p>Home</p>
					</a>
				</li>
				<li class="nav-item">
					<a href="calendario" class="nav-link">
						<i class="nav-icon far fa-calendar"></i>
						<p>Calendario</p>
					</a>
				</li>

				<li class="nav-item">
					<a href="mensajes" class="nav-link">
						<i class="nav-icon far fa-comments"></i>
						<p>Mensajes</p>
					</a>
				</li>
				
				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon far fa-bookmark"></i>
						<p>Reclutamiento<i class="right fas fa-angle-left"></i></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="mis-entevistas" class="nav-link">
								<i class="nav-icon far fa-circle"></i>
								<p>Mis Entrevistas</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="ver-vacantes" class="nav-link">
								<i class="nav-icon far fa-circle"></i>
								<p>Vacantes</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="ver-cartera" class="nav-link">
								<i class="nav-icon far fa-circle"></i>
								<p>Cartera</p>
							</a>
						</li>
					</ul>
				</li>

				<li class="nav-item has-treeview">
					<a href="#" class="nav-link">
						<i class="nav-icon fas fa-tasks"></i>
						<p>Tareas<i class="right fas fa-angle-left"></i><?=$avisoTareas?></p>
					</a>
					<ul class="nav nav-treeview">
						<li class="nav-item">
							<a href="mis-tareas" class="nav-link">
								<i class="nav-icon far fa-circle"></i>
								<p>Tareas Pendientes</p>
								<?=$cantidadTareas?>
							</a>
						</li>
						<li class="nav-item">
							<a href="todas-mis-tareas" class="nav-link">
								<i class="nav-icon far fa-circle"></i>
								<p>Todas mis Tareas</p>
							</a>
						</li>
						<li class="nav-item">
							<a href="mis-tareas-creadas" class="nav-link">
								<i class="nav-icon far fa-circle"></i>
								<p>Mis Tareas Creadas</p>
							</a>
						</li>
					</ul>
				</li>
				<li class="nav-item">
					<a href="noticias" class="nav-link">
						<i class="nav-icon fas fa-rss"></i>
						<p>Noticias</p>
					</a>
				</li>
				
				<?php

					if($_SESSION['type'] == 'Administrador'){

						include "menu-admin.php";

					}


				?>


				<li class="nav-item">
					<a href="logout" class="nav-link">
						<i class="nav-icon fas fa-sign-out-alt"></i>
						<p>Salir</p>
					</a>
				</li>

			</ul>

		</nav>

	</div>

</aside>