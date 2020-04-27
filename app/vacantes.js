$(document).ready(function(){

    $('#linkCopiado').hide();    

    // Crear Link de Registro
    $('.btnLinkRegistro').on('click',function(){
        $('#linkCopiado').hide();
        let id = $(this).attr('idVacante');
        let token = $(this).attr('tokenVacante');
        let hostURL = location.host;
        let idVacante = 'http://' + hostURL + '/prodesk/index.php?route=registro-candidatos&vacante='+id+'&token='+token;
        $('#linkVacante').val(idVacante);
        $('#btnGoLink').attr('href', idVacante);
    });

    // Copiar Link
    $('.btnCopiar').on('click',function(){
        $('#linkVacante').select();
        document.execCommand("copy");
        $('#linkCopiado').show();
    });

    // Ver Postulados
    $('.btnVerPostulados').on('click',function(){

        id = $(this).attr('idVacante');
        const espectativa = parseInt($(this).attr('espectativaEco'));
        
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
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-envelope"></i></span> e-mail: ${candidato.can_email}</li>
                                                    <li class="small"><span class="fa-li"><i class="fas fa-lg fa-phone"></i></span>  telefono: + ${candidato.can_telefono}</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="card-footer">
                                    <div class="text-right">
                                        <a href="${candidato.can_cv}" target="_blank" class="btn btn-sm bg-teal">
                                            <i class="fas fa-eye"></i> Ver CV
                                        </a>
                                        <a href="index.php?route=accionar-candidato&idVacante=${id}&idCandidato=${candidato.can_id}&espectativa=${espectativa}" target="_blank" class="btn btn-sm btn-primary">
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
       
    });

});