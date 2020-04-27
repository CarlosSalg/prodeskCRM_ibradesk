<div class="content-wrapper">
  
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Accionar Candidato</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item"><a href="vacantes">Vacantes</a></li>
                        <li class="breadcrumb-item active">Accionar Candidato</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
                <div class="row">

                    <div class="col-md-12">
                        <?php

                            $id = $_GET['idVacante'];
                            $vacante = ControladorVacantes::ctrBuscarVacanteConCliente($id);   

                            if($vacante['vac_estatus'] == "abierta"){
                        
                                $clase = 'badge badge-warning';
                                
                            }
        
                            echo '
        
                                <div class="card bg-light collapsed-card">
        
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
                    <div class="col-md-12">
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

                                $espectativaEconomica = '<br><b>Espectativa Economica:</b> '.$candidato["can_espectativa_economica"].' <a class="text-danger">Superior a lo ofertado</a>';

                            }else{

                                $espectativaEconomica = '<br><b>Espectativa Economica:</b> '.$candidato["can_espectativa_economica"].'';

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
                                        <div class="card-footer">
                                            <div class="text-right">
                                                <a href="'.$candidato["can_cv"].'" target="_blank" class="btn btn-sm bg-teal">
                                                    <i class="fas fa-eye"></i> Ver CV
                                                </a>
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
