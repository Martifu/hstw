@extends('templates.master')

@section('contenido')

    <nav class="navbar col-md-12 col-sm-12 movilhidden">
        <a class="navbar-brand ">Clientes</a>
        <form class="form-inline alinline ">
            <button class="btn btn-info my-sm-0 my-0 buttonbase" type="submit">Buscar</button>
            <input class="form-control mr-sm-2" type="search" placeholder="Buscar" aria-label="Search">
        </form>
    </nav>

     <!--BUSCADOR EN MOVIL--->
    <div class="">
        <div class=" caja container-fluid barra-movi pchidden nav navbar-default navbar-fixed-top">
            <div class="row text-center align-center">
                <h5 class="col-sm-12">Clientes</h5>
                <input class="input-movil form-control col-sm-12" placeholder="Buscar" type="text">
                <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                    <span class="navbar-toggler-bar burger-lines"></span>
                </button>
            </div>
        </div>
    </div>




    <div class="container col-md-12 col-sm-12">
        <div class="row ">
            <div class="">
                <div class="">
                    <table class="table striped">
                        <thead>
                        <tr>
                            <th class="movilhidden">ID</th>
                            <th>Nombre</th>
                            <th>Apellidos</th>
                            <th class="movilhidden">Fecha de Nacimiento</th>
                            <th class="movilhidden">CURP</th>

                        </tr>
                        </thead>
                        <tbody style="color: black;" >
                        @foreach ($usuarios ?? '' as $u)
                            <tr>
                                <td class="movilhidden" value="">{{$u->id}}</td>
                                <td value="">{{$u->nombre}}</td>
                                <td value="">{{$u->apellido_p}} {{$u->apellido_m}}</td>
                                <td value="" class="movilhidden">{{$u->fecha_nacimiento}}</td>
                                <td value="" class="movilhidden">{{$u->curp}}</td>

                                <td><button class="btn btn-danger btn-delete" value="{{$u}}"></button></td>
                                <td><button class="btn btn-info" value="{{$u}}"></button></td>
                                <td><button class="btn btn-primary btn-act"  value="{{$u}}"></button></td>

                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>

        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-inf" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary">Save changes</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-update" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Actualizar Informacion del Cliente</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container-fluid row">
                        @csrf
                        <input name="id" class="id col-md-12">
                        <input name="nombre" class="n">
                        <input name="nacimiento" class="nacimiento">
                        <input name="apellido_p" class="apellido_p">
                        <input name="curp" class="curp">
                        <input name="rfc" class="rfc">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" name="update" class="btn btn-primary act">Actualizar</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade modal-delete" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
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
                        <input name="id" class="idel col-md-12">
                        <H6>Esta seguro que quiere eliminar a:</H6>
                        <h4 class="elim"></h4>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" name="del" class="btn btn-primary del">eliminar</button>
                </div>
            </div>
        </div>
    </div>
@stop

@section('javascript')
    <script>
        $(document).ready(function () {
            $(".btn-info").click(function () {
                $(".modal-inf").modal("show");
                var persona=$(this).val();
                var perObj= JSON.parse(persona);
                $(".nom").html(perObj['nombre']+" "+perObj['apellido_p']);
                $(".nac").html("Fecha de nacimiento: "+perObj['fecha_nacimiento']);
                $(".curp").html("CURP: "+perObj['curp']);
                $(".rfc").html("RFC: "+perObj['rfc']);
            });


            $(".btn-act").click(function () {
                $(".modal-update").modal("show");
                var persona=$(this).val();
                var perObj= JSON.parse(persona);
                $("input[name=id]").attr("placeholder",perObj['id']);
                $("input[name=nombre]").attr("placeholder",perObj['nombre']);
                $("input[name=apellido_p]").attr("placeholder",perObj['apellido_p']);
                $("input[name=nacimiento]").attr("placeholder",perObj['fecha_nacimiento']);
                $("input[name=curp]").attr("placeholder",perObj['curp']);
                $("input[name=rfc]").attr("placeholder",perObj['rfc']);
            });
            $(".act").click(function () {
                var id = $('.id').attr("placeholder");
                var nombre = $('.n').val();
                var apellido_p = $('.apellido_p').val();
                var nacimiento = $('.nacimiento').val();
                var curp = $('.curp').val();
                var rfc = $('.rfc').val();
                var token=$("input[name=_token]").val();
                console.log(nombre);
                $.ajax({
                    url:'/actualizar',
                    dataType:'json',
                    type:'POST',
                    data:{
                        nombre:nombre,
                        id:id,
                        apellido_p:apellido_p,
                        nacimiento:nacimiento,
                        curp:curp,
                        rfc:rfc,
                        _token:token
                    },
                    success:(function(response){
                        console.log(response.nombre);
                    })
                })
            });


            $(".btn-delete").click(function () {
                $(".modal-delete").modal("show");
                var persona=$(this).val();
                var perObj= JSON.parse(persona);
                $(".elim").html(perObj['nombre']+" "+perObj['apellido_p']);
                $(".idel").val(perObj['id'])

            });

            $(".del").click(function () {
                var id = $('.idel').val();
                var token=$("input[name=_token]").val();
                $.ajax({
                    url:'/borrarpersona',
                    dataType:'json',
                    type:'POST',
                    data:{
                        id:id,
                        _token:token
                    },
                    success:(function(response){
                        console.log(response.nombre);
                    })
                })
            });

        });
    </script>
    @stop
