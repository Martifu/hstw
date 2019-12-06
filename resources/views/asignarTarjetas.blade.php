@extends('templates.master')

@section('contenido')
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand" href="#pablo"> Asignacion de tarjetas </a>
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" id="navigation">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link" href="cerrarsesion">
                            <span class="no-icon">Salir</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <div class="content main-body">
        <div class="container-fluid">
            <div class="row main">
                <div class="col-md-8">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">1. Verifique al cliente</h4>
                        </div>
                        <div class="card-body">
                            <form>
                                @csrf
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>CURP</label>
                                            <input type="text" class="form-control" id="curp" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-4">
                                        <div class="form-group">
                                            <label>RFC</label>
                                            <input type="text" class="form-control" id="rfc" placeholder="" value="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Nombre</label>
                                            <input type="text" class="form-control" id="nombre" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Apellido Paterno</label>
                                            <input type="text" class="form-control" id="apellidoP" placeholder="" value="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Apellido Materno</label>
                                            <input type="text" class="form-control" id="apellidoM" placeholder="" value="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label>Fecha de nacimiento</label>
                                            <input type="text"
                                                   id="date"
                                                   name="value_specified"
                                                   class="form-control wbn-datepicker"
                                                   value="" />
                                        </div>
                                    </div>
                                </div>
                                <a class="btn btn-info btn-fill pull-right" id="verificar" style="color: white">Verificar</a>
                                <div class="clearfix"></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function(){

            $('.wbn-datepicker').datepicker();

            $('body').on('click','#verificar',function (event) {
                event.preventDefault();
                //$('#verificar').addClass("disabled");
                var token = $("input[name='_token']").val();
                var curp;
                var rfc;
                var nombre;
                var apellidoP;
                var apellidoM;
                var date;
                curp = $('#curp').val();
                rfc = $('#rfc').val();
                nombre = $('#nombre').val();
                apellidoM = $('#apellidoM').val();
                apellidoP = $('#apellidoP').val();
                date = $('#date').val();

                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data:
                        {
                          curp: curp,
                          rfc:  rfc,
                          nombre: nombre,
                          apellidoP: apellidoP,
                          apellidoM: apellidoM,
                          date: date,
                          _token: token
                        },
                    url: '/verificar-buro',
                    success: function(response){
                        if (response['credito']=='no'){
                            $.notify({
                                // options
                                message: 'El cliente no tiene permiso para una tarjeta de credito'
                            },{
                                // settings
                                type: 'danger'
                            });
                            $('.card-cliente').remove();
                            $('.main').append('                <div class="col-md-4 card-cliente">\n' +
                                '                    <div class="card card-user">\n' +
                                '                        <div class="card-image">\n' +
                                '                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">\n' +
                                '                        </div>\n' +
                                '                        <div class="card-body">\n' +
                                '                            <div class="author">\n' +
                                '                                <p href="#">\n' +
                                '                                    <img class="avatar border-info"  src="{{asset('assets/img/user-default.png')}}" alt="...">\n' +'' +
                                '                                    <input id="personaid" name="" type="hidden" value="'+response['persona'][0]["id"]+'">'+
                                '                                    <h5 class="">'+response['persona'][0]["nombre"] +" "+ response['persona'][0]["apellido_p"]+" "+ response['persona'][0]["apellido_m"]+'</h5>\n' +
                                '                                </p>\n' +
                                '                                <p class="description">\n' +
                                '                                    Estatus:\n' +
                                '                                </p>\n' +
                                '                            </div>\n' +
                                '                            <p class="description text-center">\n' +
                                '                                "Lamborghini Mercy\n' +
                                '                                <br> Your chick she so thirsty\n' +
                                '                                <br> I\'m in that two seat Lambo"\n' +
                                '                            </p>\n' +
                                '                        </div>\n' +
                                '                        <hr>\n' +
                                '                        <div class="button-container mr-auto ml-auto pb-2">\n' +
                                '                            <button value="débito"  class="btn btn-success " id="asignarDebito">\n' +
                                '                               Débito\n' +
                                '                            </button>\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '            </div>\n' +
                                '        </div>\n' +
                                '    </div>')
                        } else  {
                            $.notify({
                                // options
                                message: 'El cliente no tiene problemas con buró de crédito'
                            },{
                                // settings
                                type: 'success'
                            });
                            $('.card-cliente').remove();
                            $('.main').append('                <div class="col-md-4 card-cliente">\n' +
                                '                    <div class="card card-user">\n' +
                                '                        <div class="card-image">\n' +
                                '                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">\n' +
                                '                        </div>\n' +
                                '                        <div class="card-body">\n' +
                                '                            <div class="author">\n' +
                                '                                <p href="#">\n' +
                                '                                    <img class="avatar border-info"  src="{{asset('assets/img/user-default.png')}}" alt="...">\n' +'' +
                                '                                    <input id="personaid" name="" type="hidden" value="'+response['persona'][0]["id"]+'">'+
                                '                                    <h5 class="">'+response['persona'][0]["nombre"] +" "+ response['persona'][0]["apellido_p"]+" "+ response['persona'][0]["apellido_m"]+'</h5>\n' +
                                '                                </p>\n' +
                                '                                <p class="description">\n' +
                                '                                    Estatus:\n' +
                                '                                </p>\n' +
                                '                            </div>\n' +
                                '                            <p class="description text-center">\n' +
                                '                                "Lamborghini Mercy\n' +
                                '                                <br> Your chick she so thirsty\n' +
                                '                                <br> I\'m in that two seat Lambo"\n' +
                                '                            </p>\n' +
                                '                        </div>\n' +
                                '                        <hr>\n' +
                                '                        <div class="button-container mr-auto ml-auto pb-2">\n' +
                                '                            <button value="" class="btn btn-success" id="asignarCredito">\n' +
                                '                               Crédito\n' +
                                '                            </button>\n' +

                                '                            <button value="debito" class="btn btn-success " id="asignarDebito">\n' +
                                '                               Débito\n' +
                                '                            </button>\n' +
                                '                        </div>\n' +
                                '                    </div>\n' +
                                '                </div>\n' +
                                '            </div>\n' +
                                '        </div>\n' +
                                '    </div>')
                        }

                    }
                });
            });
            $('body').on('click','#asignarDebito',function (event) {
                event.preventDefault();

                var id = parseInt($('#personaid').val());
                $('.main-body').html('');
                $('.main-body').append(' <div class="container-fluid">\n' +
                    '            <div class="row main">\n' +
                    '                <div class="col-md-1"></div>\n' +
                    '                <div class="col-md-8">\n' +
                    '                    <div class="card">\n' +
                    '                        <div class="card-header">\n' +
                    '                            <h4 class="card-title">2. Asigne la tarjeta de débito</h4>\n' +
                    '                        </div>\n' +
                    '                        <div class="card-body">\n' +
                    '                            <form>\n' +
                    '                                @csrf\n' +
                    '                                <div class="row">\n' +'' +
                    '                                   <input id="idasignar" name="" type="hidden" value="'+id+'">'+
                    '                                    <div class="col-md-6">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label>Numero de tarjeta</label>\n' +
                    '                                            <input type="text" maxlength="19" class="form-control h-75" id="notarjeta" placeholder="" value="">\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-md-3">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label>Mes</label>\n' +
                    '                                            <select id="mes" class="form-control w-100 h-100">\n' +
                    '                                                <option value="01">Enero</option>\n' +
                    '                                                <option value="02">Febrero </option>\n' +
                    '                                                <option value="03">Marzo</option>\n' +
                    '                                                <option value="04">Abril</option>\n' +
                    '                                                <option value="05">Mayo</option>\n' +
                    '                                                <option value="06">Junio</option>\n' +
                    '                                                <option value="07">Julio</option>\n' +
                    '                                                <option value="08">Agosto</option>\n' +
                    '                                                <option value="09">Septiembre</option>\n' +
                    '                                                <option value="10">Octubre</option>\n' +
                    '                                                <option value="11">Noviembre</option>\n' +
                    '                                                <option value="12">Diciembre</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-md-3">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label for="">Año</label>\n' +
                    '                                            <select id="anio" class="form-control w-100 h-100">\n' +
                    '                                                <option value="16"> 2016</option>\n' +
                    '                                                <option value="17"> 2017</option>\n' +
                    '                                                <option value="18"> 2018</option>\n' +
                    '                                                <option value="19"> 2019</option>\n' +
                    '                                                <option value="20"> 2020</option>\n' +
                    '                                                <option value="21"> 2021</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '\n' +
                    '                                </div>\n' +
                    '                                <div class="row">\n' +
                    '                                    <div class="col-md-4"></div>\n' +
                    '                                    <div class="col-md-4">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label>Tipo de tarjeta</label>\n' +
                    '                                            <select id="tipo" class="form-control w-100 h-100">\n' +
                    '                                                <option value="16"> Mastercard</option>\n' +
                    '                                                <option value="17"> Banamex</option>\n' +
                    '                                                <option value="18"> Banorte</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                <a  class="btn btn-info btn-fill pull-right" id="guardarD" style="color: white">Guardar</a>\n' +
                    '                                <div class="clearfix"></div>\n' +
                    '                            </form>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '        </div>');
            });
            $('body').on('click','#asignarCredito',function (event) {
                event.preventDefault();
                var id = parseInt($('#personaid').val());
                $('.main-body').html('');
                $('.main-body').append(' <div class="container-fluid">\n' +
                    '            <div class="row main">\n' +
                    '                <div class="col-md-1"></div>\n' +
                    '                <div class="col-md-8">\n' +
                    '                    <div class="card">\n' +
                    '                        <div class="card-header">\n' +
                    '                            <h4 class="card-title">2. Asigne la tarjeta de crédito</h4>\n' +
                    '                        </div>\n' +
                    '                        <div class="card-body">\n' +
                    '                            <form>\n' +
                    '                                @csrf\n' +
                    '                                <div class="row">\n' +'' +
                    '                                   <input id="idasignar" name="" type="hidden" value="'+id+'">'+
                    '                                    <div class="col-md-6">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label>Numero de tarjeta</label>\n' +
                    '                                            <input type="text"  maxlength="19" class="form-control h-75" id="notarjeta" placeholder="" value="">\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-md-3">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label>Mes</label>\n' +
                    '                                            <select id="mes" class="form-control w-100 h-100">\n' +
                    '                                                <option value="01">Enero</option>\n' +
                    '                                                <option value="02">Febrero </option>\n' +
                    '                                                <option value="03">Marzo</option>\n' +
                    '                                                <option value="04">Abril</option>\n' +
                    '                                                <option value="05">Mayo</option>\n' +
                    '                                                <option value="06">Junio</option>\n' +
                    '                                                <option value="07">Julio</option>\n' +
                    '                                                <option value="08">Agosto</option>\n' +
                    '                                                <option value="09">Septiembre</option>\n' +
                    '                                                <option value="10">Octubre</option>\n' +
                    '                                                <option value="11">Noviembre</option>\n' +
                    '                                                <option value="12">Diciembre</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                    <div class="col-md-3">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label for="">Año</label>\n' +
                    '                                            <select id="anio" class="form-control w-100 h-100">\n' +
                    '                                                <option value="16"> 2016</option>\n' +
                    '                                                <option value="17"> 2017</option>\n' +
                    '                                                <option value="18"> 2018</option>\n' +
                    '                                                <option value="19"> 2019</option>\n' +
                    '                                                <option value="20"> 2020</option>\n' +
                    '                                                <option value="21"> 2021</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '\n' +
                    '                                </div>\n' +
                    '                                <div class="row">\n' +
                    '                                    <div class="col-md-4"></div>\n' +
                    '                                    <div class="col-md-4">\n' +
                    '                                        <div class="form-group">\n' +
                    '                                            <label>Tipo de tarjeta</label>\n' +
                    '                                            <select id="tipo" class="form-control w-100 h-100">\n' +
                    '                                                <option value="16"> Mastercard</option>\n' +
                    '                                                <option value="17"> Banamex</option>\n' +
                    '                                                <option value="18"> Banorte</option>\n' +
                    '                                            </select>\n' +
                    '                                        </div>\n' +
                    '                                    </div>\n' +
                    '                                </div>\n' +
                    '                                <a  class="btn btn-info btn-fill pull-right" id="guardarC" style="color: white">Guardar</a>\n' +
                    '                                <div class="clearfix"></div>\n' +
                    '                            </form>\n' +
                    '                        </div>\n' +
                    '                    </div>\n' +
                    '                </div>\n' +
                    '            </div>\n' +
                    '        </div>');

            });
            $('body').on('keyup','#notarjeta',function (event) {
                event.preventDefault();
                var val = $(this).val();
                var newval = '';
                val = val.replace(/\s/g, '');
                for (var i = 0; i < val.length; i++) {
                    if (i % 4 == 0 && i > 0) newval = newval.concat(' ');
                    newval = newval.concat(val[i]);
                }
                $(this).val(newval);
            });


            $('body').on('click','#guardarC',function (event) {
                event.preventDefault();
                var idguardar = $('#idasignar').val();
                var tarjeta = $('#notarjeta').val();
                var mes = $('#mes').val();
                var anio = $('#anio').val();
                var tipo = $('#tipo').val();
                console.log(idguardar, tarjeta, mes,anio, tipo);
                $.ajax({
                    type: "POST",
                    dataType: 'json',
                    data:
                        {
                            idguardar: idguardar,
                            tarjeta:  tarjeta,
                            mes: mes,
                            anio: anio,
                            tipo: tipo,
                            _token: token
                        },
                    url: '/tcredito',
                    success : function(response){
                        console.log(response);
                    }
                });
            });


        });
    </script>
@stop

