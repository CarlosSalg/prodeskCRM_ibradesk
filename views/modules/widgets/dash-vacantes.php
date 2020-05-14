<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-gradient-info">
                <h3 class="card-title">Dashboard Vacantes</h3>
                <div class="card-tools">
                    <button href="#" class="btn btn-tool actualizarDashboardVacantes">
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
                                <h4 class="card-title">Resumen Vacantes</h4>
                            </div>
                            <div class="card-body">
                                Abiertas:<span class="text-info float-right" id="vacantesAbiertasSpan"></span><br>
                                Pendientes:<span class="text-info float-right" id="vacantesPendientesSpan"></span><br>
                                Cerradas:<span class="text-info float-right" id="vacantesCerradasSpan"></span><br>
                                <hr>
                                Total Vacantes:<span class="text-info float-right" id="vacantesTotalSpan"></span><br>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <canvas id="donutChartVacantes" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 334px;" width="334" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                    <div class="col-md-4">
                        <canvas id="donutChartVacantesTotal" style="min-height: 250px; height: 250px; max-height: 250px; max-width: 100%; display: block; width: 334px;" width="334" height="250" class="chartjs-render-monitor"></canvas>
                    </div>
                </div>		
            </div>
        </div>
    </div>
</div>