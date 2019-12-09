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
    
</header>
<main>
<h2>{{$mensaje}}</h2>
    <table border="1" cellspacing="0" cellpadding="0"  class="table table-bordered">>
   
  <thead>
  <thead class="thead-dark">
    <tr class="bg-primary">
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Datos Personales</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>
    <tr>


      <th scope="col">Nombre</th>
      <th scope="col">Apellido paterno</th>
      <th scope="col">Apellido materno</th>
      <th scope="col">Fecha de nacimiento</th>
    <th scope="col">RFC</th>
    
    </tr>
  </thead>
  <tbody>
  <TBODY>
    @foreach($personas as $persona)
        <tr>
        <th>{{$persona['nombre']}}</th>
        <th>{{$persona['apellido_p']}}</th>
        <th>{{$persona['apellido_m']}}</th>
        <th>{{$persona['fecha_nacimiento']}}</th>
        <th>{{$persona['rfc']}}</th>
        </tr>
    @endforeach
    <TBODY>
    <thead class="thead-dark">
    <tr class="bg-primary">
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Domicilio(s)</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
    </tr>
  </thead>


    <tr>
    
    <td>Calle y numero</td>
<td>CP</td>
<td>Colonia</td>
<td>Ciudad y estado</td>
<td>Pais</td>

<TBODY>
    @foreach($personas as $persona)
        <tr>
        <th>{{$persona->direcciones['calle'].'  '.$persona->direcciones['numero']}}</th>
        <th>{{$persona->direcciones['cp']}}</th>
        <th>{{$persona->direcciones['colonia']}}</th>
        <th>{{$persona->direcciones['ciudad'].'  '.$persona->direcciones['estado']}}</th>
        <th>{{$persona->direcciones['pais']}}</th>
        </tr>
    @endforeach
    <TBODY>
    </tr>
    <thead class="thead-dark">
    <tr class="bg-primary">
      <th scope="col"></th>
      <th scope="col"></th>
      <th  style=" width: 130px;"scope="col">Creditos bancarios</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

   
    <tr>

<th scope="col">Institucion</th>
<th scope="col">Codigo</th>
<th scope="col">Descripcion</th>
<th scope="col">Estado</th>
<th scope="col">Comportamiento</th>

</tr>


<TBODY>
    @foreach($personas as $persona)
        <tr>
        <th>{{$persona->instituciones['nombre']}}</th>
        <th>{{$persona->instituciones['codigo']}}</th>
        <th>{{$persona->instituciones['descripcion']}}</th>
        <th>{{$persona->estado}}</th>
        <th>{{$persona->comportamiento}}</th>
        </tr>
    @endforeach
    <TBODY>
<thead class="thead-dark">
    <tr class="bg-primary">
      <th scope="col"></th>
      <th scope="col"></th>
      <th style=" width: 160px;" scope="col">Creditos no bancarios</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>
  </thead>

</thead>
<tbody>
<tr>
<th scope="col">Institucion</th>
<th scope="col">Codigo</th>
<th scope="col">Descripcion</th>
<th scope="col">Estado</th>
<th scope="col">Comportamiento</th>
</tr>

<TBODY>
    @foreach($personas as $persona)
        <tr>
        <th>{{$persona->instituciones['nombre']}}</th>
        <th>{{$persona->instituciones['codigo']}}</th>
        <th>{{$persona->instituciones['descripcion']}}</th>
        <th>{{$persona->estado}}</th>
        <th>{{$persona->comportamiento}}</th>
        </tr>
    @endforeach
    <TBODY>
  </tbody>
</table>
</main>

</body>
</html>