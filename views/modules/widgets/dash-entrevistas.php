<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-gradient-info">
                <h3 class="card-title">Dashboard Entrevistas</h3>
                <div class="card-tools">
                    <button href="#" class="btn btn-tool actualizarDashboardTareas">
                        <i class="fas fa-sync-alt"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                </div>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <div class="card f-14 bg-gradient-dark">
                            <div class="card-header">
                                <h4 class="card-title">Resumen Entrevistas</h4>
                            </div>
                            <div class="card-body">
                                Programadas:<span class="text-info float-right" id="tareasAsignadasSpan"></span><br>
                                Pendientes:<span class="text-info float-right" id="tareasCursoSpan"></span><br>
                                Canceladas:<span class="text-info float-right" id="tareasCursoSpan"></span><br>
                                Terminadas:<span class="text-info float-right" id="tareasPendientesSpan"></span><br>
                                <hr>
                                Total Entrevistas:<span class="text-info float-right" id="tareasTotalSpan"></span><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <canvas id="donutChartTareas" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 334px;" width="334" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="col-md-4">
                        <canvas id="donutChartTareasTotal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 334px;" width="334" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>		
            </div>
        </div>
    </div>
</div>