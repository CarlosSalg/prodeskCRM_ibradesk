$(document).ready(function(){

    // Funcion para crear el Link del registro
    btnRegistro = function(id, token){

        $('#linkCopiado').hide();
        let hostURL = location.host;
        let idVacante = 'http://' + hostURL + '/prodesk/index.php?route=registro-candidatos&vacante='+id+'&token='+token;
        $('#linkVacante').val(idVacante);
        $('#btnGoLink').attr('href', idVacante);

    }

    // Funcion para llenar Contenedor Postulados
    btnPostulados = function(id, espectativaEco){

        const espectativa = parseInt(espectativaEco);
        
        // Solicitar Array de Postulados a la Base de Datos
        $.post('controllers/vacantes/ver-postulados.php',{id}, function(res){

            let candidatos = JSON.parse(res);
            let template = '';
            let templateSinRegistro = '<h2 class="lead">No existen postulados en esta Vacante</h2>';

            if(candidatos.length == 0){

                $('#contenedorCandidatos').html(templateSinRegistro);

            }else{

                candidatos.forEach(candidato => {

                    let titulo = '';
                    let espectativaEconomica = '';

                    if(candidato.can_titulo_grado_estudios == ""){
                        
                        titulo = `<b>Titulo:</b> Sin titulo`;

                    }else{
                        
                        titulo = `<b>Titulo:</b> ${candidato.can_titulo_grado_estudios}`;
                    }

                    if(candidato.can_espectativa_economica > espectativa){

                        espectativaEconomica = `<br><b>Espectativa Economica:</b> $${candidato.can_espectativa_economica} <a class="text-danger">Superior a lo ofertado</a>`;

                    }else{

                        espectativaEconomica = `<br><b>Espectativa Economica:</b> $${candidato.can_espectativa_economica}`;

                    }

                    template += `

                        <div class="col-sm-12 col-md-6">
                            <div class="card bg-light">
                                <div class="card-body pt-0">
                                    <div class="row">
                                        <div class="col-12 mt-3">
                                            <h2 class="lead text-capitalize"><b>${candidato.can_nombre} ${candidato.can_apellidos}</b></h2>
                                            ${titulo}
                                            <br><b>Grado Estudios:</b> ${candidato.can_grado_estudios} / ${candidato.can_tipo_grado_estudios}
                                            ${espectativaEconomica}
                                            <br><b>Id de registro:</b> ${candidato.can_id}
                                            <div class="mt-3">
                                                <ul class="ml-4 mb-0 fa-ul text-muted">
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-list"></i></span>  curriculum: <a href="${candidato.can_cv}" target="_blank" class="">Clic aqui</a></li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> e-mail: ${candidato.can_email}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>  telefono: + ${candidato.can_telefono}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="index.php?route=accionar-candidato&idVacante=${id}&idCandidato=${candidato.can_id}&espectativa=${espectativa}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-user"></i> Accionar
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    `;
                });
                $('#contenedorCandidatos').html(template);

            }

        });
    }

    // Funcion para copiar el Link
    btnCopiarLink = function(){

        $('#linkVacante').select();
        document.execCommand("copy");
        $('#linkCopiado').show();
    }

    // Funcion para llenar contenedor Vacantes
    llenarVacantes = function(vacantes){

        let templateVacantes = '';
        let clase = "default";
        
        if(vacantes.length > 0){

            vacantes.forEach(vacante => {

                let linkVacante = '';

                if(vacante['vac_estatus'] == "abierta"){
                    
                    clase = 'badge badge-success';
                    
                }

                if(vacante['vac_estatus'] == "pendiente"){
                    
                    clase = 'badge badge-warning';
                    
                }

                if(vacante['vac_estatus'] == "cerrada"){
                    
                    clase = 'badge badge-secondary';
                    
                }

                if(vacante['vac_link_occ'] != ''){

                    linkVacante = `
                        <a href="${vacante['vac_link_occ']}" target="_blank">Ver en portal</a>
                    `;
                }

                templateVacantes += `

                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">
                                <a type="button" data-card-widget="collapse" class="text-muted">Vacante: ${vacante["vac_id"]}</a>  ${vacante["vac_titulo"]} <span class="${clase}">${vacante["vac_estatus"]}</span>
                            </h4>
                            <div class="card-tools">
                                <div class="btn-group">
                                    <a type="button" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                        <i class="fas fa-bars"></i>
                                    </a>
                                    <div class="dropdown-menu float-left" role="menu" style="">
                                        <button class="dropdown-item" onclick="btnRegistro(${vacante["vac_id"]}, ${vacante["vac_token_link"]})" type="button" data-toggle="modal" data-target="#modalLinkRegistro"><i class="fas fa-link f-12"></i> Registro</button>
                                        <button class="dropdown-item" onclick="btnPostulados(${vacante["vac_id"]}, ${vacante["vac_sueldo_ofertado"]})" type="button" data-toggle="modal" data-target="#modalPostulantes"><i class="fas fa-users f-12"></i> Postulados</button>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item btnNuevoFiltro" idVacante="${vacante["vac_id"]}" type="button" data-toggle="modal" data-target="#modalNuevoFiltro"><i class="fas fa-phone f-12"></i> Filtro</a>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-4 text-muted f-13">
                                    Fecha Creacion: ${vacante["vac_fecha_creacion"]}
                                </div>
                                <div class="col-md-4 text-muted f-13">
                                    Zona Trabajo: ${vacante["vac_zona_trabajo"]}
                                </div>
                                <div class="col-md-4 text-muted f-13">
                                    Sueldo Ofertado: ${vacante["vac_sueldo_ofertado"]}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-12 f-13">
                                    Descripcion: 
                                    <br> 
                                    ${vacante["vac_descripcion"]}
                                    <br>
                                    <br>
                                    ${linkVacante}
                                </div>
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-md-3 text-muted f-13">
                                    Empresa: ${vacante["cli_nombre_comercial"]}
                                </div>
                                <div class="col-md-3 text-muted f-13">
                                    Contacto: ${vacante["cli_contacto_compras_nombres"]} ${vacante["cli_contacto_compras_apellidos"]}
                                </div>
                                <div class="col-md-3 text-muted f-13">
                                    Correo: ${vacante["cli_contacto_compras_correo"]}
                                </div>
                                <div class="col-md-3 text-muted f-13">
                                    Telefono: ${vacante["cli_contacto_compras_telefono"]}
                                </div>
                            </div>
                        </div> 

                    </div>
                `;

                $('#contenedor-vacantes').html(templateVacantes);

            });
        }else{

            let sinResultados = `

                <div class="text-center mt-md-5 text-info">
                    <i class="fas fa-search"></i> No se encontraron vacantes, revise la busqueda o pueda crear una nueva dando <a href="#" type="button" data-toggle="modal" data-target="#modalNuevaVacante">click aqui</a>.
                </div>            

            `;

            $('#contenedor-vacantes').html(sinResultados);

        }
    };

    // Funcion para Inicializar Vacantes
    InicializarVacantes = function(){

        let tipo = 'abiertas'
        $.post('controllers/vacantes/llenar-vacantes.php',{tipo},function(response){
    
            let vacantes = JSON.parse(response);
            llenarVacantes(vacantes);
    
        });

        let opciones = `

            <option value="vacantes_abiertas">Vacantes abiertas</option>
            <option value="vacantes_pendientes">Vacantes pendientes</option>
            <option value="vacantes_cerradas">Vacantes cerradas</option>
            <option value="todas_vacantes">Todas las vacantes</option>
        
        `;
        $('#inputTipoVacante').html(opciones);

    };

    // Funcion buscar similares
    buscarSimilares = function(dato){

        if(dato != ""){

            $.post('controllers/vacantes/buscar-vacantes.php',{dato},function(response){

                let vacantes = JSON.parse(response);
                llenarVacantes(vacantes);
                
            });

        }else{

            InicializarVacantes();



        }

    };

    // Ocultar div 
    $('#linkCopiado').hide();    
    // Inicializar vacantes
    InicializarVacantes();

    // Cambiar vistas de acuerdo a seleccion
    $('#inputTipoVacante').on('change', function(){

        let valor = $(this).val();
        let tipo = 'todas';

        if(valor == "vacantes_abiertas"){
            tipo = 'abiertas';
        }
        if(valor == "vacantes_pendientes"){
            tipo = 'pendientes';
        }
        if(valor == "vacantes_cerradas"){
            tipo = 'cerradas';
        }
        if(valor == "todas_vacantes"){
            tipo = 'todas';
        }

        $.post('controllers/vacantes/llenar-vacantes.php',{tipo},function(response){

            let vacantes = JSON.parse(response);
            llenarVacantes(vacantes);
    
        });

    });

    // Buscar Vacante por Titulo
    $('#txtBuscarVacante').keyup(function(){
        let buscar = $(this).val();
        buscarSimilares(buscar);
    });

});