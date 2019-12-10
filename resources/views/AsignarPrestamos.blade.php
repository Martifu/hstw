@extends('templates.master')

@section('contenido')

    <nav class="navbar col-md-12 col-sm-12">
        <a class="navbar-brand"> Calcular Prestamos </a>
        <div class="d-inline-flex">
            <input class="form-control mr-sm-2" id="buscador" type="search" placeholder="Buscar" aria-label="Search">
        </div>
    </nav>

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
                        <th class="movilhidden">Calcular Prestamo</th>
                    </tr>
                    </thead>
                    <tbody style="color: black;" class="tabla prueba">

                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade modal-update" id="exampleModalCenter" tabindex="-1" role="dialog"
         aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Calcular Prestamo</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="container ">
                        <form method="post" action="calcularprestamo" class="was-validated">
                            @csrf
                            <input name="id" class="id col-md-12" hidden="false">
                            <input type='text' class='form-control' name='curpCliente' id='curpCliente' hidden="false"
                                   placeholder='' value=''>
                            <div class="form-group text-center">
                                <h5>Nombre: </h5>
                                <label name="nombre" class="nombre"></label>
                            </div>
                            <div class="form-group col-12 " >
                                <label for="">Monto solicitado:</label><br>
                                <input name="monto" class="form-control is-valid" style="width: 100%;" placeholder="$$$$$$$$$$$$$$$$$$$$$$$$$$$" required>
                            </div>
                            <div class="col-12 form-group">
                                <label for="">Cantidad de años del prestamo:</label>
                                <select class="form-control" name="anos" class="custom-select" required>
                                    <option value=""></option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                    <option>6</option>
                                    <option>7</option>
                                    <option>8</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="">Tipo de Pago:</label>
                                <select class="selectpicker form-control" name="tp" required>
                                    <option value=""></option>
                                    <option>Mensual</option>
                                    <option>Quincenal</option>
                                </select>
                            </div>
                            <div class="col-12">
                                <label for="">Tasa de interes %:</label>
                                <select class="selectpicker form-control" name="interes"required>
                                    <option></option>
                                    <option>1</option>
                                    <option>3</option>
                                    <option>5</option>
                                    <option>10</option>
                                    <option>15</option>
                                    <option>20</option>
                                    <option>30</option>
                                    <option>35</option>
                                </select>
                            </div>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                    <button type="submit" name="update" class="btn btn-success act">Calcular Prestamo</button>
                    </form>
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
                dataType: 'json',
                type: 'GET',
                success: function (response) {
                    $.each(response, function (index, elemento) {
                        $(".prueba").append('<tr>                                <td value=' + elemento.id + ' class="movilhidden" >' + elemento.id + '</td>\n' +
                            '                                <td value=""  class="tnom">' + elemento.nombre + '</td>\n' +
                            '                                <td value="" class="tapellidos">' + elemento.apellido_p + ' ' + elemento.apellido_m + '</td>\n' +
                            '                                <td value=""  class="movilhidden tnacimiento">' + elemento.fecha_nacimiento + '</td>\n' +
                            '                                <td value="" class="movilhidden tcurp">' + elemento.curp + '</td>\n' +
                            '                                <td><button class="btn btn-danger btn-act text-danger" style="height: 40px;" value=' + elemento.id + '><i class="fas fa-file-alt"></i></button></td>\n' +
                            '                                <td></td>\n' +
                            '                                </tr>')
                    })
                }
            })
        });

        $(".table").on('click', '.btn-act', function () {
            $(".modal-update").modal("show");
            var id = $(this).val();
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
                    $(".nombre").html(response['nombre'] + ' ' + response['apellido_p']);
                    $("#curpCliente").val(response['curp']);
                }
            });


        });

        $(document).ready(function () {
            $("#buscador").keyup(function () {
                _this = this;
                $.each($("table tbody tr"), function () {
                    if ($(this).text().toLowerCase().indexOf($(_this).val().toLowerCase()) === -1)
                        $(this).hide();
                    else
                        $(this).show();
                });
            });
        });

    </script>
@stop
