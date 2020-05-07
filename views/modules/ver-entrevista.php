<?php

if(isset($_GET['idEntrevista'])){

    $id = $_GET['idEntrevista'];
    $entrevista = ControladorEntrevistas::ctrBuscarEntrevista($id);
    
    if($entrevista){

        $vacante = ControladorVacantes::ctrBuscarVacanteConCliente($entrevista["ent_vac_id"]);
        $candidato = ControladorVacantes::ctrBuscarCandidato($entrevista["ent_candidato"]);

    }else{

        echo '
            <script>    
                window.location = "404";
            </script>  
        ';

    }


}else{

    echo '
        <script>    
            window.location = "404";
        </script>  
    ';
}

?>

<div class="content-wrapper">

	<section class="content-header">
	    <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
		    <div class="row mb-2">
		        <div class="col-sm-6">
		          	<h1>Entrevista</h1>
		        </div>
		        <div class="col-sm-6">
			        <ol class="breadcrumb float-sm-right">
			            <li class="breadcrumb-item"><a href="home">Home</a></li>
			            <li class="breadcrumb-item active">Entrevista</li>
			        </ol>
		        </div>
		    </div>
	    </div>
	</section>

    <section class="content">
        <div class="row">
         
			<div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title"><a type="button" data-card-widget="collapse" class="text-muted">Entrevista</a></h3>
                        </div>
                        <div class="card-body">

                            <?php
                                echo "<br>Entrevista<br>";
                                var_dump($entrevista);
                                echo "<br>Vacante<br>";
                                var_dump($vacante);
                                echo "<br>Candidato<br>";
                                var_dump($candidato);
                            ?>
                            
                        </div>
                        <div class="card-footer">

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>