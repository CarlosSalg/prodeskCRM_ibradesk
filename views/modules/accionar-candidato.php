<?php
    $idUsuario = $_GET['idCandidato'];
    $nombreCandidato = ControladorVacantes::ctrBuscarCandidato($idUsuario);
?>

<div class="content-wrapper">
  
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-capitalize">Accionar <?=$nombreCandidato['can_nombre']?> <?=$nombreCandidato['can_apellidos']?></h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item"><a href="ver-vacantes">Vacantes</a></li>
                        <li class="breadcrumb-item active">Accionar Candidato</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="container">
            <div class="">
                <div class="row">

                    <div class="col-md-7">
                        <?php

                            $id = $_GET['idVacante'];
                            $vacante = ControladorVacantes::ctrBuscarVacanteConCliente($id);   

                            if($vacante['vac_estatus'] == "abierta"){
                        
                                $clase = 'badge badge-warning';
                                
                            }
        
                            echo '
        
                                <div class="card bg-light">
        
                                    <div class="card-header">
                                        <div class="row">
                                            <div class="col-md-9">
                                                <h4 class="card-title"><a type="button" data-card-widget="collapse" class="text-muted">Vacante: '.$vacante["vac_id"].'</a>  '.$vacante["vac_titulo"].' <span class="'.$clase.'">'.$vacante["vac_estatus"].'</span></h4>
                                            </div>
                                            <div class="col-md-3 text-right text-muted f-13">
                            ';
        
                                            if($vacante["vac_link_occ"] != ""){
        
                                                $linkVacante = '<a href="'.$vacante["vac_link_occ"].'" target="_blank" >Ver en OCC</a>';
                                            }else{
        
                                                $linkVacante = '<a class="text-muted">Sin Link</a>';
                                            }
        
                            echo '
                                            </div>
                                        </div>
                                    </div>
                    
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-md-4 text-muted f-13">
                                                Fecha Creacion: '.$vacante["vac_fecha_creacion"].'
                                            </div>
                                            <div class="col-md-4 text-muted f-13">
                                                Zona Trabajo: '.$vacante["vac_zona_trabajo"].'
                                            </div>
                                            <div class="col-md-4 text-muted f-13">
                                                Sueldo Ofertado: '.$vacante["vac_sueldo_ofertado"].'
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-12 f-13">
                                                Descripcion de la vacante: 
                                                <br> 
                                                '.$vacante["vac_descripcion"].'
                                                <br>
                                                <br>
                                                '.$linkVacante.'
                                            </div>
                                        </div>
                                        <hr>
                                        <div class="row">
                                            <div class="col-md-3 text-muted f-13">
                                                Empresa: '.$vacante["cli_nombre_comercial"].'
                                            </div>
                                            <div class="col-md-3 text-muted f-13">
                                                Contacto: '.$vacante["cli_contacto_compras_nombres"].' '.$vacante["cli_contacto_compras_apellidos"].'
                                            </div>
                                            <div class="col-md-3 text-muted f-13">
                                                Correo: '.$vacante["cli_contacto_compras_correo"].'
                                            </div>
                                            <div class="col-md-3 text-muted f-13">
                                                Telefono: '.$vacante["cli_contacto_compras_telefono"].'
                                            </div>
                                        </div>
                                    </div> 

                                </div>
                            ';
                                
                        ?>
                    </div>
                    <div class="col-md-5">
                        <?php

                            $idUsuario = $_GET['idCandidato'];
                            $espectativa = $_GET['espectativa'];
                            $candidato = ControladorVacantes::ctrBuscarCandidato($idUsuario);

                            if($candidato["can_titulo_grado_estudios"] == ""){
                                
                                $titulo = `<b>Titulo:</b> Sin titulo`;

                            }else{
                                
                                $titulo = '<b>Titulo:</b> '.$candidato["can_titulo_grado_estudios"].'';

                                
                            }

                            if($candidato["can_espectativa_economica"] > $espectativa){

                                $espectativaEconomica = '<br><b>Espectativa Economica:</b> $'.$candidato["can_espectativa_economica"].' <a class="text-danger">Superior a lo ofertado</a>';

                            }else{

                                $espectativaEconomica = '<br><b>Espectativa Economica:</b> $'.$candidato["can_espectativa_economica"].'';

                            }

                            echo '
                                <div class="col-sm-12 col-md-12">
                                    <div class="card bg-light">
                                        <div class="card-body pt-0">
                                            <div class="row">
                                                <div class="col-12 mt-3">
                                                    <h2 class="lead text-capitalize"><b>'.$candidato["can_nombre"].' '.$candidato["can_apellidos"].'</b></h2>
                                                    '.$titulo.'
                                                    <br><b>Grado Estudios:</b> '.$candidato["can_grado_estudios"].' / '.$candidato["can_tipo_grado_estudios"].'
                                                    '.$espectativaEconomica.'
                                                    <br><b>Id de registro:</b> '.$candidato["can_id"].'
                                                    <div class="mt-3">
                                                        <ul class="ml-4 mb-0 fa-ul text-muted">
                                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> e-mail: '.$candidato["can_email"].'</li>
                                                            <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>  telefono: + '.$candidato["can_telefono"].'</li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="card-footer text-right">
                                            <div class="text-right btn-group">
                                                <a href="'.$candidato["can_cv"].'" target="_blank" class="btn btn-sm btn-outline-info">
                                                    <i class="fas fa-eye"></i> Ver CV
                                                </a>
                            ';

                            if($candidato['can_estatus'] == 1){

                                echo '
                                                <button class="btn btn-sm btn-outline-info btnDescartarCandidato" idCandidato="'.$candidato["can_id"].'">
                                                    <i class="fas fa-times"></i> Descartar
                                                </button>
                                                <button class="btn btn-sm btn-info" type="button" data-toggle="modal" data-target="#modalCrearEntrevista">
                                                    <i class="fas fa-calendar"></i> Programar Entrevista
                                                </button>
                                ';
                            }else{

                                echo '
                                                <button class="btn btn-sm btn-info btnActivarCandidato" idCandidato="'.$candidato["can_id"].'">
                                                    <i class="fas fa-check"></i> Activar
                                                </button>
                                ';

                            }

                            echo '
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            ';
                        ?>
                    </div>
                    

                </div>

            </div>
        </div>
    </section>

    
</div>

<!--Modal modalCrearEntrevista-->
<div class="modal fade f-14" id="modalCrearEntrevista" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
    	<form method="post" enctype="multipart/form-data">
      		<div class="modal-header">
        		<h5 class="modal-title">Programar Entrevista</h5>
        		<button type="button" class="close" data-dismiss="modal" aria-label="Close">
          		<span aria-hidden="true">&times;</span>
        		</button>
      		</div>
      		<div class="modal-body">
				
				<div class="row">
                    <div class="col-md-6">
                        <label for="candidato">Candidato</label>
                        <div class="input-group">	        		
                            <span class="input-group-text">
                                <i class="fa fa-users"></i>
                            </span>
                            <select name="candidato" id="candidato" class="form-control form-control-sm text-capitalize" required="">
                                <option value="<?=$candidato["can_id"]?>"><?=$candidato["can_nombre"].' '.$candidato["can_apellidos"]?></option>
                            </select>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <label for="entrevistador">Entrevistador</label>
                        <div class="input-group">	        		
                            <span class="input-group-text">
                                <i class="fa fa-user"></i>
                            </span>
                            <select name="entrevistador" class="form-control form-control-sm text-capitalize" required="">
                                <option value="">Seleccione Entrevistador</option>
                                <?php
                                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios();
                                    foreach($usuarios as $key => $usuario){

                                        echo '<option value="'.$usuario['usu_id'].'">'.$usuario['usu_nombre'].'</option>';

                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-md-12">
                        <div class="row">
                            <div class="col-md-4">
                                <label for="fechaEntrevista">Fecha Inicio</label>
                                <div class="input-group">	        		
                                    <span class="input-group-text">
                                        <i class="fa fa-calendar"></i>
                                    </span>
                                    <input type="date" class="form-control form-control-sm" name="fechaEntrevista" id="fechaEntrevista" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="horaEntrevista">Hora Inicio</label>
                                <div class="input-group">	        		
                                    <span class="input-group-text">
                                        <i class="fa fa-clock"></i>
                                    </span>
                                    <input type="time" class="form-control form-control-sm" name="horaEntrevista"  id="horaEntrevista" required="">
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="horaEntrevistaFin">Hora Fin</label>
                                <div class="input-group">	        		
                                    <span class="input-group-text">
                                        <i class="fa fa-clock"></i>
                                    </span>
                                    <input type="time" class="form-control form-control-sm" name="horaEntrevistaFin"  id="horaEntrevistaFin" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <p class="text-muted mt-4">Notificaciones via E-mail</p>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-check">	        		
                            <input type="checkbox" class="form-check-input" name="notificarEntrevistador" id="notificarEntrevistador" checked="">
                            <label class="form-check-label" for="notificarEntrevistador">Entrevistador</label>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-check">	        		
                            <input type="checkbox" class="form-check-input" name="notificarCandidato" id="notificarCandidato">
                            <label class="form-check-label" for="notificarCandidato">Candidato</label>
                        </div>
                    </div>

                </div>
		    </div>
		    <div class="modal-footer">
		        <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
		        <button type="submit" class="btn btn-primary">Guardar</button>
		    </div>

            <?php
                
                $entrevista = new ControladorEntrevistas();
                $entrevista -> ctrCrearEntrevista();

            ?>

	    </form>
    </div>
  </div>
</div>
