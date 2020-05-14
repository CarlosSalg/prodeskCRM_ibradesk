<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-12">
                <div class="row mt-4">
                    
                    <!-- Noticias Home-->
                    <div class="col-md-3 f-12">
                        <div class="card">
                            <div class="card-header bg-gradient-info">
                                <h3 class="card-title">Para leer</h3>
                                <div class="card-tools">
                                    <span id="cargandoHome" class="btn btn-tool">cargando...</span>
                                    <select id="tipoNoticiasHome" class="btn btn-tool">
                                        <option value="general">General</option>
                                        <option value="business">Negocios</option>
                                        <option value="entertainment">Entretenimiento</option>
                                        <option value="health">Salud</option>
                                        <option value="science">Ciencia</option>
                                        <option value="sports">Deportes</option>
                                        <option value="technology">Tecnologia</option>
                                    </select>
								</div>
                            </div>
                            <div class="card-body">
                                <div class="row" id="contenedorNoticiasHome">
                                    
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="text-right"><a href="noticias" class="btn btn-sm btn-info">Ver mas</a></div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>
                    
                    <!-- Panel principal -->
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-header bg-gradient-info">
                                <h3 class="card-title">Panel principal</h3>
                            </div>
                            <div class="card-body">

                            </div>
                        </div>
                    </div>

                    <!-- Dashboard Principales -->
                    <div class="col-md-3">
                        <div class="card">
                            <div class="card-header bg-gradient-info">
                                <h3 class="card-title">Dashboard</h3>
                                <div class="card-tools">
                                    <button href="#" class="btn btn-tool actualizarDashboardTareas actualizarDashboardVacantes actualizarCotonavirus">
                                        <i class="fas fa-sync-alt"></i>
                                    </button>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="col-md-12">
                                    <?php include "views/modules/widgets/dash-tareas-card.php"; ?>
                                    <div class="text-right"><a href="mis-tareas" class="btn btn-sm btn-info">Ir a tareas</a></div>
                                </div>
                                <hr>
                                <div class="col-md-12 mt-4">
                                    <?php include "views/modules/widgets/dash-vacantes-card.php"; ?>
                                    <div class="text-right"><a href="ver-vacantes" class="btn btn-sm btn-info">Ir a vacantes</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                
                
                </div>
            </div>
        </div>
    </section>

</div>
