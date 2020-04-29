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

	$('.btnEditarCliente').on('click', function(){

		idCliente = $(this).attr('idCliente');
		
		$.post('controllers/clientes/buscar-cliente.php',{idCliente}, function(response){

			cliente = JSON.parse(response);
			let template = '';

			if(cliente.cli_estatus == 'cliente_activo'){

				template += `
					<option value="cliente_activo">cliente_activo</option>
					<option value="cliente_inactivo">cliente_inactivo</option>
				`;

			}else{

				template += `
					<option value="cliente_inactivo">cliente_inactivo</option>	
					<option value="cliente_activo">cliente_activo</option>					
				`;

			}

			$('#idCliente').val(cliente["cli_id"]);
			$('#editarRazonSocial').val(cliente["cli_razon_social"]);
			$('#editarNombreComercial').val(cliente["cli_nombre_comercial"]);
			$('#editarStatusCliente').html(template);
			$('#editarContactoComprasNombre').val(cliente["cli_contacto_compras_nombres"]);
			$('#editarContactoComprasApellidos').val(cliente["cli_contacto_compras_apellidos"]);
			$('#editarContactoComprasCorreo').val(cliente["cli_contacto_compras_correo"]);
			$('#editarContactoComprasTelefono').val(cliente["cli_contacto_compras_telefono"]);
			
		});
		
		

	});

});