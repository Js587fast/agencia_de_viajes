<?php
include '../Includes/db_conexion.php';
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Consulta de Reservas</title>
    <!-- Enlace a Bootstrap -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="../Assets/style.css">
</head>

<body>

    <div class="container mt-5">
        <h2 class="text-center">Hoteles con más de 2 reservas</h2>

        <table class="table table-bordered table-striped mt-4">
            <thead class="thead-dark">
                <tr>
                    <th>Nombre del Hotel</th>
                    <th>Total Reservas</th>
                </tr>
            </thead>
            <tbody id="tablaReservas">
                <tr>
                    <td colspan="2" class="text-center">Cargando datos...</td>
                </tr>
            </tbody>
        </table>

        <!-- Botón para volver al archivo index.php -->
        <div class="text-center mt-4">
            <button class="btn btn-primary" onclick="window.location.href='../index.php';">Volver al Inicio</button>
        </div>
    </div>

    <!-- Scripts de Bootstrap y jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script>
        function obtenerReservas() {
            $.ajax({
                url: 'obtener_reservas.php', 
                type: 'GET',
                dataType: 'json',
                success: function (data) {
                    let contenido = "";
                    if (data.length > 0) {
                        data.forEach(fila => {
                            contenido += `<tr>
                                <td>${fila.nombre}</td>
                                <td>${fila.total_reservas}</td>
                            </tr>`;
                        });
                    } else {
                        contenido = `<tr><td colspan="2" class="text-center">No hay hoteles con más de 2 reservas.</td></tr>`;
                    }
                    $("#tablaReservas").html(contenido);
                },
                error: function () {
                    $("#tablaReservas").html('<tr><td colspan="2" class="text-center text-danger">Error al obtener datos</td></tr>');
                }
            });
        }

        // Llamar a la función cada 5 segundos
        $(document).ready(function () {
            obtenerReservas();
            setInterval(obtenerReservas, 5000);
        });
    </script>

</body>

</html>
