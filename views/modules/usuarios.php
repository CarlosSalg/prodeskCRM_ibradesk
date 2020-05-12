<?php

    include "controllers/usuarios/admin-validation.php";

?>

<div class="content-wrapper">

  <section class="content-header">
    <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Administrar Usuarios</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="home">Home</a></li>
            <li class="breadcrumb-item active">Administrar Usuarios</li>
          </ol>
        </div>
      </div>
    </div>
  </section>

  <section class="content">
    <div class="card col-md-10 offset-md-1 col-xs-12 offset-sm-0">
      <div class="card-header">
        <h3 class="card-title">Administrar Usuarios</h3>
        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
            <i class="fas fa-minus"></i></button>
          <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
            <i class="fas fa-times"></i></button>
        </div>
      </div>
      <div class="card-body">
          
        <button type="button" data-toggle="modal" data-target="#nuevoUsuario" class="btn btn-primary mb-3 btn-sm">
          <i class="fa fa-plus"></i> Nuevo Usuario
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


<!--Modal Nuevo Usuario-->
<div class="modal fade" id="nuevoUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">
          <div class="modal-header">
            <h5 class="modal-title">Agregar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">

            <div class="input-group">
               <span class="input-group-text">
                <i class="fa fa-user"></i>
               </span>
              <input type="text" class="form-control" placeholder="Nombre" name="nuevoNombre" required>
            </div>

            <div class="input-group mt-2">
               <span class="input-group-text">
                @
               </span>
              <input type="email" class="form-control" placeholder="Usuario" name="nuevoUsuario" required>
            </div>

            <div class="input-group mt-2">
               <span class="input-group-text">
                <i class="fa fa-lock"></i>
               </span>
              <input type="password" class="form-control" placeholder="Contraseña" name="nuevaPassword" required>
            </div>

            <div class="input-group mt-2">
              <span class="input-group-text">
                <i class="fa fa-list"></i>
              </span>
              <select name="nuevoRoll" class="form-control" required>
                <option value="Estandar">Estandar</option>
                <option value="Administrador">Administrador</option>
              </select>
            </div>

        <hr>
            <div class="input-group mt-2">
              <label for="nuevaFoto" class="f-13">Seleccionar Imagen</label>
              <input type="file" class="form-control-file form-control-sm nuevaFoto" name="nuevaFoto" accept="image/*">
              <small  class="form-text text-muted">
            Selecciona una imagen no mayor a 3 MB
          </small>
            </div>
            <div class="mt-2">
              <img src="views/img/usuarios/default/anonymous.png" alt="usuario" class="img-usuario previsualizar">
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    
      <?php 

        $nuevoUsuario = new ControladorUsuarios();
        $nuevoUsuario -> ctrCrearUsuario();

      ?>
      </form>
    </div>
  </div>
</div>

<!--Modal Editar Usuario-->
<div class="modal fade" id="modalEditarUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <form method="post" enctype="multipart/form-data">

          <div class="modal-header">
            <h5 class="modal-title">Editar Usuario</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>

          <div class="modal-body">

            <div class="input-group">
               <span class="input-group-text">
                <i class="fa fa-user"></i>
               </span>
               <input type="hidden" id="idUsuario" name="idUsuario">
              <input type="text" class="form-control" placeholder="Nombre" name="editarNombre" id="editarNombre" required>
            </div>

            <div class="input-group mt-2">
               <span class="input-group-text">
                @
               </span>
              <input type="text" class="form-control" placeholder="Usuario" name="editarUsuario" id="editarUsuario" required readonly="">
            </div>

            <div class="input-group mt-2">
               <span class="input-group-text">
                <i class="fa fa-lock"></i>
               </span>
              <input type="password" class="form-control" placeholder="Contraseña" name="editarPassword">
              <input type="hidden" name="passwordActual" id="passwordActual">
            </div>

            <div class="input-group mt-2">
              <span class="input-group-text">
                <i class="fa fa-cogs"></i>
              </span>
              <select name="editarRoll" id="editarRoll" class="form-control" required>
              </select>
            </div>

        <hr>
            <div class="input-group mt-2">
              <label for="nuevaFoto" class="f-13">Seleccionar Imagen</label>
              <input type="file" class="form-control-file form-control-sm nuevaFoto" name="editarFoto" accept="image/*">
              <small  class="form-text text-muted">
                Selecciona una imagen no mayor a 3 MB
              </small>
            </div>
            <div class="mt-2">
              <img src="views/img/usuarios/default/anonymous.png" alt="usuario" class="img-usuario previsualizar">
              <input type="hidden" id="imagenActualRuta" name="imagenActualRuta">
            </div>

        </div>

        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </div>
    <?php 
    $editarUsuario = new ControladorUsuarios();
    $editarUsuario -> ctrEditarUsuario();
    ?>
      </form>
    </div>
  </div>
</div>