/*Subiendo foto del usuario*/
$(".nuevaFoto").change(function(){

    var imagen = this.files[0];
    // Validar datos de formulario

    if(imagen["type"] != "image/jpeg" && imagen["type"] != "image/png" ){

        $(".nuevaFoto").val("");

        swal({

            type: "error",
            title: "Error al subir la imagen",
            text: "La imagen debe estar en formato JPG o PNG",
            confirmButtonText: "Cerrar"
        });


    }else if(imagen["size"] > 2000000){

        $(".nuevaFoto").val("");

        swal({

            type: "error",
            title: "Error al subir la imagen",
            text: "La imagen no debe ser mayor a 2MB",
            confirmButtonText: "Cerrar"
        });

    }else{

        var datosImagen = new FileReader;
        datosImagen.readAsDataURL(imagen);

        $(datosImagen).on("load", function(event){

            var rutaImagen = event.target.result;

            $(".previsualizar").attr("src", rutaImagen);

        })

    }
}) 

// Actualiar estatus de usuario
$(document).on('click', '.btnEstatus', function(){
	
	let estatusUsuario = $(this).attr('estatusUsuario');
	let idUsuario = $(this).attr('idUsuario');

	const datos = {
		estatusUsuario: estatusUsuario,
		idUsuario: idUsuario
	}

	$.post('controllers/usuarios/activar-usuario.php',datos, function(response){

	});

	if(estatusUsuario == 0){

		$(this).removeClass('btn-success');
		$(this).addClass('btn-warning');
		$(this).html('Desactivado');
		$(this).attr('estatusUsuario','1');
	

	}else{

		$(this).removeClass('btn-warning');
		$(this).addClass('btn-success');
		$(this).html('Activado');
		$(this).attr('estatusUsuario','0');

	}

});

// Eliminar Usuario
$(document).on('click', '.btnEliminar', function(){

	let idUsuario = $(this).attr('idUsuario');
	
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

	        $.post('controllers/usuarios/eliminar-usuario.php',{idUsuario}, function(response){
				swal({
				  	position: 'center',
				  	type: 'success',
				  	title: 'Elemento eliminado correctamente',
				}).then(function(result){
	                    if(result.value){

	                        window.location = 'usuarios';
	                    }
	                });
			});
		}	

    })
});

// Editar Usuario
$(document).on('click', '.btnEditar', function(){

	let idUsuario = $(this).attr('idUsuario');

	$.post('controllers/usuarios/editar-usuario.php',{idUsuario},function(response){

		let usuario = JSON.parse(response);
		let roll = usuario["usu_roll"];
		let template = '';

		if(roll == "Reclutador"){

			template = `<option value="Reclutador">Reclutador</option>
			        	<option value="Administrador">Administrador</option>`;

		}else{

			template = `<option value="Administrador">Administrador</option>
						<option value="Reclutador">Reclutador</option>`;

		}

		if(usuario["usu_foto"] != ""){

            $(".previsualizar").attr("src", usuario["usu_foto"]);
            $('#imagenActualRuta').val(usuario["usu_foto"]);
        
        }else{

        	$(".previsualizar").attr("src", "views/img/usuarios/default/anonymous.png");
            $('#imagenActualRuta').val("");	
        }

        $('#idUsuario').val(usuario["usu_id"]);
		$('#editarNombre').val(usuario["usu_nombre"]);
		$('#editarUsuario').val(usuario["usu_usuario"]);
		$('#passwordActual').val(usuario["usu_password"]);
		$('#editarRoll').html(template);

	})

});