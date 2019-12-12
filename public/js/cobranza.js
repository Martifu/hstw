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
                    function sumarDias(fecha, dias){
                        date = new Date(fecha);
                        date.setDate(date.getDate() + dias);
                        formato = date.toLocaleDateString();
                        return formato;
                    }
                    $.each(response, function (index, value) {
                        console.log(value[0,'credito_fechas']);
                        $('#datos_tabla').append(
                            "<tr>"+
                            "<td>$"+value[0, 'credito_fechas'][0]['prestamo']+"</td>"+
                            "<td>"+value[0, 'fechas']+"</td>"+
                            "<td>"+sumarDias(value[0, 'fechas'], 3)+"</td>"+
                            "</tr>"
                        )
                    })

                }
            }
        )


    });
});