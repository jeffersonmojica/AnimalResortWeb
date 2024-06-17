<?php
$servername = "localhost";
$username = "animalre";
$password = "y367}A]y){K4Cg4";
$dbname = "animalre_database";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT precios FROM Precios WHERE productos_y_servicios_id = 1";
$result = $conn->query($sql);

$data = array(); // Arreglo para almacenar los precios

if ($result->num_rows > 0) {
    // Guardar los precios en el arreglo
    while ($row = $result->fetch_assoc()) {
        $data[] = $row["precios"];
    }
}

// Cerrar conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>