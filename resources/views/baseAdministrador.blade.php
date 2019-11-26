@extends("base")


@section('contenido')
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
                <!-- aqui adentro va todo el contenido, este lo vas a llamar en tu nueva vista -->

                @show
        </div>
    </div>
@stop

