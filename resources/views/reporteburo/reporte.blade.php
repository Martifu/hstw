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
<center>
<header class="clearfix">
    <div id="logo">
        <img class="logo" src="img/logo.png" style="width: 20%">
    </div>

</header>
</center>
<main>


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




        <tr>
        <th>{{$personas[0]->nombre}}</th>
            <th>{{$personas[0]->nombre}}</th>
            <th>{{$personas[0]->apellido_p}}</th>
            <th>{{$personas[0]->apellido_m}}</th>
            <th>{{$personas[0]->rfc}}</th>
        </tr>


    <thead class="thead-dark">
    <tr class="bg-primary">
      <th scope="col"></th>
      <th scope="col"></th>
      <th scope="col">Domicilio(s)</th>
      <th scope="col"></th>
      <th scope="col"></th>
    </tr>


  </thead>



        <tr>

            <th scope="col">Calle y numero</th>
            <th scope="col">CP</th>
            <th scope="col">Colonia</th>
            <th scope="col">Ciudad y estado</th>
            <th scope="col">Pais</th>
        </tr>

        <tr>
            <th>{{$personas[0]->direcciones->calle. ' '.$personas[0]->direcciones->numero }}</th>
            <th>{{$personas[0]->direcciones->cp}}</th>
            <th>{{$personas[0]->direcciones->colonia}}</th>
            <th>{{$personas[0]->direcciones->ciudad. ' '.$personas[0]->direcciones->estado }}</th>
            <th>{{$personas[0]->direcciones->pais}}</th>

        </tr>




        <thead class="thead-dark">
        <tr class="bg-primary">
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Creditos bancarios</th>
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

        <tr>
            <th>{{$personas[0]->instituciones[0]->nombre}}</th>
            <th>{{$personas[0]->instituciones[0]->codigo}}</th>
            <th>{{$personas[0]->instituciones[0]->descripcion}}</th>
            <th>{{$personas[0]->estado}}</th>
            <th>{{$personas[0]->comportamiento}}</th>
        </tr>





        <thead class="thead-dark">
        <tr class="bg-primary">
            <th scope="col"></th>
            <th scope="col"></th>
            <th scope="col">Creditos no bancarios</th>
            <th scope="col"></th>
            <th scope="col"></th>
        </tr>
        </thead>


<tbody>
<tr>
<th scope="col">Institucion</th>
<th scope="col">Codigo</th>
<th scope="col">Descripcion</th>
<th scope="col">Estado</th>
<th scope="col">Comportamiento</th>
</tr>



        <tr>
        <th>{{$personas[0]->instituciones[0]->nombre}}</th>
        <th>{{$personas[0]->instituciones[0]->codigo}}</th>
        <th>{{$personas[0]->instituciones[0]->descripcion}}</th>
        <th>{{$personas[0]->estado}}</th>
        <th>{{$personas[0]->comportamiento}}</th>
        </tr>


  </tbody>
</table>
<h2>{{$mensaje}}</h2>
</main>

</body>
</html>
