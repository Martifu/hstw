@extends('templates.master')

@section('contenido')
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand"> Area de cobranza </a>
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
    <div class="card p-4 m-4" style="max-width: 100%;">
        <div class="card-header">
            <h3>Personas con deudas</h3>
        </div>
        <div class="card-body text-dark">
            <table class="table table-hover" id="tabla_personas">
                <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Fecha nacimiento</th>
                    <th scope="col">CURP</th>
                    <th scope="col">Ver detalles</th>
                </tr>
                </thead>
                <tbody>
                @foreach($personas as $persona)
                <tr>
                    <td><input id="id_tabla_cliente" class="id" type="hidden" value="{{$persona['id']}}"></td>
                    <th>{{$persona['nombre']}}</th>
                    <td>{{$persona['apellido_p']}}</td>
                    <td>{{$persona['apellido_m']}}</td>
                    <td>{{$persona['fecha_nacimiento']}}</td>
                    <td>{{$persona['curp']}}</td>
                    <td>
                        <button class="btn-desing" id="btncobranzatabla">
                            <img src="img/informacion.png" width="100%">
                        </button>
                    </td>
                </tr>
                    @endforeach
                </tbody>
                @csrf
            </table>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="modaltabla" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h3 class="modal-title" id="exampleModalLongTitle">Deudas:</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <table class="table table-hover" id="tabla_deudas_cliente">
                        <thead>
                        <tr>
                            <th scope="col">Pago $</th>
                            <th scope="col">Fecha de pago</th>
                            <th scope="col">Limite de fecha de pago</th>
                        </tr>
                        </thead>
                        <tbody id="datos_tabla">

                        </tbody>
                    </table>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-info pull-right" data-dismiss="modal">Cerrar</button>
                </div>
            </div>
        </div>
    </div>

    @stop