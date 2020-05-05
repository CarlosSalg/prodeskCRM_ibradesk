<div class="content-wrapper">

    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vacantes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Vacantes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

	<section class="content">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

            <?php
                
                foreach($vacantes as $key => $vacante){

                    $clase = "default";

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
            
                            <div class="card-footer">
            
                                <div class="text-right">
                                <div class="btn-group">
            
                                    <button class="btn btn-outline-info btn-sm btnLinkRegistro" tokenVacante="'.$vacante["vac_token_link"].'" idVacante="'.$vacante["vac_id"].'" type="button" data-toggle="modal" data-target="#modalLinkRegistro">
                                        <i class="fa fa-link"></i> Registro
                                    </button>

                                    <button class="btn btn-outline-info btn-sm btnVerPostulados" idVacante="'.$vacante["vac_id"].'" espectativaEco="'.$vacante["vac_sueldo_ofertado"].'" type="button" data-toggle="modal" data-target="#modalPostulantes">
                                        <i class="fa fa-eye"></i> Postulados
                                    </button>
                                            
                                    <button class="btn btn-info btn-sm btnNuevoFiltro" idVacante="'.$vacante["vac_id"].'" type="button" data-toggle="modal" data-target="#modalNuevoFiltro">
                                        <i class="fa fa-plus"></i> Filtro
                                    </button>
                                
                                </div>
                                </div>
            
                            </div>
            
                        </div>
                    
                    
                    ';

                }
                        
            ?>

        </div>
    </section>

</div>