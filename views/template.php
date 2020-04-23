<?php 
	
	session_start();

?>

<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">

	<title>Prodesk / CRM</title>

	<link rel="icon" href="views/img/template/icono.png">

	<!-- Tell the browser to be responsive to screen width -->
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- DataTables -->
	<link rel="stylesheet" href="views/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" href="views/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
	<!-- Font Awesome -->
	<link rel="stylesheet" href="views/plugins/fontawesome-free/css/all.min.css">
	<!-- Ionicons -->
	<link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
	<!-- Tempusdominus Bbootstrap 4 -->
	<link rel="stylesheet" href="views/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css">
	<!-- iCheck -->
	<link rel="stylesheet" href="views/plugins/icheck-bootstrap/icheck-bootstrap.min.css">
	<!-- JQVMap -->
	<link rel="stylesheet" href="views/plugins/jqvmap/jqvmap.min.css">
	<!-- Theme style -->
	<link rel="stylesheet" href="views/dist/css/adminlte.min.css">
	<!-- overlayScrollbars -->
	<link rel="stylesheet" href="views/plugins/overlayScrollbars/css/OverlayScrollbars.min.css">
	<!-- Daterange picker -->
	<link rel="stylesheet" href="views/plugins/daterangepicker/daterangepicker.css">
	<!-- summernote -->
	<link rel="stylesheet" href="views/plugins/summernote/summernote-bs4.css">
  	<!-- Google Font: Source Sans Pro -->
  	<link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">


  	<!--App-->
  	<link rel="stylesheet" href="views/dist/css/main.css">
	

	<!-- jQuery -->
	<script src="views/plugins/jquery/jquery.min.js"></script>
	<!-- jQuery UI 1.11.4 -->
	<script src="views/plugins/jquery-ui/jquery-ui.min.js"></script>
	<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
	<script>$.widget.bridge('uibutton', $.ui.button)</script>
	<!-- Bootstrap 4 -->
	<script src="views/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
	<!-- ChartJS -->
	<script src="views/plugins/chart.js/Chart.min.js"></script>
	<!-- Sparkline -->
	<script src="views/plugins/sparklines/sparkline.js"></script>
	<!-- jQuery Knob Chart -->
	<script src="views/plugins/jquery-knob/jquery.knob.min.js"></script>
	<!-- daterangepicker -->
	<script src="views/plugins/moment/moment.min.js"></script>
	<script src="views/plugins/daterangepicker/daterangepicker.js"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="views/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"></script>
	<!-- Summernote -->
	<script src="views/plugins/summernote/summernote-bs4.min.js"></script>
	<!-- overlayScrollbars -->
	<script src="views/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js"></script>
	<!-- AdminLTE App -->
	<script src="views/dist/js/adminlte.js"></script>
	<!-- DataTables -->
	<script src="views/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="views/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="views/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
	<script src="views/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
  	<!--Sweet Alert-->
  	<script src="views/plugins/sweetalert2/sweetalert2.all.js"></script>	

</head>

<body class="hold-transition sidebar-mini layout-fixed sidebar-collapse">
  
	<div class="wrapper">

		<?php

			if(isset($_SESSION['status']) && $_SESSION['status'] == 1){

				include "views/modules/frame/navbar.php";  
				include "views/modules/frame/sidebar.php";  

				if(isset($_GET['route'])){

					$route = $_GET['route'];

					if(
						$route == 'usuarios' || 
						$route == 'vacantes' || 
						$route == 'clientes' || 
						$route == 'nueva-tarea' || 
						$route == 'mis-tareas' || 
						$route == 'todas-mis-tareas' || 
						$route == 'mis-tareas-creadas' || 
						$route == 'home' || 
						$route == 'login' || 
						$route == 'logout'
					)
					{

						include "views/modules/".$route.".php";

					}else{

						include "views/modules/404.php";

					}


				}else{

					include "views/modules/home.php";

				}

				include "views/modules/frame/footer.php";


			}else if(isset($_GET['route']) && $_GET['route'] == 'registro-candidatos'){

				include "views/modules/registro-candidatos.php";

			}
			
			else{

				include "views/modules/login.php";

			}

		?>

	</div>

	<!-- Scripts App -->
	<script src="app/app.js"></script>
	<script src="app/usuarios.js"></script>
	<script src="app/tareas.js"></script>
	<script src="app/clientes.js"></script>
	<script src="app/vacantes.js"></script>

</body>

</html>
