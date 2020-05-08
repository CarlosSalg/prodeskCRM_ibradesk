$(document).ready(function(){

    // Funcion para llenar contenedor Vacantes
    llenarVacantes = function(vacantes){

        let templateVacantes = '';
        let clase = "default";
        
        if(vacantes.length > 0){

            vacantes.forEach(vacante => {

                if(vacante['vac_estatus'] == "abierta"){
                    
                    clase = 'badge badge-warning';
                    
                }

                if(vacante['vac_estatus'] == "pendiente"){
                    
                    clase = 'badge badge-secondary';
                    
                }

                if(vacante['vac_estatus'] == "cerrada"){
                    
                    clase = 'badge badge-success';
                    
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
                                        <a href="#" class="dropdown-item btnLinkRegistro" tokenVacante="${vacante["vac_token_link"]}" idVacante="${vacante["vac_id"]}" type="button" data-toggle="modal" data-target="#modalLinkRegistro">Link de registro</a>
                                        <a href="#" class="dropdown-item btnVerPostulados" idVacante="${vacante["vac_id"]}" espectativaEco="${vacante["vac_sueldo_ofertado"]}" type="button" data-toggle="modal" data-target="#modalPostulantes">Ver postulados</a>
                                        <div class="dropdown-divider"></div>
                                        <a href="#" class="dropdown-item btnNuevoFiltro" idVacante="${vacante["vac_id"]}" type="button" data-toggle="modal" data-target="#modalNuevoFiltro">Filtrar telefonicamente</a>
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
                                    $linkVacante}
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