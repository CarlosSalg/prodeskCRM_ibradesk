<?php
    if(isset($_GET['nombre']) && isset($_GET['email'])){

        $candidato = $_GET['nombre'];
        $email = $_GET['email'];
    }else{

        $candidato = "";
        $email = "";
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
                            <h1>Hola!</h1>
                            <p class="lead">Recibimos tus datos exitosamente <b class="text-info"><?=$candidato?></b>, te estaremos contactando a la brevedad</p>
                        </div>
                        <div class="col-md-4 text-center">
                            <img src="views/img/template/logo-lineal-negro.png" alt="logo" class="logo">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <p class="lead">Hemos enviado un correo a la cuenta de: <b class="text-info"><?=$email?></b>, con el Id del registro</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>