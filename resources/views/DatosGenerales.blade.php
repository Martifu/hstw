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
                        <h6 class="curp"></h6>
                        <h6 class="rfc"></h6>
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
                            <h5>Apellidos:</h5>
                            <input name="apellido_p" class="apellido_p">
                        </div>
                        <div class="form-group" style="margin-right: 1%;">
                            <h5>Fecha de nacimiento:</h5>
                            <input name="nacimiento" class="nacimiento">
                        </div>
                        <div class="form-group">
                            <h5>Curp:</h5>
                            <input name="curp" class="c">
                        </div>
                        <div class="form-group">
                            <h5>RFC:</h5>
                            <input name="rfc" class="r">
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="button" name="update" class="btn btn-primary act">Actualizar</button>
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
                    <h5 class="modal-title" id="exampleModalLongTitle">Eliminar?</h5>
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
                            <input name="nombre" class="nombren" style="width:100%; ">
                        </div>
                        <div class="form-group col-6" style="" >
                            <h5>Apellido Paterno:</h5>
                            <input name="apellido_p" class="apellido_pn">
                        </div>
                        <div class="form-group col-6" >
                            <h5>Apellido Materno:</h5>
                            <input name="apellido_m" class="apellido_mn" style="width: 180px;">
                        </div>
                        <div class="form-group col-6">
                            <h5>RFC:</h5>
                            <input name="rfc" class="rn" style="">
                        </div>
                        <div class="form-group col-6">
                            <h5>Curp:</h5>
                            <input name="curp" class="cn"  style="width: 180px;">
                        </div>
                        <div class="form-group col-6" style="">
                            <h5>Fecha de nacimiento:</h5>
                            <input name="nacimiento" class="nacimienton">
                        </div>
                        <div class="form-group col-6">
                            <h5>Calle:</h5>
                            <input name="calle" class="calle"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Numero:</h5>
                            <input name="numero" class="numero"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Calles:</h5>
                            <input name="calles" class="calles"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Codigo Postal:</h5>
                            <input name="cp" class="cp"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Colonia:</h5>
                            <input name="colonia" class="colonia"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Ciudad:</h5>
                            <input name="ciudad" class="ciudad"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Estado:</h5>
                            <input name="estado" class="estado"  style="width: 180px;">
                        </div><div class="form-group col-6">
                            <h5>Pais:</h5>
                            <input name="pais" class=pais""  style="width: 180px;">
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
                        $(".nom").html(response['nombre'] + " " + response['apellido_p']);
                        $(".nac").html("Fecha de nacimiento: " + response['fecha_nacimiento']);
                        $(".curp").html("CURP: " + response['curp']);
                        $(".rfc").html("RFC: " + response['rfc']);
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
                        $("input[name=id]").attr("placeholder", response['id']);
                        $("input[name=nombre]").attr("placeholder", response['nombre']);
                        $("input[name=apellido_p]").attr("placeholder", response['apellido_p']);
                        $("input[name=nacimiento]").attr("placeholder", response['fecha_nacimiento']);
                        $("input[name=curp]").attr("placeholder", response['curp']);
                        $("input[name=rfc]").attr("placeholder", response['rfc']);
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
                console.log(curp);
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
                        _token: token
                    },
                    success: function (response) {
                        console.log(response["curp"]);
                        alert("usuario actualizado");
                        $(".n").val("");
                        $(".n").attr("placeholder", response["nombre"]);
                        $(".apellido_p").val("");
                        $(".apellido_p").attr("placeholder", response["apellido_p"]);
                        $(".nacimiento").val("");
                        $(".nacimiento").attr("placeholder", response["fecha_nacimiento"]);
                        $(".c").val("");
                        $(".c").attr("placeholder", response["curp"]);
                        $(".r").val("");
                        $(".r").attr("placeholder", response["rfc"]);

                    }
                });


                location.reload();
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
                        $(".elim").html(response['nombre'] + " " + response['apellido_p']+ " " + response['apellido_m']);
                        $(".idel").val(response['id'])
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
                var nombre = $('.nombren').val();
                var apellido_p = $('.apellido_pn').val();
                var apellido_m = $('.apellido_mn').val();
                var nacimiento = $('.nacimienton').val();
                var curp = $('.cn').val();
                var rfc = $('.rn').val();
                var token = $("input[name=_token]").val();
                var calle= $('calle').val();
                var numero= $('numero').val();
                var calles= $('calles').val();
                var cp= $('cp').val();
                var colonia= $('colonia').val();
                var ciudad= $('ciudad').val();
                var estado= $('estado').val();
                var pais= $('pais').val();

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
                        console.log(response)
                    }
                });

            })
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
