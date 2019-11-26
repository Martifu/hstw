$(document).ready(function () {
    $('#btniniciarsesion').click(function () {
        $('#alerta').remove();
        correo = $('#inputCorreo').val();
        password = $('#inputPassword').val();
        notifiaciones = $('#notificacion');
        $.ajax(
            {
                type: "GET",
                data: {correo: correo, password: password},
                datatype: 'JSON',
                url: '/ingresarusuario',
                success:function (response) {
                    console.log(response);
                    if (response.status == 400) {
                        err = "<div id='alerta' class='alert alert-danger m-4'>" + response.mensaje + "</div>";
                        notifiaciones.append(err);
                        $('#alerta').show().delay(4000).fadeOut("fast");
                    }
                    else if (response.status == 200)
                    {
                        location.href="/reportes"
                    }

                }
            }
        )
    });
});


