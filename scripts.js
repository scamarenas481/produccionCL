$(document).ready(function() {
    // Realizar una petición AJAX al archivo PHP que obtiene los datos de la tabla
    $.ajax({
        url: 'get_data.php',
        type: 'GET',
        dataType: 'json',
        success: function(response) {
            // Verificar si se obtuvieron los datos correctamente
            if (response.success) {
                var datosTabla = response.data;

                // Construir las filas de la tabla
                var filas = '';
                $.each(datosTabla, function(index, dato) {
                    filas += '<tr>';
                    filas += '<td>' + dato.ClaveID + '</td>';
                    filas += '<td>' + dato.Descripción + '</td>';
                    filas += '<td>' + dato.Línea + '</td>';
                    filas += '<td>' + dato.Existencias + '</td>';
                    // Agregar las demás columnas según los atributos
                    filas += '</tr>';
                });

                // Agregar las filas a la tabla
                $('#tabla-inventario tbody').html(filas);
            } else {
                console.log('Error al obtener los datos de la tabla');
            }
        },
        error: function() {
            console.log('Error en la petición AJAX');
        }
    });
});
