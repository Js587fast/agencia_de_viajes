<?php
include 'Includes/db_conexion.php';
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agencia de Viajes</title>
    <!-- CSS de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">

    <link rel="stylesheet" href="Assets/style.css">
    <style>
        /* Estilo para la imagen de fondo */
        body {
            background-image: url('imagenes/imagen_fondo_02.jpg');
            background-size: cover;
            background-position: center center;
            background-repeat: no-repeat;
            height: 100vh;
            width: 100%;
            margin: 0;
            color: white;
        }


        .container {
            background: rgba(0, 0, 0, 0.5);

            padding: 20px;
            border-radius: 8px;
        }

        /* Estilo para el pie de página */
        footer {
            background-color: rgba(0, 0, 0, 0.7);
            color: white;
            text-align: center;
            padding: 10px;
            position: absolute;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>

<body>
    <!-- Barra de navegación -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
        <div class="container">
            <a class="navbar-brand" href="#">Agencia de Viajes</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav">
                    <!-- Enlaces de navegación -->
                    <li class="nav-item"><a class="nav-link" href="Pages/registro_vuelo.php">Registrar Vuelo</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/registro_hotel.php">Registrar Hotel</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/hacer_reserva.php">Hacer Reserva</a></li>
                    <li class="nav-item"><a class="nav-link" href="Pages/consultar_reservas.php">Consultar Reservas</a></li>

                    <?php if (basename($_SERVER['PHP_SELF']) != 'agregar_cliente.php'): ?>
                        <li class="nav-item"><a class="nav-link" href="Pages/agregar_cliente.php">Agregar Cliente</a></li>
                    <?php endif; ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Contenido principal -->
    <div class="container mt-5">
        <h1 class="text-center">Bienvenido a nuestra agencia de Viajes</h1>
        <p class="text-center">Seleccione una opción en el menú para continuar.</p>
    </div>

    <!-- Pie de página -->
    <footer>
        <p>&copy; 2025 Agencia de Viajes. Todos los derechos reservados.</p>
    </footer>

    <!-- Scripts de Bootstrap -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>