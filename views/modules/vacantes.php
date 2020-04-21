<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
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

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Vacantes</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <button type="button" data-toggle="modal" data-target="#nuevoUsuario" class="btn btn-primary mb-3 btn-sm">
                    <i class="fa fa-plus"></i> Nueva Vacante
                </button>

                <table class="table table-striped table-hover f-13 tabla dt-responsive">
                <thead class="text-center">
                    <tr>
                    <th style="width: 5%;">Id</th>
                    <th style="width: 20%;">Nombre</th>
                    <th style="width: 15%;">Usuario</th>
                    <th>Roll</th>
                    <th>Ultimo Acceso</th>
                    <th>Estatus</th>
                    <th style="width: 10%;">Acciones</th>
                    </tr>
                </thead>

                <tbody class="text-center">
                    
                    <?php 

                    $usuarios = ControladorUsuarios::ctrMostrarUsuarios();

                    foreach ($usuarios as $key => $usuario) {

                        echo '

                        <tr>
                            <td>'.$usuario["usu_id"].'</td>
                            <td>'.$usuario["usu_nombre"].'</td>
                            <td>'.$usuario["usu_usuario"].'</td>
                            <td>'.$usuario["usu_roll"].'</td>
                            <td>'.$usuario["usu_ultimo_login"].'</td>
                            <td>';

                            if($usuario["usu_estatus"] == 1 ){

                            echo '<button class="btn btn-success btn-sm btnEstatus f-12" estatusUsuario="0" idUsuario="'.$usuario["usu_id"].'">Activado</button>';

                            }else{

                            echo '<button class="btn btn-warning btn-sm btnEstatus f-12" estatusUsuario="1" idUsuario="'.$usuario["usu_id"].'">Desactivado</button>';

                            }

                        echo '  

                            </td>
                            <td>
                            <div class="btn-group">
                                <button class="btn-sm btn btn-warning btn-sm btnEditar" idUsuario="'.$usuario["usu_id"].'" type="button" data-toggle="modal" data-target="#modalEditarUsuario">
                                <i class="fa fa-edit"></i>
                                </button>
                                <button class="btn-sm btn btn-danger btn-sm btnEliminar" idUsuario="'.$usuario["usu_id"].'">
                                <i class="fa fa-trash-alt"></i>
                                </button>
                            </div>
                            </td>
                        </tr>

                        ';
                    }

                    ?>      

                </tbody>
                </table>

            </div>
        </div>
    </section>
</div>
