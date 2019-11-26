$(document).ready(function () {
    var texto = $(".navbar-brand");
    textoNav = texto[0].text;
    if (textoNav == " Generar reportes ")
    {
        $("#reportes").addClass("active");
        $("#gestionClientes").removeClass("active");
    }


});
