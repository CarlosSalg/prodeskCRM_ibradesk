$(document).ready(function(){

    $('#linkCopiado').hide();    

    // Crear Link de Registro
    $('.btnLinkRegistro').on('click',function(){
        $('#linkCopiado').hide();
        let id = $(this).attr('idVacante');
        let token = $(this).attr('tokenVacante');
        let idVacante = 'http://localhost:8080/prodesk/index.php?route=registro-candidatos&vacante='+id+'&token='+token;
        $('#linkVacante').val(idVacante);
    });

    // Copiar Link
    $('.btnCopiar').on('click',function(){
        $('#linkVacante').select();
        document.execCommand("copy");
        $('#linkCopiado').show();
    });

});