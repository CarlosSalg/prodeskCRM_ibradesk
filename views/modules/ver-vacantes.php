<?php

$vacantes = ControladorVacantes::ctrMostrarVacantesConCliente();   
$totalVacantes = count($vacantes);

$cantidadPorEstatus = ControladorVacantes::ctrCantidadPorEstatus();

?>

<div class="content-wrapper">
    <!-- Titutlo -->
    <section class="content-header">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Vacantes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Vacantes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <!-- Widget -->
    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
                <div class="row my-3">
                    <div class="col-md-3 offset-2">
                        <a href="">
                            <i class="fas fa-download"></i> Descargar Informe
                        </a>
                    </div>
                    <div class="col-md-3">
                        <div class="form-inline d-block">
                            <div class="input-group input-group-sm">
                                <select class="form-control" id="inputTipoVacante">
                                    <option value="vacantes_abiertas">Vacantes abiertas</option>
                                    <option value="vacantes_pendientes">Vacantes pendientes</option>
                                    <option value="vacantes_cerradas">Vacantes cerradas</option>
                                    <option value="todas_vacantes">Todas las vacantes</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="form-inline d-block">
                            <div class="input-group input-group-sm">
                                <input class="form-control" id="txtBuscarVacante" type="text" placeholder="Buscar por titulo" aria-label="Search">
                                <div class="input-group-append">
                                    <span class="btn btn-info" id="btnBuscarVacante">
                                        <i class="fas fa-search"></i>
                                    </span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="small-box bg-info">
                                    <div class="inner">
                                        <h3><?=$cantidadPorEstatus[0][0]?></h3>
                                        <p>Vacantes Abiertas</p>
                                    </div>
                                    <a href="#" class="small-box-footer" type="button" data-toggle="modal" data-target="#modalNuevaVacante">
                                        <i class="fas fa-plus"></i> Crear una nueva 
                                    </a>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="small-box bg-secondary">
                                    <div class="inner">
                                        Vacantes Abiertas <span class="float-right"><?=$cantidadPorEstatus[0][0]?></span><br>
                                        Vacantes Pendientes <span class="float-right"><?=$cantidadPorEstatus[1][0]?></span><br>
                                        Vacantes Cerradas <span class="float-right"><?=$cantidadPorEstatus[2][0]?></span><br>
                                    </div>
                                    <b class="small-box-footer">
                                        Total Vacantes <span class=""><?=$totalVacantes?></span><br>
                                    </b>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-10" id="contenedor-vacantes">

                    </div>

                </div>    
            </div>
        </div>
    </section>
  
    <!-- Vacantes -->
    <section class="content">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

            

        </div>
    </section>

</div>

<!--Modal modalNuevaVacante-->
<div class="modal fade" id="modalNuevaVacante" tabindex="-1" role="document" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">
            <form method="post" enctype="multipart/form-data">
                <!--Titulo Modal-->
                <div class="modal-header">
                    <h5>Nueva Vacante</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                
                <!--Cuerpo Modal-->
                <div class="modal-body f-13">

                    <div class="row">
                        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-book"></i>
                                </span>
                                <input type="text" class="form-control" placeholder="Titulo de la Vacante" name="tituloVacante" required>
                            </div>
                            <br>
                            <div class="input-group">
                                <span class="input-group-text">
                                    <i class="fa fa-list"></i>
                                </span>
                                <textarea style="resize:none;" rows="5" class="form-control" placeholder="Descripcion de la Vacante" name="descripcionVacante" required></textarea>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-map-marker"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Zona de Trabajo" name="zonaVacante" required>
                                    </div>
                                </div>
                                <div class="col-md-6">

                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-dollar-sign"></i>
                                        </span>
                                        <input type="number" class="form-control" placeholder="Sueldo Ofertado" name="sueldoVacante" required>
                                    </div>
                                
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fa fa-user"></i>
                                        </span>
                                        <select name="clienteVacante" class="form-control" required>
                                            <option value="">Seleccionar Cliente</option>
                                            <?php
                                                $clientes = ControladorClientes::ctrMostrarClientes();
                                                
                                                foreach($clientes as $key => $cliente){

                                                    echo '<option value="'.$cliente['cli_id'].'">'.$cliente['cli_nombre_comercial'].'</option>';

                                                }
                                            ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">
                                            <i class="fas fa-link"></i>
                                        </span>
                                        <input type="text" class="form-control" placeholder="Link OCC" name="linkVacante">
                                    </div>
                                
                                </div>
                            </div>

                        </div>
                    </div>
                            
                </div>
                
                <!--Pie de Modal-->
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                    $crearVacante = new ControladorVacantes();
                    $crearVacante -> ctrCrearVacante();
                ?>
            </form>
	    </div>
	</div>
</div>

<!--Modal modalLinkRegistro-->
<div class="modal fade" id="modalLinkRegistro" tabindex="-1" role="document" aria-hidden="true">
	<div class="modal-dialog modal-md" role="document">
	    <div class="modal-content">

            <!--Titulo Modal-->
            <div class="modal-header">
                <h5>Link Registro</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!--Cuerpo Modal-->
            <div class="modal-body f-13">

                <p class="lead f-14">Utilice el siguiente link, compartalo con los candidatos para que se registren y obtenga sus datos</p>

                <div class="input-group">
                    <span class="input-group-text">
                        <i class="fas fa-link"></i>
                    </span>
                    <input type="text" class="form-control" placeholder="Link OCC" name="linkVacante" id="linkVacante" readonly>
                </div>  
                <br>
                <div class="text-success" id="linkCopiado">
                    Link copiado al portapapeles
                </div>
                        
            </div>
            
            <!--Pie de Modal-->
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-secondary">Salir</button>
                <a href="" target="_blank" class="btn btn-secondary" id="btnGoLink">Ir al Link</a>
                <button type="button" class="btn btn-primary" onclick="btnCopiarLink()"><i class="fas fa-copy"></i> Copiar Link</button>
            </div>
	    </div>
	</div>
</div>

<!--Modal modalPostulantes-->
<div class="modal fade" id="modalPostulantes" tabindex="-1" role="document" aria-hidden="true">
	<div class="modal-dialog modal-lg" role="document">
	    <div class="modal-content">

            <!--Titulo Modal-->
            <div class="modal-header">
                <h5>Candidatos</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            
            <!--Cuerpo Modal-->
            <div class="modal-body f-13">          
                <div class="row d-flex align-items-stretch" id="contenedorCandidatos">


                </div>
            </div>
            
            <!--Pie de Modal-->
            <div class="modal-footer">
                <button type="button" data-dismiss="modal" class="btn btn-primary btnCopiar">Salir</button>
            </div>
	    </div>
	</div>
</div>
