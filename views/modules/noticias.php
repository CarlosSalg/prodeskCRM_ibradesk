<div class="content-wrapper">

    <section class="content-header">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Noticias</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="home">Home</a></li>
                        <li class="breadcrumb-item active">Noticias</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <section class="content">
        <div class="row">
            <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">

                <!-- Seccion Coronavirus -->
                <?php include "views/modules/widgets/dash-corona.php"; ?>

                <!-- Seccion Noticias -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="card" id="contenedorGlobalNoticias">
                            <div class="card-header bg-gradient-info">
                                <h4 class="card-title">
                                    <a style="color:black;" type="button" data-card-widget="collapse">Noticias</a>
                                </h4>
                                <div class="card-tools">
                                    <span id="cargando" class="btn btn-tool"> recibiendo noticias...</span>
                                    <select id="tipoNoticias" class="btn btn-tool">
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
