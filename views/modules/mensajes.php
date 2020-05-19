<div class="content-wrapper">

    <section class="content-header">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Mensajes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Mensajes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

                <div class="row" style ="height:100%">
                    <div class="col-md-5" style ="height:100%">
                        <div class="card" style ="height:100%">
                            <div class="card-header bg-gradient-info">
                                <h3 class="card-title">Usuarios</h3>
                                <div class="card-tools">
								</div>
                            </div>
                            <div class="card-body direct-chat-messages">
                            <div class="input-group input-group-sm">
                                <input class="form-control form-control-navbar" type="search" placeholder="Buscar" aria-label="Search">
                            </div>

                            <div id="usuariosChat">
                                
                                <!-- Seccion Usuarios-->
                                <?php $usuarios = ControladorUsuarios::ctrMostrarUsuarios();?>
                                <?php forEach($usuarios as $key => $usuario): ?>
                                    <?php if($usuario['usu_id']!= $_SESSION['id']): ?>
                                        <?php if($usuario['usu_foto'] == ""){$foto = 'views/img/usuarios/default/anonymous.png';}else{$foto = $usuario['usu_foto'];} ?>
                                        <div idUsuario="<?=$usuario['usu_id']?>" class="btnIniciarChat usuarioSelect">
                                            <div class="card-header">
                                                <div class="user-block">
                                                    <img class="img-circle" src="<?=$foto?>" alt="user">
                                                    <span class="username"><a href="#"><?=$usuario['usu_nombre']?></a></span>
                                                    <span class="description"><?=$usuario['usu_usuario']?></span>
                                                </div>
                                            </div>
                                        </div>
                                    <?php endif; ?>
                                <?php endforeach; ?>

                            </div>

                            </div>
                        </div>
                    </div>
                    <div class="col-md-7" style ="height:100%">
                        <div class="card" style ="height:100%">
                            <div class="card-header bg-gradient-info">
                                <h3 class="card-title" id="tituloMensaje">Conversacion</h3>
                                <div class="card-tools">
                                    <button href="#" class="btn btn-tool actualizarHistorial">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">

                                <div id="chatActivo" style="display:none;">

                                    <div class="card-header">
                                        <div class="user-block">
                                            <img class="img-circle" src="" alt="user" id="imgUsuarioChat">
                                            <span class="username"><a href="#" id="nombreUsuarioChat"></a></span>
                                            <span class="description" id="correoUsuarioChat"></span>
                                        </div>
                                    </div>
                                    
                                    <!-- Seccion Chat-->
                                    <div class="direct-chat-messages f-14" id="contenedorChat">
                                    </div>    
                                    <hr>
                                    <div class="row">
                                        <input id="usuarioEmisor" type="hidden" value="<?php echo $_SESSION['id']; ?>" readonly>
                                        <input id="usuarioFoto" type="hidden" value="<?php echo $_SESSION['foto']; ?>" readonly>
                                        <input id="usuarioReceptor" type="hidden" readonly>
                                        <div class="input-group input-group-sm mt-3">
                                            <input placeholder="Mensaje" id="txtNuevoChat" rows="3" class="form-control d-block" style="resize:none;">
                                            <span class="input-group-append">
                                                <button class="btn btn-sm btn-info btn-block" id="btnEnviarNuevoChat" >Enviar</button>   
                                            </span>
                                        </div>

                                    </div>
                                    <div class="row mt-2">
                                        <div class="col-md-12 alert alert-warning f-13" id="errorChat" style="display:none;">
                                        </div>
                                    </div>
                                </div>

                                <div id="chatInActivo">
                                    <p>Ningun chat o usuario seleccionado</p>
                                    <i class="far fa-comments"></i>
                                    <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                                </div>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</div>
