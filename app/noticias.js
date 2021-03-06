$(document).ready(function(){

    // Function obtener Ultimos Datos Coronavirus Seccion
    const llenarCoronavirus = function(){

        $.get('https://api.covid19api.com/summary', function(response){

            if(response){
    
                let mexico = response.Countries[109];
                let global = response.Global;
                let fechaMexico = mexico.Date.split("T");
        
                let template = `
        
                    <div class="row">
                        <div class="col-md-6">
                            <div class="card f-13 bg-gradient-dark">
                                <div class="card-header">
                                    <h4 class="card-title">México</h4>
                                </div>
                                <div class="card-body">
                                    Fecha Actualizacion:<span class="text-info float-right"> ${fechaMexico[0]}</span><br>
                                    <hr>
                                    Nuevos Confirmados:<span class="text-info float-right"> ${mexico.NewConfirmed}</span><br>
                                    Nuevas Defunciones:<span class="text-info float-right"> ${mexico.NewDeaths}</span><br>
                                    Nuevos Recuperados:<span class="text-info float-right"> ${mexico.NewRecovered}</span><br>
                                    <hr>
                                    Total Confirmados:<span class="text-info float-right"> ${mexico.TotalConfirmed}</span><br>
                                    Total Defunciones:<span class="text-info float-right"> ${mexico.TotalDeaths}</span><br>
                                    Total Recuperados:<span class="text-info float-right"> ${mexico.TotalRecovered}</span><br>
                                </div>
                            </div>
                        </div>
            
                        <div class="col-md-6">
                            <div class="card f-13 bg-gradient-dark">
                                <div class="card-header">
                                    <h4 class="card-title">El Mundo</h4>
                                </div>
                                <div class="card-body">
                                    Fecha Actualizacion:<span class="text-info float-right"> ${fechaMexico[0]}</span><br>
                                    <hr>
                                    Nuevos Confirmados:<span class="text-info float-right"> ${global.NewConfirmed}</span><br>
                                    Nuevas Defunciones:<span class="text-info float-right"> ${global.NewDeaths}</span><br>
                                    Nuevos Recuperados:<span class="text-info float-right"> ${global.NewRecovered}</span><br>
                                    <hr>
                                    Total Confirmados:<span class="text-info float-right"> ${global.TotalConfirmed}</span><br>
                                    Total Defunciones:<span class="text-info float-right"> ${global.TotalDeaths}</span><br>
                                    Total Recuperados:<span class="text-info float-right"> ${global.TotalRecovered}</span><br>
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            
                $('#contenedorHome').html(template);
            
                // Donut Chart
            
                var donutChartCanvas = $('#donutChart').get(0).getContext('2d')
                var donutData        = {
                labels: [
                    'Nuevos Confirmados', 
                    'Nuevas Defunciones',
                    'Nuevos Recuperados', 
                ],
                datasets: [
                    {
                    data: [mexico.NewConfirmed,mexico.NewDeaths,mexico.NewRecovered],
                    backgroundColor : ['#f39c12', '#7E7C7C', '#00a65a'],
                    }
                ]
                }
            
                var donutOptions     = {
                    maintainAspectRatio : false,
                    responsive : true,
                    }
                // Create pie or doughnut chart
                // You can switch between pie and douhnut using the method below.
                var donutChart = new Chart(donutChartCanvas, {
                    type: 'pie',
                    data: donutData,
                    options: donutOptions      
                })

            }
    
        })
    }

    // Funcion para obtener Ultimas Noticias 
    const llenarNoticias = function(categoria){

        $("#cargando").css("display", "inline");
        
        var url = 'http://newsapi.org/v2/top-headlines?' + 'country=mx&' + 'pageSize=80&' +'category='+categoria+'&' + 'apiKey=f181ec0846b94ba194e41667a9cdb11d';          
        $.get(url, function(responseNoticias){ 

            let articulos = responseNoticias.articles;
            let template = '';
            let imagen = '';

            articulos.forEach(articulo => {

                if(articulo.urlToImage == ""){

                    imagen = ``;

                }else if(articulo.urlToImage == null){

                    imagen = ``;

                }else{

                    imagen = `<img src="${articulo.urlToImage}" class="card-img-top" alt="imagen"></img>`;
                }
                

                template += `

                    <div class="card f-14">
                        <a href="${articulo.url}" target="_blank">${imagen}</a>
                        <div class="card-body">
                            <h5 class="card-title"><a href="${articulo.url}" target="_blank" style="color:black;">${articulo.title}</a></h5>
                            <p class="card-text">${articulo.description}</p>
                            <p class="card-text">Fuente: ${articulo.source.name}</p>
                        </div>
                    </div>
        
                `;

            });

            $('#contenedorNoticias').html(template);
            $("#cargando").css("display", "none");

        });
        
    };   
    
    // Cambiar categoria de noticias
    $('#tipoNoticias').on('change', function(){

        let tipo = $(this).val();
        llenarNoticias(tipo);


    });

    // Actualizar datos coronavirus
    $('.actualizarCotonavirus').on('click', function(event){
        event.preventDefault();
        llenarCoronavirus();
    });

    // Inicializar Noticias y Coronavirus
    llenarNoticias('general');
    llenarCoronavirus();

});