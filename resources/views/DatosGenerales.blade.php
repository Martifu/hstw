@extends('templates.master')

@section('contenido')

    <nav class="navbar col-md-12 col-sm-12 movilhidden">
        <a class="navbar-brand"> Clientes </a>
        <div class="d-inline-flex">
                <button class="btn btn-info  my-sm-0 my-0 buttonbase Agregar" >Agregar</button>
            <input class="form-control mr-sm-2" id="buscador" type="search" placeholder="Buscar" aria-label="Search">

        </div>
    </nav>

    <!--BUSCADOR EN MOVIL--->
    <div class="">
        <div class=" caja container-fluid barra-movi pchidden nav navbar-default navbar-fixed-top">
            <div class="row text-center align-center">
                <h5 class="col-sm-12">Clientes</h5>
                <input class="input-movil form-control col-sm-12" placeholder="Agregar" type="text">
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
            </div>
        </div>
    </div>




    <div class="card p-4 m-4">
        <div class="row ">
                <div class="card-body">
                    <table class="table">
                        <thead>
                        <tr>
                            <th class="movilhidden">ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th class="movilhidden">Fecha de Nacimiento</th>
                            <th class="movilhidden">CURP</th>

                        </tr>
                        </thead>
                        <tbody style="color: black;" class="tabla prueba">

                        </tbody>
                    </table>
                </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-inf" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Información Del Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        <h6 class="nom"></h6>
                        <h6 class="nac"></h6>
                        <h6 class="rfc"></h6>
                        <h6 class="curp"></h6>
                        <h6 class="pais"></h6>
                        <h6 class="estado"></h6>
                        <h6 class="ciudad"></h6>
                        <h6 class="colonia"></h6>
                        <h6 class="cp"></h6>
                        <h6 class="calle"></h6>
                        <h6 class="numero"></h6>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade modal-update" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Informacion del Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container row">
                        @csrf
                        <input name="id" class="id col-md-12" hidden="false">
                        <div class="form-group" style="margin-right: 1%;">
                            <h5>Nombre: </h5>
                            <input name="nombre" class="n" style="">
                        </div>
                        <div class="form-group " >
                            <h5>Apellido Paterno:</h5>
                            <input name="apellido_p" class="apellido_p">
                        </div>
                        <div class="form-group "  style="margin-right: 1%;">
                            <h5>Apellido Materno:</h5>
                            <input name="apellido_m" class="apellido_m">
                        </div>
                        <div class="form-group" >
                            <h5>Fecha de nacimiento:</h5>
                            <input name="nacimiento" class="nacimiento">
                        </div>
                        <div class="form-group" style="margin-right: 1%;">
                            <h5>Curp:</h5>
                            <input name="curp" class="c">
                        </div>
                        <div class="form-group">
                            <h5>RFC:</h5>
                            <input name="rfc" class="r">
                        </div>
                        <div class="form-group col-12">
                            <input type="checkbox"  name="customRadio" class="check" style="" >
                            <label class="custom-control-label" for="customRadio2">Modificar Direcciones</label>
                        </div>

                       <div class="ap row">
                       </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="update" class="btn btn-primary act">Actualizar</button>
                </div>
            </div>
        </div>
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-delete" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid">
                        @csrf
                        <input name="id" class="idel col-md-12" hidden="false">
                        <H6>Esta seguro que quiere eliminar a:</H6>
                        <h4 class="elim"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="del" class="btn btn-danger del">eliminar</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-create" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Agregar un nuevo cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container row">
                        @csrf
                        <div class="form-group col-12 text-center" >
                            <h5>Nombre: </h5>
                            <input required class="form-control " name="nombrenew" class="nombren" style="width:100%; ">
                        </div>
                        <div class="form-group col-6" style="" >
                            <h5>Apellido Paterno:</h5>
                            <input required class="form-control " name="apellido_pnew" class="apellido_pn">
                        </div>
                        <div class="form-group col-6" >
                            <h5>Apellido Materno:</h5>
                            <input required class="form-control " name="apellido_mnew" class="apellido_mn" style="width: 180px;">
                        </div>
                        <div class="form-group col-6">
                            <h5>RFC:</h5>
                            <input required class="form-control " name="rfcnew" class="rn" style="">
                        </div>
                        <div class="form-group col-6">
                            <h5>Curp:</h5>
                            <input required class="form-control " name="curpnew" class="cn"  style="width: 180px;">
                        </div>
                        <div class="form-group col-6" style="">
                            <h5>Fecha de nacimiento:</h5>
                            <input required class="form-control " name="nacimientonew" class="nacimienton">
                        </div>
                        <div class="form-group col-6">
                            <h5>Calle:</h5>
                            <input required class="form-control " name="callenew" class="calle"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Numero:</h5>
                            <input required class="form-control " name="numeronew" class="numero"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Calles:</h5>
                            <input required class="form-control " name="callesnew" class="calles"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Codigo Postal:</h5>
                            <input required class="form-control " name="cpnew" class="cp"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Colonia:</h5>
                            <input required class="form-control " name="colonianew" class="colonia"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Ciudad:</h5>
                            <input required class="form-control " name="ciudadnew" class="ciudad"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Estado:</h5>
                            <input required class="form-control " name="estadonew" class="estado"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Pais:</h5>
                            <input required class="form-control " name="paisnew" class="pais"  style="width: 180px;">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="update" class="btn btn-primary reg">Registrar</button>
                </div>
            </div>
        </div>
    </div>


@stop

@section('javascript')
    <script>

            $(document).ready(function () {
                $.ajax({
                    url: '/traerpersonas',
                    dataType:'json',
                    type:'GET',
                    success: function(response) {
                        $.each(response, function (index,elemento) {
                            $(".prueba").append('<tr>                                <td value='+elemento.id+' class="movilhidden" >'+elemento.id+'</td>\n' +
                                '                                <td value=""  class="tnom">'+elemento.nombre+'</td>\n' +
                                '                                <td value="" class="tapellidos">'+elemento.apellido_p+' '+elemento.apellido_m+'</td>\n' +
                                '                                <td value=""  class="movilhidden tnacimiento">'+elemento.fecha_nacimiento+'</td>\n' +
                                '                                <td value="" class="movilhidden tcurp">'+elemento.curp+'</td>\n' +
                                '                                <td><button class="btn btn-danger btn-delete text-danger" style="height: 40px;" value='+elemento.id+'><i class="fas fa-trash-alt"></i></button></td>\n' +
                                '                                <td><button class="btn btn-inf btn-warning" style="height: 40px;" value='+elemento.id+'><i class="fas fa-eye"></i></button></td>\n' +
                                '                                <td><button class="btn btn-primary btn-act" style="height: 40px;"  value='+elemento.id+'><i class="fas fa-user-edit"></i></button></td>\n' +
                                '                                <td></td>\n' +
                                '                                </tr>')
                        })
                    }
                })
            });

            $(".table").on('click','.btn-delete',function () {
                $(".modal-delete").modal("show");
                var id = $(this).val();
                var token = $("input[name=_token]").val();
                $.ajax({
                    url: '/actualizarpersona',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (response) {
                        $(".elim").html(response.persona['nombre'] + " " + response.persona['apellido_p']+ " " + response.persona['apellido_m']);
                        $(".idel").val(response.persona['id'])
                    }
                });
            });

            $(".del").click(function () {
                var id = $('.idel').val();
                var token = $("input[name=_token]").val();
                $.ajax({
                    url: '/borrarpersona',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: (function (response) {
                        console.log(response.nombre);
                    })
                });
                location.reload();

            });

            $('.Agregar').click(function () {

                $('.modal-create').modal('show');

                $(".reg").click(function () {
                    var nombre = $("input[name=nombrenew]").val();
                    var apellido_p = $("input[name=apellido_pnew]").val();
                    var apellido_m = $("input[name=apellido_mnew]").val();
                    var nacimiento = $("input[name=nacimientonew]").val();
                    var curp = $("input[name=curpnew]").val();
                    var rfc = $("input[name=rfcnew]").val();
                    var token = $("input[name=_token]").val();
                    var pais =$("input[name=paisnew]").val();
                    var estado =$("input[name=estadonew]").val();
                    var ciudad =$("input[name=ciudadnew]").val();
                    var colonia =  $("input[name=colonianew]").val();
                    var calles =  $("input[name=callesnew]").val();
                    var calle =  $("input[name=callenew]").val();
                    var numero =  $("input[name=numeronew]").val();
                    var cp = $("input[name=cpnew]").val();
                    console.log(nombre);

                    $.ajax({
                        url: '/registrar',
                        dataType: 'json',
                        type: 'POST',
                        data: {
                            nombre: nombre,
                            apellido_p: apellido_p,
                            apellido_m: apellido_m,
                            nacimiento: nacimiento,
                            curp: curp,
                            rfc: rfc,
                            calle: calle,
                            numero: numero,
                            calles: calles,
                            cp: cp,
                            colonia: colonia,
                            ciudad: ciudad,
                            estado: estado,
                            pais: pais,
                            _token: token
                        },
                        success: function (response) {

                        }
                    })
                });
                location.reload();
            });

            $(".table").on('click','.btn-inf',function () {
                $(".modal-inf").modal("show");
                var id = $(this).val();
                var token = $("input[name=_token]").val();
                $.ajax({
                    url: '/actualizarpersona',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (response) {
                        $(".nom").html(response.persona['nombre'] + " " + response.persona['apellido_p']+ " " + response.persona['apellido_m']);
                        $(".nac").html("Fecha de nacimiento: " + response.persona['fecha_nacimiento']);
                        $(".curp").html("CURP: " + response.persona['curp']);
                        $(".rfc").html("RFC: " + response.persona['rfc']);
                        $(".pais").html("Pais: " + response.direccion['pais']);
                        $(".estado").html("Estado: " + response.direccion['estado']);
                        $(".ciudad").html("Ciudad: " + response.direccion['ciudad']);
                        $(".colonia").html("Colonia: " + response.direccion['colonia']);
                        $(".cp").html("Codigo Postal: " + response.direccion['cp']);
                        $(".calle").html("Calle: " + response.direccion['calle']);
                        $(".numero").html("Numero: " + response.direccion['numero']);
                    }
                });

            });


            $(".table").on('click','.btn-act',function () {
                $(".modal-update").modal("show");
                var id=$(this).val();
                console.log(id);
                var token = $("input[name=_token]").val();

                $.ajax({
                    url: '/actualizarpersona',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        id: id,
                        _token: token
                    },
                    success: function (response) {
                        $("input[name=id]").attr("placeholder", response.persona['id']);
                        $("input[name=nombre]").attr("placeholder", response.persona['nombre']);
                        $("input[name=apellido_p]").attr("placeholder", response.persona['apellido_p']);
                        $("input[name=apellido_m]").attr("placeholder", response.persona['apellido_m']);
                        $("input[name=nacimiento]").attr("placeholder", response.persona['fecha_nacimiento']);
                        $("input[name=curp]").attr("placeholder", response.persona['curp']);
                        $("input[name=rfc]").attr("placeholder", response.persona['rfc']);
                    }
                });
                $('.check').on( 'click', function() {
                    if ($(this).is(':checked')) {
                        // Hacer algo si el checkbox ha sido seleccionado
                        $.ajax({
                            url: '/actualizarpersona',
                            dataType: 'json',
                            type: 'POST',
                            data: {
                                id: id,
                                _token: token
                            },
                            success: function (response) {
                                $("input[name=paisu]").attr("placeholder", response.direccion['pais']);
                                $("input[name=ciudadu]").attr("placeholder", response.direccion['ciudad']);
                                $("input[name=estadou]").attr("placeholder", response.direccion['estado']);
                                $("input[name=calleu]").attr("placeholder", response.direccion['calle']);
                                $("input[name=coloniau]").attr("placeholder", response.direccion['colonia']);
                                $("input[name=callesu]").attr("placeholder", response.direccion['calles']);
                                $("input[name=cpu]").attr("placeholder", response.direccion['cp']);
                                $("input[name=numerou]").attr("placeholder", response.direccion['numero']);
                            }
                        });
                        $(".ap").append('  <div class="apr row">\n' + ' <div class="form-group col-6 ">\n' +
                            '                            <h5>Calle:</h5>\n' +
                            '                            <input required class="form-control " name="calleu" class="calleu"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Numero:</h5>\n' +
                            '                            <input required class="form-control " name="numerou" class="numerou"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Calles:</h5>\n' +
                            '                            <input required class="form-control " name="callesu" class="callesu"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Codigo Postal:</h5>\n' +
                            '                            <input required class="form-control " name="cpu" class="cpu"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Colonia:</h5>\n' +
                            '                            <input required class="form-control " name="coloniau" class="coloniau"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Ciudad:</h5>\n' +
                            '                            <input required class="form-control " name="ciudadu" class="ciudadu"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Estado:</h5>\n' +
                            '                            <input required class="form-control " name="estadou" class="estadou"  style="width: 180px;">\n' +
                            '                        </div><div class="form-group col-6">\n' +
                            '                            <h5>Pais:</h5>\n' +
                            '                            <input required class="form-control " name="paisu" class="paisu"  style="width: 180px;">\n' +
                            '                        </div>\n'+
                            '                       </div>');
                    }else {
                        // Hacer algo si el checkbox ha sido deseleccionado
                        $('.apr').remove();
                    }
                });

            });
            $(".act").click(function () {
                var id = $('.id').attr("placeholder");
                var nombre = $('.n').val();
                var apellido_p = $('.apellido_p').val();
                var nacimiento = $('.nacimiento').val();
                var curp = $('.c').val();
                var rfc = $('.r').val();
                var token = $("input[name=_token]").val();
                var pais =$("input[name=paisu]").val();
                var estado =$("input[name=estadou]").val();
                var ciudad =$("input[name=ciudadu]").val();
                var colonia =  $("input[name=coloniau]").val();
                var calles =  $("input[name=callesu]").val();
                var calle =  $("input[name=calleu]").val();
                var numero =  $("input[name=numerou]").val();
                var cp = $("input[name=cpu]").val();

                $.ajax({
                    url: '/actualizar',
                    dataType: 'json',
                    type: 'POST',
                    data: {
                        nombre: nombre,
                        id: id,
                        apellido_p: apellido_p,
                        nacimiento: nacimiento,
                        curp: curp,
                        rfc: rfc,
                        pais:pais,
                        estado:estado,
                        ciudad:ciudad,
                        colonia:colonia,
                        calles:calles,
                        calle:calle,
                        numero:numero,
                        cp:cp,
                        _token: token
                    },
                    success: function (response) {
                        alert("usuario actualizado");
                        $(".n").val("");
                        $(".n").attr("placeholder", response.persona["nombre"]);
                        $(".apellido_p").val("");
                        $(".apellido_p").attr("placeholder", response.persona["apellido_p"]);
                        $(".apellido_m").val("");
                        $(".apellido_m").attr("placeholder", response.persona["apellido_m"]);
                        $(".nacimiento").val("");
                        $(".nacimiento").attr("placeholder", response.persona["fecha_nacimiento"]);
                        $(".paisu").val("");
                        $(".paisu").attr("placeholder", response.direccion["pais"]);
                        $(".estadou").val("");
                        $(".estadou").attr("placeholder", response.direccion["estado"]);
                        $(".coloniau").val("");
                        $(".coloniau").attr("placeholder", response.direccion["colonia"]);
                        $(".ciudadu").val("");
                        $(".ciudadu").attr("placeholder", response.direccion["ciudad"]);
                        $(".calleu").val("");
                        $(".calleu").attr("placeholder", response.direccion["calle"]);
                        $(".callesu").val("");
                        $(".callesu").attr("placeholder", response.direccion["calles"]);
                        $(".numerou").val("");
                        $(".numerou").attr("placeholder", response.direccion["numero"]);
                        $(".cpu").val("");
                        $(".cpu").attr("placeholder", response.direccion["cp"]);


                    }
                });
                location.reload();
            });


            $(document).ready(function(){
                $("#buscador").keyup(function() {
                    _this = this;
                    $.each($("table tbody tr"), function() {
                        if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                            $(this).hide();
                        else
                            $(this).show();
                    });
                });
            });

    </script>
@stop
