<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Administrar Clientes</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Administrar Clientes</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Administrar Clientes</h3>
                <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse">
                    <i class="fas fa-minus"></i></button>
                <button type="button" class="btn btn-tool" data-card-widget="remove" data-toggle="tooltip" title="Remove">
                    <i class="fas fa-times"></i></button>
                </div>
            </div>
            <div class="card-body">

                <button type="button" data-toggle="modal" data-target="#nuevoCliente" class="btn btn-primary mb-3 btn-sm">
                    <i class="fa fa-plus"></i> Nuevo Cliente
                </button>

                <table class="table table-striped table-hover f-13 tabla dt-responsive">
                    <thead class="text-center">
                        <tr>
                            <th>Id</th>
                            <th>Razon Social</th>
                            <th>Comercial</th>
                            <th>Estatus</th>
                            <th>Nombre</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody class="text-center">
                        
                        <?php 

                            $clientes = ControladorClientes::ctrMostrarClientes();

                            foreach ($clientes as $key => $cliente) {

                                echo '
                                    <tr>
                                        <td>'.$cliente["cli_id"].'</td>
                                        <td>'.$cliente["cli_razon_social"].'</td>
                                        <td>'.$cliente["cli_nombre_comercial"].'</td>
                                        <td>'.$cliente["cli_estatus"].'</td>
                                        <td>'.$cliente["cli_contacto_compras_nombres"].' '.$cliente["cli_contacto_compras_apellidos"].'</td>
                                        <td>'.$cliente["cli_contacto_compras_correo"].'</td>
                                        <td>'.$cliente["cli_contacto_compras_telefono"].'</td>
                                        <td>
                                            <div class="btn-group">
                                                <button class="btn-sm btn btn-warning btnEditarCliente" idCliente="'.$cliente["cli_id"].'">
                                                    <i class="fa fa-edit"></i>
                                                </button>
                                                <button class="btn-sm btn btn-danger btnEliminarCliente" idCliente="'.$cliente["cli_id"].'">
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

<!--Modal Nuevo Cliente-->
<div class="modal fade" id="nuevoCliente" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <form method="post" enctype="multipart/form-data">

                <div class="modal-header">
                    <h5 class="modal-title">Agregar Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>

                <div class="modal-body">
                    <p>Generales</p>
                    <div class="row">
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="razonSocial">Razon Social</label>
                                <input type="text"  class="form-control form-control-sm" name="razonSocial" id="razonSocial" placeholder="Razon Social" required="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="nombreComercial">Nombre Comercial</label>
                                <input type="text"  class="form-control form-control-sm" name="nombreComercial" id="nombreComercial" placeholder="Nombre Comercial" required="">
                            </div>
                        </div>
                        <div class="col-sm-4">
                            <div class="form-group">
                                <label for="statusCliente">Estatus</label>
                                <select name="statusCliente" id="statusCliente" class="form-control form-control-sm" required="">
                                    <option value="">Seleccione el estatus</option>
                                    <option value="prospecto_activo">prospecto_activo</option>
                                    <option value="prospecto_inactivo">prospecto_inactivo</option>
                                    <option value="cliente_activo">cliente_activo</option>
                                    <option value="cliente_inactivo">cliente_inactivo</option>
                                </select>					
                            </div>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="col-sm-12">
                            <p>Contacto</p>
                            <div class="row">
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contactoComprasNombre">Nombre</label>
                                        <input type="text"  class="form-control form-control-sm" name="contactoComprasNombre" id="contactoComprasNombre" required="" placeholder="Nombre">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contactoComprasApellidos">Apellidos</label>
                                        <input type="text"  class="form-control form-control-sm" name="contactoComprasApellidos" id="contactoComprasApellidos" required="" placeholder="Apellidos">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contactoComprasCorreo">Correo</label>
                                        <input type="email"  class="form-control form-control-sm" name="contactoComprasCorreo" id="contactoComprasCorreo" required="" placeholder="Correo">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label for="contactoComprasTelefono">Telefono</label>
                                        <input type="text"  class="form-control form-control-sm" name="contactoComprasTelefono" id="contactoComprasTelefono" required="" placeholder="Telefono">
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>

                <?php
                    $crearCliente = new ControladorClientes();
                    $crearCliente -> ctrCrearCliente();
                ?>
                    
            </form>
        </div>
    </div>
</div>
