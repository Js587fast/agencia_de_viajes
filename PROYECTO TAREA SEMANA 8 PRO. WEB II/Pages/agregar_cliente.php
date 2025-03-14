<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Agregar Cliente</title>
    <!-- Vinculación con Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="../Assets/style.css"> <!-- Tu archivo CSS personalizado -->
</head>

<body class="bg-light">
    <div class="container mt-5">
        <h2 class="text-center text-primary mb-4">Agregar Cliente</h2>
        <div class="card shadow-lg">
            <div class="card-body">
                <form method="POST">
                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre del Cliente:</label>
                        <input type="text" class="form-control" id="nombre" name="nombre" required>
                    </div>

                    <div class="mb-3">
                        <label for="email" class="form-label">Correo Electrónico:</label>
                        <input type="email" class="form-control" id="email" name="email" required>
                    </div>

                    <div class="mb-3">
                        <label for="telefono" class="form-label">Teléfono:</label>
                        <input type="text" class="form-control" id="telefono" name="telefono" required>
                    </div>

                    <button type="submit" class="btn btn-primary w-100 mt-3">Agregar Cliente</button>
                </form>
            </div>
        </div>

        <!-- Botón para volver al archivo index.php -->
        <div class="mt-4 text-center">
            <button onclick="window.location.href='../index.php';" class="btn btn-secondary">Volver al Inicio</button>
        </div>
    </div>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '../Includes/db_conexion.php';


        if (isset($_POST['email'])) {
            // Recoger los datos del formulario
            $nombre = filter_var($_POST['nombre'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $telefono = filter_var($_POST['telefono'], FILTER_SANITIZE_STRING);

            // Validar datos
            if ($nombre && $email && $telefono) {
                // Preparar la consulta para insertar el cliente
                $stmt = $pdo->prepare("INSERT INTO cliente (nombre, email, telefono) VALUES (?, ?, ?)");
                if ($stmt->execute([$nombre, $email, $telefono])) {
                    echo "<script>alert('Cliente agregado con éxito.');</script>";
                } else {
                    echo "<script>alert('Error al agregar el cliente.');</script>";
                }
            } else {
                echo "<script>alert('Por favor, complete todos los campos.');</script>";
            }
        } else {
            echo "<script>alert('El campo email es requerido.');</script>";
        }
    }
    ?>


    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js"></script>
</body>

</html>