$(document).ready(function(){

    // Funcion para traer historial del chat
    const HistorialChat = function(){

        let datos = {
            idEmisor: $('#usuarioEmisor').val(),
            idReceptor: $('#usuarioReceptor').val(),
        }

        $.post('controllers/mensajes/obtener-historial.php', datos, function(response){
            
            let template = '';
            let chats = JSON.parse(response);
            id = $('#usuarioEmisor').val();
            fotoEmisor = $('#usuarioFoto').val();

            if(chats.length > 0 ){

                chats.forEach(chat => {

                    var imagen = 'views/img/usuarios/default/anonymous.png';
                    let fecha = new Date(chat.men_fecha);
                    console.log(fecha);
                    
    
                    if(chat.usu_foto != ""){
    
                        imagen = chat.usu_foto;
                        
                    }
    
                    if(chat.men_usu_emisor == id){
    
                        template += `

                            <div class="direct-chat-msg right">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-right">${chat.usu_nombre}</span><br>
                                </div>
                                <img class="direct-chat-img" src="${fotoEmisor}" alt="message user image">
                                <div class="direct-chat-text bg-gradient-info">
                                    ${chat.men_texto}
                                </div>
                                <span class="direct-chat-timestamp float-left">${chat.men_fecha} ${chat.men_hora}</span>
                            </div>
    
        
                        `;
    
                    }else{
    
                        template += `
    
                            <div class="direct-chat-msg">
                                <div class="direct-chat-infos clearfix">
                                    <span class="direct-chat-name float-left">${chat.usu_nombre}</span>
                                </div>
                                <img class="direct-chat-img" src="${imagen}" alt="message user image">
                                <div class="direct-chat-text">
                                    ${chat.men_texto}
                                </div>
                                <span class="direct-chat-timestamp float-right">${chat.men_fecha} ${chat.men_hora}</span>
                            </div>
    
                        `;
                    }
    
                })



            }else{

                template += `
    
                    <div class="text-muted">
                        No existe un historial de mensajes con este contacto, puedes enviarle uno e iniciar una conversacion.
                    </div>

                `;


            }



            $('#contenedorChat').html(template);

        })

    }

    // Function para enviar Mensaje
    const EnviarMensaje = function(){
        
        var fecha = new Date();
        var d    = fecha.getDate(),
            m    = fecha.getMonth(),
            y    = fecha.getFullYear(),
            hora    = fecha.getHours(),
            min    = fecha.getMinutes();
        let datos = {
            idEmisor: $('#usuarioEmisor').val(),
            idReceptor: $('#usuarioReceptor').val(),
            mensaje: $('#txtNuevoChat').val(),
            fecha: `${y}/${m}/${d}`,
            hora: `${hora}:${min}`,
        }
        $.post('controllers/mensajes/crear-mensaje.php', datos, function(){
            $('#txtNuevoChat').val('');
            HistorialChat();
        });

    }

    // Funcion para llenar el contenedor de usuarios:
    const llenarUsuariosChat = function(){

        let datos = {
            idEmisor: $('#usuarioEmisor').val(),
        }

        $.post('controllers/mensajes/obtener-usuarios-historial.php', datos, function(response){
            
            let template = '';
            let usuarios = JSON.parse(response);
            console.log(usuarios);
            id = $('#usuarioEmisor').val();
            fotoEmisor = $('#usuarioFoto').val();

            if(usuarios.length > 0 ){

                usuarios.forEach(chat => {

                    var imagen = 'views/img/usuarios/default/anonymous.png';
                    
                    if(chat.usu_foto != ""){
    
                        imagen = chat.usu_foto;
                        
                    }
    
                    if(chat.men_usu_emisor != id || chat.men_usu_receptor != id){


                            template += `

                                <div idUsuario="${chat.usu_id}" class="btnIniciarChat usuarioSelect">
                                    <div class="card-header">
                                        <div class="user-block">
                                            <img class="img-circle" src="${imagen}" alt="user">
                                            <span class="username"><a href="#">${chat.usu_nombre}</a></span>
                                            <span class="description">${chat.usu_usuario}</span>
                                        </div>
                                    </div>
                                </div>

                            `;    
                        
    
                    }

                })



            }else{

                template += `
    
                    <div class="text-muted">
                        No existe un historial de mensajes con este contacto, puedes enviarle uno e iniciar una conversacion.
                    </div>

                `;


            }



            $('#usuariosChat').html(template);

        })



    }



    // Iniciar Chat
    $('.btnIniciarChat').on('click', function(event){

        event.preventDefault();

        // Buscar Usuario
        let id = $(this).attr('idUsuario');
        $('#usuarioReceptor').val(id);

        $.post('controllers/usuarios/buscar-usuario.php',{id}, function(response){

            let usuario = JSON.parse(response);
            let titulo = `Conversacion con ${usuario.usu_nombre}`;
            let imagen = 'views/img/usuarios/default/anonymous.png';

            if(usuario.usu_foto != ""){
                imagen =  usuario.usu_foto;
            }

            $('#imgUsuarioChat').attr('src', imagen);
            $('#nombreUsuarioChat').html(usuario.usu_nombre);
            $('#correoUsuarioChat').html(usuario.usu_usuario);

            HistorialChat();

            $('#tituloMensaje').html(titulo);
            $('#chatInActivo').css("display", "none");
            $('#chatActivo').css("display", "inline");

        });
        
    })

    // Enviar Mensaje
    $('#btnEnviarNuevoChat').on('click', function(event){

        event.preventDefault();

        if($('#txtNuevoChat').val() != ""){
            $("#errorChat").css("display", "none");
            EnviarMensaje();

        }else{
            $("#errorChat").css("display", "inline");
            $("#errorChat").html('El campo mensaje no puede ir vacio');
        }
    })


    // Actualizar Historial
    $('.actualizarHistorial').on('click', function(event){

        event.preventDefault();
        HistorialChat();
        
    })

    HistorialChat();

})