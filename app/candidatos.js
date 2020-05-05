$(document).ready(function(){

    // Descartar Candidato
    $('.btnDescartarCandidato').on('click', function(){

        id = $(this).attr('idCandidato');
        swal({
            title: 'Estas Seguro?',
            text: "Confirma para descartar candidato!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, descartar!'
        }).then((result) => {
            if (result.value) {
                
                $.post('controllers/candidatos/descartar-candidato.php',{id}, function(res){

                    if(res){

                        swal({
                            title: 'Descartado',
                            text: "Candidato descartado",
                            type: 'info',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok!'
                          }).then((result) => {

                                location.reload();
                            
                          })

                        

                    }else{

                        alert('Existio un error en la conexion, contacte al Administrador');

                    }
        
                });
                
            }
        })
    });

    // Reactivar Candidato
    $('.btnActivarCandidato').on('click', function(){

        id = $(this).attr('idCandidato');
        swal({
            title: 'Estas Seguro?',
            text: "Confirma para Reactivar candidato!",
            type: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Si, Reactivar!'
        }).then((result) => {
            if (result.value) {
                
                $.post('controllers/candidatos/reactivar-candidato.php',{id}, function(res){

                    if(res){

                        swal({
                            title: 'Reactivado',
                            text: "Candidato reactivado",
                            type: 'info',
                            confirmButtonColor: '#3085d6',
                            confirmButtonText: 'Ok!'
                          }).then((result) => {

                                location.reload();
                            
                          })

                        

                    }else{

                        alert('Existio un error en la conexion, contacte al Administrador');

                    }
        
                });
                
            }
        })

    });

});