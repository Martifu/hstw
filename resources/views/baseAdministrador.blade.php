@extends("base")
    <div class="wrapper">
        <div class="sidebar">
            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="http://www.creative-tim.com" class="simple-text">
                        <div class="btn fondo-logo">
                            <img class="size-logo" src="{{asset("img/Logo.png")}}">
                        </div>
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="dashboard.html">
                            <img src="{{asset("img/ic_person_24px.png")}}">
                            <p>Gestionar clientes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./user.html">
                            <img src="{{asset("img/ic_shopping_basket_24px.png")}}">
                            <p>Calcular prestamos</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./table.html">
                            <img src="{{asset("img/ic_import_contacts_24px.png")}}">
                            <p>Buro de credito</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./typography.html">
                            <img src="{{asset("img/ic_assignment_24px.png")}}">
                            <p>Reportes</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./icons.html">
                            <img src="{{asset("img/ic_work_24px.png")}}">
                            <p>Asignar prestamos</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./maps.html">
                            <img src="{{asset("img/ic_payment_24px.png")}}">
                            <p>Asignar tarjetas</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="./notifications.html">
                            <img src="{{asset("img/ic_account_balance_24px.png")}}">
                            <p>Cobraza</p>
                        </a>
                    </li>
                    <li class="nav-item active active-pro">
                        <a class="nav-link active" href="upgrade.html">
                            <img src="{{asset("img/ic_input_24px.png")}}">
                            <p>Salir</p>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <div class="main-panel">
            @section("Contenido-sidebar")

                @endsection
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


        </div>
    </div>

