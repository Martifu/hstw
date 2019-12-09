@extends('templates.master')

@section('contenido')
<!-- Navbar -->
<nav class="navbar navbar-expand-lg " color-on-scroll="500">
    <div class="container-fluid">
        <a class="navbar-brand" href="#pablo"> Asignacion de Prestamo </a>
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
            <div class="buro col-md-12">
                <div class="header">Datos del Cliente</div>
                <div class="scrolling content">
                    <table class="ui celled table">
                        <thead>
                            <tr>
                                <th>Nombre</th>
                                <th>Apellido P.</th>
                                <th>Apellido M.</th>
                                <th>Curp</th>
                                <th>RFC</th>
                                <th>Fecha Nac.</th>
                            </tr>
                        </thead>
                        <tbody>

                            <tr>
                                <td>{{$persona[0]->nombre}}</td>
                                <td>{{$persona[0]->apellido_p}}</td>
                                <td>{{$persona[0]->apellido_m}}</td>
                                <td>{{$persona[0]->curp}}</td>
                                <td>{{$persona[0]->rfc}}</td>
                                <td>{{$persona[0]->fecha_nacimiento}}</td>
                            </tr>
                        </tbody>
                    </table>
                    <table style="display: none;" class="sss direccion ui celled table">
                        <thead>
                            <tr>
                                <th>Calle</th>
                                <th>numero</th>
                                <th>calles</th>
                                <th>cp</th>
                                <th>colonia</th>
                            </tr>
                        </thead>
                        <tbody class="buroC">

                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title tit">Direccion</h4>
                    </div>
                    <div class="card-body">
                        <form>
                            @csrf
                            <div class="first">
                                <div class="row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <input style="display: none;" value="{{$persona[0]->id}}" id="id_persona" type="text">
                                            <label>calle</label>
                                            <input type="text" class="form-control" id="calle" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-6 pr-4">
                                        <div class="form-group">
                                            <label>calles</label>
                                            <input type="text" class="form-control" id="calles" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-1 pr-4">
                                        <div class="form-group">
                                            <label>numero</label>
                                            <input type="text" class="form-control" id="numero" placeholder="">
                                        </div>
                                    </div>

                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>ciudad</label>
                                            <input type="text" class="form-control" id="ciudad" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>estado</label>
                                            <input type="text" class="form-control" id="estado" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>pais</label>
                                            <input type="text" class="form-control" id="pais" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Colonia</label>
                                            <input type="text" id="colonia" name="value_specified" class="form-control " />
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label>Codigo postal</label>
                                            <input type="text" id="cp" name="value_specified" class="form-control " />
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div style="display: none;" class="second">
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Prestamos</label>
                                            <input type="text" class="form-control" id="prestamo" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Años</label>
                                            <input type="text" class="form-control" id="anos" placeholder="">
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Interes (%)</label>
                                            <input type="text" class="form-control" id="interes" placeholder="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-4 pr-1">
                                        <div class="form-group">
                                            <label>Tipo de pago</label>
                                            <select id="tipo" class="form-control w-100 h-100">
                                                <option value="mensual"> mensual</option>
                                                <option value="quincenal"> quincenal</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>Calcular prestamo</label>
                                            <a class="btn btn-danger calcular" id=""> Calcular </a>
                                        </div>
                                    </div>
                                    <div style="display:none;" class="pago col-md-4 pl-1">
                                        <div class="form-group">
                                            <label>total a pagar</label>
                                            <input type="text" class="form-control" id="pagos" placeholder="">
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="button-container mr-auto ml-auto pb-2">
                                <a style="display:none;" class="btn btn-danger regresar" id=""> Regresar </a>
                                <a class="btn btn-success siguiente " id=""> Siguiente </a>
                                <a style="display:none;" class="btn btn-success guardar " id=""> Guardar </a>
                            </div>
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
    $(document).ready(function() {
        $(".siguiente").click(function() {
            var tabla = $('.buroC');
            tabla.html('');
            var calle = $('#calle').val();
            var numero = $('#numero').val();
            var calles = $('#calles').val();
            var colonia = $('#colonia').val();
            var cp = $('#cp').val();
            tabla.append('<tr><td>' + calle + '</td><td >' + numero + '</td><td >' + calles + '</td><td>' + cp + '</td><td>' + colonia + '</td>  </tr>');
            $(".second").show();
            $(".guardar").show();
            $(".regresar").show();
            $(".first").hide();
            $(".siguiente").hide();
            $('.sss').show();

        });

        $(".regresar").click(function() {
            var tabla = $('.buroC');
            tabla.html('');
            $(".second").hide();
            $(".guardar").hide();
            $(".regresar").hide();
            $(".first").show();
            $(".siguiente").show();
            $('.sss').hide();

        });
        $(".calcular").click(function() {

            var prestamo = parseFloat($('#prestamo').val());
            var ano = parseFloat($('#anos').val());
            var interes = parseFloat($('#interes').val());
            var sip = "0." + interes;
            var yea = parseFloat(sip);
            var pago = prestamo * (1 + (ano * yea));
            var ss = ano * interes;
            console.log(prestamo, ano, interes, pago, ss, yea);
            $('#pagos').val(pago);
            $(".pago").show();
        });
        $(".guardar").click(function() {
            var calle = $('#calle').val();
            var numero = $('#numero').val();
            var calles = $('#calles').val();
            var colonia = $('#colonia').val();
            var cp = $('#cp').val();;
            var ciudad = $('#ciudad').val();
            var estado = $('#estado').val();
            var pais = $('#pais').val();
            var persona=$('#id_persona').val();

            var prestamo = parseFloat($('#prestamo').val());
            var ano = parseFloat($('#anos').val());
            var interes = parseFloat($('#interes').val());
            var tipo = $('#tipo').val();
            var pago = parseFloat($('#pagos').val());
            var token = $("input[name='_token']").val();
            $.ajax({
                url: '/guardarprestamo',
                type: 'POST',
                datatype: 'json',
                data: {
                    persona: persona,
                    calle: calle,
                    numero: numero,
                    calles: calles,
                    colonia: colonia,
                    cp: cp,
                    ciudad:ciudad,
                    estado:estado,
                    pais:pais,
                    prestamo:prestamo,
                    ano:ano,
                    interes:interes,
                    tipo:tipo,
                    pago:pago,
                    _token: token
                },
                success: function(response) {
                    if(response['credito']=='si'){
                            $.notify({
                                // options
                                message: 'El cliente se le ha asignado el credito con exito'
                            },{
                                // settings
                                type: 'success'
                            });}
                            else{
                                $.notify({
                                // options
                                message: 'El cliente no tiene permiso para una tarjeta de credito'
                            },{
                                // settings
                                type: 'danger'
                            });
                            }
                }
            });

        });
    });
</script>
@stop