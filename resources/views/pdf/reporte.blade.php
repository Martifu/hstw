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
        <div><b>Nombre: </b> {{$persona->nombre}}</div>
        <div><b>No. Cuenta: </b> {{$persona->id}}</div>
        <div><b>Fecha de reporte:  </b> {{$fecha}}</div>
    </div>
</header>
<main>
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
            <th class="no">Monto solicitado</th>
            <th class="no">Monto total pagar</th>
        </tr>
        </thead>
        <tbody>
        @foreach($prestamos as $prestamo)
        <tr>
            <td class="no">{{$prestamo->anos}} anos</td>
            <td class="desc">{{$prestamo->tipo_pago}}</td>
            <td class="unit">{{$prestamo->interes}}</td>
            <td class="qty">${{$prestamo->prestamo}}</td>
            <td class="total">${{$total}}</td>
        </tr>
            @endforeach
        </tbody>
    </table>
    <div class="clearfix">
        <div id="invoice">
            <h1>Pagos realizados</h1>
        </div>
    </div>
    <table border="1" cellspacing="0" cellpadding="0" class="table2">
        <thead>
        <tr>
            <th class="Credito">No. pago</th>
            <th class="Descripcion">Fecha de pago</th>
            <th class="no">Cuota a pagar</th>
            <th class="no">Interes</th>
            <th class="no">Capital amortizado</th>
            <th class="no">Capital final</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td class="no">1</td>
            <td class="desc">20 diciembre 2019</td>
            <td class="unit">$600</td>
            <td class="qty">%39</td>
            <td class="total">$1,200.00</td>
            <td class="total">$2,200.00</td>
        </tr>
        <tr>
            <td class="no">2</td>
            <td class="desc">21 diciembre 2019</td>
            <td class="unit">$302</td>
            <td class="qty">%21</td>
            <td class="total">$1,200.00</td>
            <td class="total">$2,670.00</td>
        </tr>
        <tr>
            <td class="no">3</td>
            <td class="desc">23 diciembre 2019</td>
            <td class="unit">$921</td>
            <td class="qty">%29</td>
            <td class="total">$1,200.00</td>
            <td class="total">$3,250.00</td>
        </tr>
        </tbody>
    </table>
    <div class="clearfix">
        <div id="invoice">
            <h1>Total de pagos</h1>
        </div>
    </div>
    <table border="1" cellspacing="0" cellpadding="0" class="table2">
        <thead>
        <tr>
            <th class="Credito">Total:</th>
            <th class="no">$32,000,00 MXN</th>
        </tr>
        </thead>
    </table>
</main>
<footer>
    Todos los pagos son seguros en nuestra plataforma.
</footer>
</body>
</html>