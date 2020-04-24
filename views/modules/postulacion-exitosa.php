<?php
    if(isset($_GET['nombre']) && isset($_GET['email']) && isset($_GET['idRegistro'])){

        $candidato = $_GET['nombre'];
        $email = $_GET['email'];
        $idRegistro = $_GET['idRegistro'];

    }else{

        $candidato = "";
        $email = "";
        $idRegistro =  "";
    }  
?>
<div class="col-md-8 offset-md-2 mt-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3>Gracias, ¡hemos recibido tus datos!</h3>
            </div>
            <div class="card-body">
                <div class="jumbotron">
                    <div class="row">	
                        <div class="col-md-8">
                            <h1>¡Hola!</h1>
                            <p class="lead">Recibimos tus datos exitosamente ¡<b class="text-info"><?=$candidato?></b>!</p>
                        </div>
                        <div class="col-md-4 text-center d-none d-sm-none d-md-block">
                            <img src="views/img/template/logo-lineal-negro.png" alt="logo" class="logo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead">Este es tu ID de Registro</p><h2 class="text-info"><?=$idRegistro?></h2> <p class="lead">Por favor proprocionalo a la persona que te dio este Link, tambien lo hemos enviado por correo a la cuenta de: <b class="text-info"><?=$email?></b></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>