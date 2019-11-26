$(document).ready(function () {
    nomb_fecha =   "<div class='card m-4' id='nom_fecha'> "+
        "<div class='card-header'>"+
        "<h4 class='card-title'>Datos de cliente</h4>"+
        "</div>"+
        "<div class='card-body'>"+
        "<form>"+
        "{{@csrf}}"+
        "<div class='col-md-12'>"+
        "<div class='form-group'>"+
        "<label>Nombre del cliente: </label>"+
        "<input type='text' class='form-control' id='nomCliente' placeholder='' value=''>"+
        "</div>"+
        "</div>"+
        "<div class='col-md-12'>"+
        "<div class='form-group'>"+
        "<label>Fecha de nacimiento: </label>"+
        "<input type='date' class='form-control' id='fechaNaci' placeholder='' value=''>"+
        "</div>"+
        "</div>"+
        "<a class='btn-desing btn-fill pull-right' id='verificar' style='color:white'>Generar reporte</a>"+
        "</div>"+
        "</form>"+
        "</div>"+
        "</div>";
    curp = "<div class='card m-4'>"+
        "<div class='card-header'>"+
        "<h4 class='card-title'>Datos de cliente</h4>"+
        "</div>"+
        "<div class='card-body'>"+
        "<form>"+
        "{{@csrf}}"+
        "<div class='col-md-12'>"+
        "<div class='form-group'>"+
        "<label>CURP: </label>"+
        "<input type='text' class='form-control' id='curpCliente' placeholder='' value=''>"+
        "</div>"+
        "</div>"+
        "<a class='btn-desing btn-fill pull-right' id='verificar' style='color:white'>Generar reporte</a>"+
        "</div>"+
        "</form>"+
        "</div>"+
        "</div>";
    rfc = "<div class='card m-4'>"+
        "<div class='card-header'>"+
        "<h4 class='card-title'>Datos de cliente</h4>"+
        "</div>"+
        "<div class='card-body'>"+
        "<form>"+
        "{{@csrf}}"+
        "<div class='col-md-12'>"+
        "<div class='form-group'>"+
        "<label>RFC: </label>"+
        "<input type='text' class='form-control' id='rfcCliente' placeholder='' value=''>"+
        "</div>"+
        "</div>"+
        "<a class='btn-desing btn-fill pull-right' id='verificar' style='color:white'>Generar reporte</a>"+
        "</div>"+
        "</form>"+
        "</div>"+
        "</div>";
    num_cliente = "<div class='card m-4'>"+
        "<div class='card-header'>"+
        "<h4 class='card-title'>Datos de cliente</h4>"+
        "</div>"+
        "<div class='card-body'>"+
        "<form>"+
        "{{@csrf}}"+
        "<div class='col-md-12'>"+
        "<div class='form-group'>"+
        "<label>Numero de cliente: </label>"+
        "<input type='text' class='form-control' id='numCliente' placeholder='' value=''>"+
        "</div>"+
        "</div>"+
        "<a class='btn-desing btn-fill pull-right' id='verificar' style='color:white'>Generar reporte</a>"+
        "</div>"+
        "</form>"+
        "</div>"+
        "</div>";
    $('#btn-nomfecha').click(function () {
        $("#cardbuscador").empty();
        $("#cardbuscador").append(nomb_fecha)
    });
    $('#btn-curp').click(function () {
        $("#cardbuscador").empty();
        $("#cardbuscador").append(curp);
    });
    $('#btn-rfc').click(function () {
        $("#cardbuscador").empty();
        $("#cardbuscador").append(rfc);
    });
    $('#btn-numcliente').click(function () {
        $("#cardbuscador").empty();
        $("#cardbuscador").append(num_cliente);
    });


});
