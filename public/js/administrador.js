$(document).ready(function () {
    var texto = $(".navbar-brand");
    textoNav = texto[0].text;
    if (textoNav == " Generar reportes ")
    {
        $("#reportes").addClass("active");
        $("#gestionClientes").removeClass("active");
        $("#asignarTarjetas").removeClass("active");
    }
    else if(textoNav == " Asignacion de tarjetas ")
    {
        $("#asignarTarjetas").addClass("active");
        $("#gestionClientes").removeClass("active");
        $("#reportes").removeClass("active");
    }
    else if(textoNav == " Area de cobranza ")
    {
        $("#cobranza").addClass("active");
        $("#asignarTarjetas").removeClass("active");
        $("#gestionClientes").removeClass("active");
        $("#reportes").removeClass("active");
    }
    else if(textoNav == " Buro de credito ")
    {
        $("#buroCredito").addClass("active");
        $("#cobranza").removeClass("active");
        $("#asignarTarjetas").removeClass("active");
        $("#gestionClientes").removeClass("active");
        $("#reportes").removeClass("active");
    }
    else if(textoNav == " Clientes ")
    {
        $("#gestionClientes").addClass("active");
        $("#cobranza").removeClass("active");
        $("#asignarTarjetas").removeClass("active");
        $("#reportes").removeClass("active");
    }
});
