$(document).ready(function(){

	// Eliminar Cliente

	$('.btnEliminarCliente').on('click', function(){

		let idCliente = $(this).attr('idCliente');
		
		swal({
        title: '¿Estas seguro que quieres Eliminar?',
        text: 'Los cambios no pueden revertirse',
        showCancelButton: true,
        confirmButtonColor: '#d33',
        cancelButtonColor: '#3085d6',
        cancelButtonText: 'Cancelar',
        confirmButtonText: 'Eliminar'

	    }).then(function(result){

	    	if(result.value){

		        $.post('controllers/clientes/eliminar-cliente.php',{idCliente}, function(response){
					swal({
					  	position: 'center',
					  	type: 'success',
					  	title: 'Elemento eliminado correctamente',
					}).then(function(result){
		                    if(result.value){

		                        window.location = 'clientes';
		                    }
		                });
				});
			}	

	    })

	})

});