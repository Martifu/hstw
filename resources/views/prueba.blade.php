@extends('baseAdministrador')
<!-- Asi lo vas a llamar desde la base que es la de arriba como este ejemplo-->
@section('Contenido-sidebar')

    <!-- Aqui adentro va a todo el contenido de las vistas -->

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
                <span class="navbar-toggler-bar burger-lines"></span>
            </button>
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <p style="font-size: 5em">Clientes</p>
                </li>
            </ul>
            <button class="btn btn-color" type="submit">Agregar</button>
            <input class="redondeadonorelieve" type="text" placeholder="buscar">
        </div>
    </nav>

    <table class="table table-hover">
        <thead>
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellidos</th>
            <th scope="col">CURP</th>
            <th scope="col">Direccion</th>
            <th scope="col">Acciones</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <th scope="row">1</th>
            <td>Mark</td>
            <td>Otto</td>
            <td>@mdo</td>
            <td>
                <button class="btn">e</button>
                <button class="btn">b</button>
                <button class="btn">b</button>
            </td>
        </tr>
        <tr>
            <th scope="row">2</th>
            <td>Jacob</td>
            <td>Thornton</td>
            <td>@fat</td>
            <td>
                <button class="btn btn-primary">e</button>
                <button class="btn">b</button>
                <button class="btn">b</button>
            </td>
        </tr>
        <tr>
            <th scope="row">3</th>
            <td colspan="2">Larry the Bird</td>
            <td>@twitter</td>
            <td>
                <button class="btn">e</button>
                <button class="btn">b</button>
                <button class="btn">b</button>
            </td>
        </tr>
        </tbody>
    </table>



@stop