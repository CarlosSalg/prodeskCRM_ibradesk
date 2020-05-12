<div class="content-wrapper">

    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

                <!-- Seccion Coronavirus -->
                <div class="row mt-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header bg-gradient-info">
                                <h4 class="card-title">
                                    <a style="color:black;" type="button" data-card-widget="collapse">Coronavirus</a>
                                </h4>
                                <a href="#" class="btn btn-dark btn-sm float-right actualizarCotonavirus">
                                    <i class="fas fa-sync-alt"></i>
                                </a>
                            </div>
                            <div class="card-body">
                                <div class="row" id="contenedorHome">
                                    <a href="#" class="btn btn-dark btn-sm actualizarCotonavirus">
                                        <i class="fas fa-sync-alt"></i> Actualizar tablero
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Seccion Noticias -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="contenedorGlobalNoticias">
                            <div class="card-header bg-gradient-info">
                                <h4 class="card-title">
                                    <a style="color:black;" type="button" data-card-widget="collapse">Noticias</a><span id="cargando" class=" badge badge-secondary"> recibiendo noticias...</span>
                                </h4>
                                <select id="tipoNoticias" class="float-right bg-gradient-dark">
                                    <option value="general">General</option>
                                    <option value="business">Negocios</option>
                                    <option value="entertainment">Entretenimiento</option>
                                    <option value="health">Salud</option>
                                    <option value="science">Ciencia</option>
                                    <option value="sports">Deportes</option>
                                    <option value="technology">Tecnologia</option>
                                </select>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12 card-columns" id="contenedorNoticias">

                                    </div>
                                </div>    
                            </div>
                            <div class="card-footer f-12">
                                <span class="float-right">Fuente <a href="https://newsapi.org" target="_blank">News API</a></span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>

</div>
