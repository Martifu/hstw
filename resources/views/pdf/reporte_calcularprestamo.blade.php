<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Reporte</title>
    <link rel="stylesheet" href="css/estilosPDF.css" media="all" />
</head>
<body>

<header class="clearfix">
    <div id="logo">
        <img class="logo" src="img/logo.png">
    </div>
    <div class="informacion">
        <h2 class="name">Datos del cliente</h2>
        <div><b>Nombre: </b>{{$persona->nombre}}</div>
        <div><b>No. Cuenta: </b> {{$persona->id}}</div>
        <div><b>Fecha de reporte:  </b> {{$date}}</div>
    </div>
</header>
<main>
    <div class="" >
    <div id="details" class="clearfix">
        <div id="invoice">
            <h1>Prestamos</h1>
        </div>
    </div>
    <table border="1" cellspacing="0" cellpadding="0">
        <thead>
        <tr>
            <th class="Credito">Cantidad anos pagarlo</th>
            <th class="Descripcion">Tipo de pago</th>
            <th class="no">Tasa de interes</th>
            <th class="no">Monto solicita</th>
            <th class="no">Monto total pagar</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="no">{{$Prestamo['anos']}}</td>
            <td class="desc">{{$Prestamo['pago']}}</td>
            <td class="unit">{{$Prestamo['interes']}}</td>
            <td class="qty">{{$Prestamo['monto_solicitado']}}</td>
            <td class="total">{{$Prestamo['total']}}</td>
        </tr>
        </tbody>
    </table>
    <div class="clearfix" >
        <div id="invoice">
            <h1>Pagos a Realizar</h1>
        </div> 
    </div>
    <table border="1" cellspacing="0" cellpadding="0" class="table2">
        <thead>
        <tr>
            <th class="Credito">No. pago</th>
            <th class="no">Cuota a pagar</th>
            <th class="no">Interes</th>
            <th class="no">Capital amortizado</th>
            <th class="no">Capital final</th>
        </tr>
        </thead>
        <tbody>
        @for ($i = 1; $i < $Prestamo['total_pagos']+1; $i++)
            <tr>
                <td>{{$i}}</td>
                <td>{{$Prestamo['pagoapagar']}}</td>
                <td>{{$Prestamo['interes']}}</td>
                <td>{{$Prestamo['monto_solicitado']}}</td>
                <td>{{$Prestamo['total']}}</td>
            </tr>
            @endfor
        </tbody>
    </table>
    </div>
</main>
</body>
</html>
