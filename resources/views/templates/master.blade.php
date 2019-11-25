<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>HSTW</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/wbn-datepicker.css" rel="stylesheet" />
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet" />
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
</head>

<body>
<div class="wrapper">
    <div class="sidebar" data-color="purple">
        <!--
    Tip 1: You can change the color of the sidebar using: data-color="purple | blue | green | orange | red"

    Tip 2: you can also add an image using data-image tag
-->
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="http://www.creative-tim.com" class="simple-text">
                    <img class="" src="{{asset("img/Logo.png")}}" width="100">
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
                    <a class="nav-link" href="/tarjetas">
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
                <li class="nav-item  active-pro">
                    <a class="nav-link " href="upgrade.html">
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


</body>

<!--   Core JS Files   -->
<script src="../assets/js/core/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="../assets/js/core/popper.min.js" type="text/javascript"></script>
<script src="../assets/js/core/bootstrap.min.js" type="text/javascript"></script>
<script src="../assets/js/wbn-datepicker.min.js"></script>
<script src="../assets/js/plugins/bootstrap-switch.js"></script>
<!--  Chartist Plugin  -->
<script src="../assets/js/plugins/chartist.min.js"></script>
<!--  Notifications Plugin    -->
<script src="../assets/js/plugins/bootstrap-notify.js"></script>
<!-- Control Center for Light Bootstrap Dashboard: scripts for the example pages etc -->
<script src="../assets/js/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>

@yield('javascript')
</html>
