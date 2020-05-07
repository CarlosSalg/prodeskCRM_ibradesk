<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <section class="content-header">
        <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Calendario</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home">Home</a></li>
                    <li class="breadcrumb-item active">Calendario</li>
                    </ol>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-3 d-none">
                    <div class="sticky-top mb-3">
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Draggable Events</h4>
                            </div>
                            <div class="card-body">
                                <div id="external-events">
                                    <div class="external-event bg-success">Lunch</div>
                                    <div class="external-event bg-warning">Go home</div>
                                    <div class="external-event bg-info">Do homework</div>
                                    <div class="external-event bg-primary">Work on UI design</div>
                                    <div class="external-event bg-danger">Sleep tight</div>
                                    <div class="checkbox">
                                        <label for="drop-remove">
                                            <input type="checkbox" id="drop-remove">
                                            remove after drop
                                        </label>
                                        <p id="idUsuario" idNumero="<?=$_SESSION['id']?>"><?=$_SESSION['id']?></p>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Create Event</h3>
                            </div>
                            <div class="card-body">
                                <div class="btn-group" style="width: 100%; margin-bottom: 10px;">
                                    <!--<button type="button" id="color-chooser-btn" class="btn btn-info btn-block dropdown-toggle" data-toggle="dropdown">Color <span class="caret"></span></button>-->
                                    <ul class="fc-color-picker" id="color-chooser">
                                    <li><a class="text-primary" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-warning" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-success" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-danger" href="#"><i class="fas fa-square"></i></a></li>
                                    <li><a class="text-muted" href="#"><i class="fas fa-square"></i></a></li>
                                    </ul>
                                </div>
                                <div class="input-group">
                                    <input id="new-event" type="text" class="form-control" placeholder="Event Title">
                                    <div class="input-group-append">
                                        <button id="add-new-event" type="button" class="btn btn-primary">Add</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-10 offset-md-1 col-xs-12 offset-sm-0">
                    <div class="card card-primary">
                        <div class="card-body p-0">
                            <div id="calendar"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<script>
  $(function () {

    /* initialize the calendar
     -----------------------------------------------------------------*/

    var Calendar = FullCalendar.Calendar;
    var calendarEl = document.getElementById('calendar');

    let id = $('#idUsuario').attr('idNumero');

    $.post('controllers/calendario/ver-calendario.php',{id}, function(response){

        let res = JSON.parse(response);
        let gralEvent = [];

        res.forEach(dato => {

            var horaInicio = 00;
            var minutoInicio = 00;
            var horaFinal = 23;
            var minutoFinal = 59;
            var url = '';
            var all_day = false;

            if(dato.cal_start_time != null){

                var start = dato.cal_start_time.split(':');
                horaInicio = start[0];
                minutoInicio = start[1];

            }

            if(dato.cal_end_time != null){

                var end = dato.cal_end_time.split(':');
                horaFinal = end[0];
                minutoFinal = end[1];

            }   

            if(dato.cal_url != null){

                url = dato.cal_url;

            }

            if(dato.cal_all_day == 1){

                all_day = true;
                horaInicio = null;
                minutoInicio = null;
                horaFinal = null;
                minutoFinal = null;

            }

            var fechaInicio = dato.cal_start_date.split('-');
            var fechaFinal = dato.cal_end_date.split('-');

            var anoInicio = fechaInicio[0];
            var mesInicio = fechaInicio[1]-1;
            var diaInicio = fechaInicio[2];

            var anoFinal = fechaFinal[0];
            var mesFinal = fechaFinal[1]-1;
            var diaFinal = fechaFinal[2];

            let evento = {

                title:dato.cal_title,
                start: new Date(anoInicio, mesInicio, diaInicio, horaInicio, minutoInicio),
                end: new Date(anoFinal, mesFinal, diaFinal, horaFinal, minutoFinal),
                allDay: all_day,
                url: url,
                backgroundColor: dato.cal_background_color,
                borderColor    : dato.cal_border_color 

            }

            gralEvent.push(evento);

        });
      
        var calendar = new Calendar(calendarEl, {

            plugins: [ 'bootstrap', 'interaction', 'dayGrid', 'timeGrid' ],
            header    : {
                right  : 'prev,next today',
                center: 'title',
                left : 'dayGridMonth,timeGridWeek,timeGridDay'
            },
            'themeSystem': 'bootstrap',
            events    : gralEvent,
            
        });

        calendar.render();

    })

    
  })
</script>