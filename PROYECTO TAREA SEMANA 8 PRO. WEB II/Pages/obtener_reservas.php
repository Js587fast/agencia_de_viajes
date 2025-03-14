<?php
include '../Includes/db_conexion.php';

try {
    $query = "SELECT H.nombre, COUNT(R.id_reserva) AS total_reservas FROM HOTEL H 
              JOIN RESERVA R ON H.id_hotel = R.id_hotel 
              GROUP BY H.nombre HAVING COUNT(R.id_reserva) > 2";
    $stmt = $pdo->query($query);
    $resultados = $stmt->fetchAll(PDO::FETCH_ASSOC);

    echo json_encode($resultados);
} catch (PDOException $e) {
    echo json_encode(["error" => "Error en la consulta: " . $e->getMessage()]);
}
?>

