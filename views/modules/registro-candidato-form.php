<?php
    $idVacante = $_GET['vacante'];
?>
<div class="col-md-6 offset-md-3 mt-2">
    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Nuevo Registro</h3>
            </div>
            <div class="card-body">
                <p class="lead f-13">Por favor complete todos los datos solicitados, si no cuenta con todos los datos en este momento, puede regresar despues con el link prorporcionado</p>
                <div class="row">
                    <div class="col-md-10 offset-1">
                        <div class="card card-info">
                            <div class="card-header">
                                <h3 class="card-title">Datos Generales</h3>
                            </div>   
                            <form class="form-horizontal f-14" method="post" enctype="multipart/form-data" action="">
                                
                                <input type="hidden" value="<?=$idVacante?>" name="idVacante">

                                <div class="card-body">
                                    <div class="form-group row">
                                        <label for="apellidos" class="col-sm-4 col-form-label">Apellidos</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="apellidos" name="apellidos" placeholder="Apellidos" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="nombre" class="col-sm-4 col-form-label">Nombre</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control form-control-sm" id="nombre" name="nombre" placeholder="Nombre" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="email" class="col-sm-4 col-form-label">Correo Electronico</label>
                                        <div class="col-sm-8">
                                            <input type="email" class="form-control form-control-sm" id="email" name="email" placeholder="ej. correo@correo.com" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="telefono" class="col-sm-4 col-form-label">Numero Telefonico</label>
                                        <div class="col-sm-8">
                                            <input type="number" class="form-control form-control-sm" id="telefono" name="telefono" placeholder="ej. 5510203040" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="fechaNacimiento" class="col-sm-5 col-form-label">Fecha Nacimiento</label>
                                        <div class="col-sm-7">
                                            <input type="date" class="form-control form-control-sm" id="fechaNacimiento" name="fechaNacimiento" required>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="gradoEstudios" class="col-sm-5 col-form-label">Ultimo Grado de Estudios</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="gradoEstudios" name="gradoEstudios" required>
                                                <option value="">Seleccione Grado</option>
                                                <option value="Bachillerato">Bachillerato</option>
                                                <option value="Carrera Tecnica">Carrera Tecnica</option>
                                                <option value="Licenciatura / Ingenieria">Licenciatura / Ingenieria</option>
                                                <option value="Maestria / Postgrado">Maestria / Postgrado</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row">
                                        <label for="tipoGradoEstudios" class="col-sm-5 col-form-label">Estatus Grado de Estudios</label>
                                        <div class="col-sm-7">
                                            <select class="form-control form-control-sm" id="tipoGradoEstudios" name="tipoGradoEstudios" required>
                                                <option value="">Seleccione Estatus</option>
                                                <option value="Trunco">Trunco</option>
                                                <option value="Concluida">Concluida</option>
                                                <option value="En Proceso">En Proceso</option>
                                            </select>
                                        </div>
                                    </div>

                                    <div class="form-group row" id="divGradoEstudios">
                                        <label for="tituloGradoEstudios" class="col-sm-5 col-form-label">Titulo Grado de Estudios</label>
                                        <div class="col-sm-7">
                                            <input type="text" class="form-control form-control-sm" id="tituloGradoEstudios" name="tituloGradoEstudios" placeholder="ej. Ingeniero Industrial">
                                        </div>
                                    </div>

                                    <div class="input-group row">
                                        <label for="cv" class="col-sm-5 col-form-label">Cargue su CV</label>
                                        <div class="col-sm-7">
                                            <input type="file" class="form-control-file form-control-sm" name="cv" id="cv" accept=".pdf, .doc, .docx" required>
                                            <small  class="form-text text-muted">
                                                Solo en Formato PDF o Word, maximo 5 MB
                                            </small>
                                        </div>    
                                    </div>
                                </div>

                                <div class="card-footer text-right">
                                    <button type="submit" class="btn btn-info btn-sm">Enviar Datos</button>
                                </div>
                                <?php
                                    $nuevoRegistro = new ControladorVacantes();
                                    $nuevoRegistro -> ctrCrearPostulante();
                                ?>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <p class="text-success f-12">Al hacer click en Enviar Datos se acepta el acceso a la informacion proporcionada, la cual solo se ocupara para fines de contacto y esta no sera compartida con otras empresas o instituciones.</p>
            </div>    
        </div>
    </section>
</div>

<script>

   $(document).ready(function(){

        $('#divGradoEstudios').hide();

         // Mostar / Ocultar Campo Titulo Grado Estudios
        $('#gradoEstudios').on('change', function() {

        let valor = $(this).val();
        
        if(valor == 'Carrera Tecnica'){

            $('#divGradoEstudios').show();
            $("#tituloGradoEstudios").attr("required", "");

        }else if(valor == 'Licenciatura / Ingenieria'){

            $('#divGradoEstudios').show();
            $("#tituloGradoEstudios").attr("required", "");

        }else if(valor == 'Maestria / Postgrado'){

            $('#divGradoEstudios').show();
            $("#tituloGradoEstudios").attr("required", "");

        }else{

            $('#divGradoEstudios').hide();
            $("#tituloGradoEstudios").removeAttr("required");

        }

        });

   });

</script>

