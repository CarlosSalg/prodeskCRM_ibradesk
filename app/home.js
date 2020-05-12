$(document).ready(function(){

    // Obtener Ultimos Datos Coronavirus Seccion
    $.get('https://api.covid19api.com/summary', function(response){

       let mexico = response.Countries[108];
       let fecha = mexico.Date.split("T");

       let template = `

        <div class="col-md-4">
            <div class="card f-13">
                <div class="card-body">
                    <b class="text-muted">Fecha Actualizacion:</b><span class="text-info float-right"> ${fecha[0]}</span><br>
                    <b class="text-muted">Hora Actualizacion:</b><span class="text-info float-right"> ${fecha[1]}</span><br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card f-13">
                <div class="card-body">
                    <b class="text-muted">Nuevos Confirmados:</b><span class="text-info float-right"> ${mexico.NewConfirmed}</span><br>
                    <b class="text-muted">Nuevas Defunciones:</b><span class="text-info float-right"> ${mexico.NewDeaths}</span><br>
                    <b class="text-muted">Nuevos Recuperados:</b><span class="text-info float-right"> ${mexico.NewRecovered}</span><br>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card f-13">
                <div class="card-body">
                    <b class="text-muted">Total Confirmados:</b><span class="text-info float-right"> ${mexico.TotalConfirmed}</span><br>
                    <b class="text-muted">Total Defunciones:</b><span class="text-info float-right"> ${mexico.TotalDeaths}</span><br>
                    <b class="text-muted">Total Recuperados:</b><span class="text-info float-right"> ${mexico.TotalRecovered}</span><br>
                </div>
            </div>
        </div>
    
       `;

       $('#contenedorHome').html(template);

    })

    // Obtener Ultimas Noticias      
    var url = 'http://newsapi.org/v2/top-headlines?' + 'country=mx&' + 'apiKey=f181ec0846b94ba194e41667a9cdb11d';          
    $.get(url, function(responseNoticias){ 

        let articulos = responseNoticias.articles;

        let template = '';

        articulos.forEach(articulo => {

            template += `

                <div class="card f-14">
                    <img src="${articulo.urlToImage}" class="card-img-top" alt="imagen">
                    <div class="card-body">
                        <h5 class="card-title">${articulo.title}</h5>
                        <p class="card-text">${articulo.description}</p>
                        <a href="${articulo.url}" target="_blank" class="btn btn-info btn-sm float-right">Leer mas</a>
                    </div>
                </div>
            
            
            `;

        });

        $('#contenedorNoticias').html(template);

    });
    
});