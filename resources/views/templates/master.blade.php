<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="{{asset('assets/img/icon.ico')}}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HSTW</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/wbn-datepicker.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <link href="/css/stylesdatosgenerales.css" rel="stylesheet" />

    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <link href="css/baseAdmin.scss" rel="stylesheet">
    <link href="fontawesome/css/all.min.css" rel="stylesheet">
    <link href="datepicker/css/datepicker.css" rel="stylesheet">
    <link href="css/login.scss" rel="stylesheet" />

</head>

<body>
@if (Session::has('usuario'))
<div class="wrapper">
    <div class="sidebar" data-color="purple">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    <img class="" src="{{asset("img/Logo.png")}}" width="100">
                </a>
            </div>
            <ul class="nav">
                <li id="gestionClientes">
                    <a class="nav-link" href="/personas">
                        <img src="{{asset("img/ic_person_24px.png")}}">
                        <p>Gestionar clientes</p>
                    </a>
                </li>
                <li id="calcularPrestamos">
                    <a class="nav-link" href="/prestamos">
                        <img src="{{asset("img/ic_shopping_basket_24px.png")}}">
                        <p>Calcular prestamos</p>
                    </a>
                </li>
                <li id="buroCredito">
                    <a class="nav-link" href="/Burocredito">
                        <img src="{{asset("img/ic_import_contacts_24px.png")}}">
                        <p>Buro de credito</p>
                    </a>
                </li>
                <li id="reportes">
                    <a class="nav-link" href="/reportes">
                        <img src="{{asset("img/ic_assignment_24px.png")}}">
                        <p>Reportes</p>
                    </a>
                </li>
                <li id="AsignarPrestamos">
                    <a class="nav-link" href="/credito">
                        <img src="{{asset("img/ic_work_24px.png")}}">
                        <p>Asignar prestamos</p>
                    </a>
                </li>
                <li id="asignarTarjetas">
                    <a class="nav-link" href="/tarjetas">
                        <img src="{{asset("img/ic_payment_24px.png")}}">
                        <p>Asignar tarjetas</p>
                    </a>
                </li>
                <li id="cobranza">
                    <a class="nav-link" href="/cobranza">
                        <img src="{{asset("img/ic_account_balance_24px.png")}}">
                        <p>Cobraza</p>
                    </a>
                </li>
                <li class="nav-item  active-pro">
                    <a class="nav-link " href="cerrarsesion">
                        <img src="{{asset("img/ic_input_24px.png")}}">
                        <p style="color: #1b1e21">Salir</p>
                    </a>
                </li>
            </ul>
        </div>
    </div>

    <div class="main-panel">
       @yield('contenido', 'Default Content')
    </div>
</div>
@else

    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-12 col-md-6 col-xl-6 d-none d-sm-none d-md-block margin-login">
                <img class="figura" src="{{asset("img/Figura.png")}}">
            </div>
            <div class="col-sm-12 col-md-6 col-xl-6 margin-login">
                <div class="row">
                    <div class="col-12 text-center">
                        <img class="tamano-logo" src="{{asset("img/Logo.png")}}">
                    </div>
                    <div class="col-12">
                        <div class="bs-example">
                            <div class="form-group">
                                <label class="float-label" for="exampleInputEmail1">Correo electronico</label>
                                <input type="email" class="form-control" name="inputCorreo" id="inputCorreo" required>
                                <span class="form-highlight"></span>
                                <span class="form-bar"></span>
                            </div>
                            <div class="form-group">
                                <label class="float-label" for="exampleInputEmail1">Password</label>
                                <input type="password" class="form-control" name="inputPassword" id="inputPassword"
                                       required>
                                <span class="form-highlight"></span>
                                <span class="form-bar"></span>
                            </div>
                            <div class="text-center">
                                <button type="button" id="btniniciarsesion" class="btn-color"> Iniciar sesion</button>
                            </div>
                            <div id="notificacion"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endif

</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="js/administrador.js" type="text/javascript"></script>
<script src="js/reportes.js" type="text/javascript"></script>
<script src="js/cobranza.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/wbn-datepicker.min.js"></script>
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<script src="{{asset('js/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('js/dataTables.bootstrap.min.js')}}"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="js/login.js"></script>

<script src="../assets/js/demo.js"></script>

@yield('javascript')
</html>
