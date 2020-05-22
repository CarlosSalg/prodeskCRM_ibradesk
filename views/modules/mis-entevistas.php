<div class="content-wrapper">

	<section class="content-header">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mis Entrevistas</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
						<li class="breadcrumb-item active">Entrevistas</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
		<div class="row">
			<div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
				
				<!-- Seccion de Widgets con Informacion -->
				<?php include "views/modules/widgets/dash-entrevistas.php"; ?>
				
				<!-- Seccion de Tareas -->
				<div class="row mt-3">
					<div class="col-md-12">
						<div class="card f-13">
							<div class="card-header bg-gradient-info">
								<h3 class="card-title">Entrevistas</h3>
								<div class="card-tools">
									<button type="button" class="btn btn-tool" data-card-widget="collapse">
										<i class="fas fa-minus"></i>
									</button>
								</div>
							</div>
							<div class="card-body">
								<a href="nueva-tarea" class="btn btn-sm btn-info mb-3" type="button" data-toggle="modal" data-target="#modalNuevaEntrevista">
									<i class="fas fa-plus"></i> Nueva Entrevista
								</a>
								<table class="f-14 table table-hover tabla">
									<thead class="bg-gradient-gray-dark">
										<tr>
											<th style="width:5%" class="text-center">#</th>
											<th style="width:18%">Vacante</th>
											<th style="width:17%">Candidato:</th>
                                            <th style="width:15%" class="text-center">Cuando:</th>
											<th style="width:10%" class="text-center">Inicio:</th>
                                            <th style="width:10%" class="text-center">Fin:</th>
											<th style="width:10%" class="text-center">Estatus:</th>
											<th style="width:15%" class="text-center">Acciones:</th>
										</tr>
									</thead>
                                    <tbody id="tablaTareas">
                                    <?php

                                        $entrevistas = ControladorEntrevistas::ctrMostrarEntrevistasProgramadas($_SESSION['id']);

                                        foreach($entrevistas as $key => $entrevista){

                                            $diaEntrevista = Funciones::TimempoEntrevista($entrevista["ent_fecha"]);
                                            $fecha2 = Funciones::ConvertirFechaCortaHaciaFechaCorta($entrevista["ent_fecha"]);
                                            $clase = 'badge badge-secondary';
                                            
                                            if($diaEntrevista == 'hoy'){
                                                $clase = 'badge badge-success';
                                            }

                                            if($diaEntrevista == 'mañana'){
                                                $clase = 'badge badge-warning';
                                            }

                                            echo '

                                                <tr>
                                                    <td class="text-center">'.$entrevista["ent_id"].'</td>
                                                    <td>'.$entrevista["vac_titulo"].'</td>
                                                    <td>'.ucwords($entrevista["can_nombre"]).' '.ucwords($entrevista["can_apellidos"]).'</td>
                                                    <td class="text-center">'.$fecha2.' <span class="'.$clase.'">'.$diaEntrevista.'</span></td>
                                                    <td class="text-center">'.$entrevista["ent_hora_inicio"].'</td>
                                                    <td class="text-center">'.$entrevista["ent_hora_fin"].'</td>
                                                    <td class="text-center">'.ucfirst($entrevista["ent_estatus"]).'</td>
                                                    <td class="text-center">
                                                        <div class="btn-group">
                                                            <button class="btn btn-outline-info btn-sm btnEditarEntrevista" type="button" data-toggle="modal" data-target="#modalEditarEntrevista">
                                                                <i class="fa fa-edit"></i>
                                                            </button>
                                                            <a class="btn btn-info btn-sm" href="'.$entrevista["ent_id"].'" style="color:white;">
                                                                <i class="fa fa-clock"></i> Iniciar
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                            
                                            
                                            ';

                                        }

                                    ?>
									</tbody>
								</table>
							</div>
						</div>
					</div>
				</div>

			</div>
		</div>
    </section>
</div>

<!--Modal modalEditarEntrevista-->
<div class="modal fade" id="modalEditarEntrevista" tabindex="-1" role="document" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
	    <div class="modal-content">
	  		<div class="modal-header">
	    		<h5>Editar Entrevista</h5>
	    		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
	      		<span aria-hidden="true">&times;</span>
	    		</button>
	  		</div>
	  		<div class="modal-body f-13">
				
	  		</div>
			<!--Pie de Modal-->
	  		<div class="modal-footer">
		        <button type="button" class="btn btn-primary" data-dismiss="modal">Salir</button>
		    </div>
	    </div>
	</div>
</div>