<?php 


class Users{

	public static function ctrLogin(){

		if(isset($_POST['loginEmail'])){

			$mail = $_POST['loginEmail'];
			$password = $_POST['loginPassword'];

			if($mail == 'admin@admin' && $password == 'admin'){

				$_SESSION['status'] = 1;
				$_SESSION['user'] = 'admin';


				echo '
					<script>
						window.location = "home";
					</script>
				';

			}else{

				echo '
					<div class="mt-3 alert alert-danger">
						Acceso incorrecto
					</div>
				';

			}


		}

	}

}