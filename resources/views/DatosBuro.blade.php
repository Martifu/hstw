@extends('templates.master')

@section('contenido')
    <nav class="navbar navbar-expand-lg " color-on-scroll="500">
        <div class="container-fluid">
            <a class="navbar-brand"> Buro de credito </a>
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
    <div class="card p-7 m-4" style="max-width: 100%;">
        <div class="card-header">
            <h3>Datos Personales</h3>
        </div>
        <div class="card-body text-dark">
            <table class="table table-hover">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellido paterno</th>
                    <th scope="col">Apellido materno</th>
                    <th scope="col">Fecha nacimiento</th>
                    <th scope="col">RFC</th>
                    <th scope="col">Folio de consulta</th>
                    <th scope="col">Fecha registro</th>
                    <th scope="col">Calle y N°</th>
                    <th scope="col">Colonia</th>
                    <th scope="col">Municipio</th>
                    <th scope="col">Estado</th>
                    <th scope="col">Codigo Postal</th>
                    <th scope="col">Ver detalles</th>
                </tr>
                </thead>
                <tbody>
                @foreach($personas as $persona)
                <tr>
                    <th>{{$persona['nombre']}}</th>
                    <td>{{$persona['apellido_p']}}</td>
                    <td>{{$persona['apellido_m']}}</td>
                    <td>{{$persona['fecha_nacimiento']}}</td>
                    <td>{{$persona['rfc']}}</td>
                    <th>{{$persona['calle']}}</th>
                    <td>{{$persona['colonia']}}</td>
                    <td>{{$persona['ciudad']}}</td>
                    <td>{{$persona['cp']}}</td>
                    
                    
                </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>

   
        </div>
    </div>

    @stop