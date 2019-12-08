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
                                <a  class="btn btn-info btn-fill pull-right" id="checar" style="color: white">Verificar</a>
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

        });
    </script>
@stop

