$(document).ready(function(){

    // Funcion para obtener Ultimas Noticias en Home
    const llenarNoticiasHome = function(categoria){
        
        $("#cargandoHome").css("display", "inline");
        var url = 'http://newsapi.org/v2/top-headlines?' + 'country=mx&' + 'pageSize=2&' +'category='+categoria+'&' + 'apiKey=f181ec0846b94ba194e41667a9cdb11d';          
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

            $('#contenedorNoticiasHome').html(template);
            $("#cargandoHome").css("display", "none");
        });
        
    };   

    llenarNoticiasHome('general');

    // Cambiar categoria de noticias
    $('#tipoNoticiasHome').on('change', function(){

        let tipo = $(this).val();
        llenarNoticiasHome(tipo);

    });

});