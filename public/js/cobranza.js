$(document).ready(function () {
    $('#tabla_personas').on('click','#btncobranzatabla', function (e) {
        $('#modaltabla').modal('show');
        $('#datos_tabla').empty();
        id_cliente = $(this).parent().parent().find('.id').val();
        token = $("input[name = '_token']").val();
        $.ajax(
            {
                url:"/getdeudascliente",
                datatype: 'JSON',
                type: 'post',
                data: {id:id_cliente, _token:token },
                success:function (response) {
                    $.each(response, function (index, value) {
                        $('#datos_tabla').append(
                            "<tr>"+
                            "<td>"+value['nombre']+"</td>"+
                            "<td>"+value['nombre']+"</td>"+
                            "<td>"+value['nombre']+"</td>"+
                            "<td>"+value['nombre']+"</td>"+
                            "</tr>"
                        )
                    })

                }
            }
        )


    });
});