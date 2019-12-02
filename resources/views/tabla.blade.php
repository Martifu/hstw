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
                    <a class="nav-link" href="#pablo">
                        <span class="no-icon">Salir</span>
                    </a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<!-- End Navbar -->
<div class="content">
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
                                        <input type="text" id="date" name="value_specified" class="form-control wbn-datepicker" value="" />
                                    </div>
                                </div>
                            </div>
                            <a class="btn btn-info btn-fill pull-right" id="verificar" style="color: white">Verificar</a>
                            <a class="btn btn-info btn-fill pull-right" id="checar" style="color: white">checar</a>
                            <div class="clearfix"></div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- Info de usuario -->
            {{-- <div class="col-md-4">--}}
            {{-- <div class="card card-user">--}}
            {{-- <div class="card-image">--}}
            {{-- <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">--}}
            {{-- </div>--}}
            {{-- <div class="card-body">--}}
            {{-- <div class="author">--}}
            {{-- <p href="#">--}}
            {{-- <img class="avatar border-info"  src="{{asset('assets/img/user-default.png')}}" alt="...">--}}
            {{-- <h5 class="">Nombre del cliente</h5>--}}
            {{-- </p>--}}
            {{-- <p class="description">--}}
            {{-- Estatus:--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- <p class="description text-center">--}}
            {{-- "Lamborghini Mercy--}}
            {{-- <br> Your chick she so thirsty--}}
            {{-- <br> I'm in that two seat Lambo"--}}
            {{-- </p>--}}
            {{-- </div>--}}
            {{-- <hr>--}}
            {{-- <div class="button-container mr-auto ml-auto pb-2">--}}
            {{-- <button  class="btn disabled" >--}}
            {{-- Asignar una tarjeta--}}
            {{-- </button>--}}
            {{-- </div>--}}
            {{-- </div>--}}
            {{-- </div>--}}
        </div>
        <div class="buro">
            <div class="header">Buro de Credito</div>
            <div class="scrolling content">
                <table class="ui celled table">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Paterno</th>
                            <th>Materno</th>
                            <th>institucion</th>
                            <th>adeudo</th>
                        </tr>
                    </thead>
                    <tbody id="buroC">


                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop

@section('javascript')
<script>
    $(document).ready(function() {

        $('.wbn-datepicker').datepicker();

        $('#verificar').click(function() {
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
                data: {
                    curp: curp,
                    rfc: rfc,
                    nombre: nombre,
                    apellidoP: apellidoP,
                    apellidoM: apellidoM,
                    date: date,
                    _token: token
                },
                url: '/verificar-buro',
                success: function(response) {
                    console.log(response[0]['nombre']);
                    $('.main').append('                <div class="col-md-4">\n' +
                        '                    <div class="card card-user">\n' +
                        '                        <div class="card-image">\n' +
                        '                            <img src="https://ununsplash.imgix.net/photo-1431578500526-4d9613015464?fit=crop&fm=jpg&h=300&q=75&w=400" alt="...">\n' +
                        '                        </div>\n' +
                        '                        <div class="card-body">\n' +
                        '                            <div class="author">\n' +
                        '                                <p href="#">\n' +
                        '                                    <img class="avatar border-info"  src="{{asset('
                        assets / img / user -
                        default.png ')}}" alt="...">\n' +
                        '                                    <h5 class="">' + response[0]["nombre"] + " " + response[0]["apellido_p"] + " " + response[0]["apellido_m"] + '</h5>\n' +
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
                        '                            <button  class="btn btn-success" >\n' +
                        '                               Asignar una tarjeta\n' +
                        '                            </button>\n' +
                        '                        </div>\n' +
                        '                    </div>\n' +
                        '                </div>\n' +
                        '            </div>\n' +
                        '        </div>\n' +
                        '    </div>')
                }
            });
            console.log(curp + rfc + nombre + apellidoM + apellidoP + date + token);

        });
        $('#checar').click(function(e) {

            var tabla = $('#buroC');
            $.ajax({
                url: '/checarburo',
                type: 'POST',
                datatype: 'json',
                data: {
                    curp: curp,
                    rfc: rfc,
                    nombre: nombre,
                    apellidoP: apellidoP,
                    apellidoM: apellidoM,
                    date: date,
                    _token: token
                },
                success: function(response) {
                    $.each(response, function(i, v) {
                        tabla.append('<tr><td>' + v.nombre + '</td><td >' + v.rfc + '</td><td>' + v['instituciones'].nombre + '</td>  </tr>')
                    })
                }
            })
        });
    });
</script>
@stop