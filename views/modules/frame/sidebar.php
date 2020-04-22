<?php 
$tareasPendientes = ControladorTareas::ctrMostrarTodasMisTareasAbiertas();
if(count($tareasPendientes)>0){
  $cantidadTareas = '<span class="badge badge-warning right">'.count($tareasPendientes).'</span>';
  $avisoTareas = '  <span class="badge badge-danger right">T</span>';
}else{
  $cantidadTareas = '';
  $avisoTareas = '';
}
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="home" class="brand-link">
    <img src="views/img/template/icono.png" alt="Logo" class="brand-image elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Prodesk / CRM</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?=$_SESSION['foto']?>" class="img-circle elevation-2" alt="User_Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?=$_SESSION['nombre']?></a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">

      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-cogs"></i>
            <p>
              Administracion
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="usuarios" class="nav-link">
                <i class="nav-icon fa fa-users"></i>
                <p>Usuarios</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="clientes" class="nav-link">
                <i class="nav-icon fa fa-list"></i>
                <p>Clientes</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Reclutamiento
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="vacantes" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Vacantes</p>
              </a>
            </li>
          </ul>
        </li>

        <li class="nav-item has-treeview">
          <a href="#" class="nav-link">
            <i class="nav-icon fas fa-edit"></i>
            <p>
              Tareas
              <i class="right fas fa-angle-left"></i>
              <?=$avisoTareas?>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="nueva-tarea" class="nav-link">
                <i class="nav-icon fa fa-plus"></i>
                <p>Nueva Tarea</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="mis-tareas" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Tareas Pendientes</p>
                <?=$cantidadTareas?>
                
              </a>
            </li>
            <li class="nav-item">
              <a href="todas-mis-tareas" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Todas mis Tareas</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="mis-tareas-creadas" class="nav-link">
                <i class="nav-icon far fa-circle"></i>
                <p>Mis Tareas Creadas</p>
              </a>
            </li>
          </ul>
        </li>

        

        <li class="nav-item">
          <a href="logout" class="nav-link">
            <i class="nav-icon fas fa-sign-out-alt"></i>

            <p>
              Salir
            </p>
          </a>
        </li>


      </ul>

    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>