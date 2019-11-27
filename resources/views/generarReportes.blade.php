@extends('templates.master')
<!-- Asi lo vas a llamar desde la base que es la de arriba como este ejemplo-->
@section('contenido')

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand"> Generar reportes </a>
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

    <div class="container">
        <div class="row">
            <div class="col-6">
                <h4 class="p-4">Generar reportes segun las opciones de abajo</h4>
                <div class="card p-4 m-4" style="max-width: 100%;">
                    <div class="card-header">
                        <h3>Elige la opcion:</h3>
                    </div>
                    <div class="card-body text-dark">
                        <div class="row">
                            <div class="col-12">
                                <button id="btn-nomfecha" class="btn-desing m-3" type="button">Nombre y fecha de nacimiento</button>
                            </div>
                            <div class="col-12">
                                <button id="btn-curp" class="btn-desing m-3" type="button">CURP</button>
                            </div>
                            <div class="col-12">
                                <button id="btn-rfc" class="btn-desing m-3" type="button">RFC</button>
                            </div>
                            <div class="col-12">
                                <button id="btn-numcliente" class="btn-desing m-3" type="button">Numero de cliente</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-6 align-self-center" id="cardbuscador">

            </div>
        </div>
    </div>
@stop