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

$sql = "SELECT idprecios, nombre_descu, precios FROM Precios WHERE productos_y_servicios_id = 4";
$result = $conn->query($sql);

$data = array(); // Arreglo para almacenar los datos

if ($result->num_rows > 0) {
    // Guardar los datos en el arreglo
    while ($row = $result->fetch_assoc()) {
        // Realizar la segunda consulta basada en idprecios
        $idprecios = $row["idprecios"];
        $sql_extra = "SELECT decode FROM multimediaServicios WHERE id_servicio = $idprecios";
        $result_extra = $conn->query($sql_extra);
        $extra_data = "";

        if ($result_extra->num_rows > 0) {
            $row_extra = $result_extra->fetch_assoc();
            $extra_data = $row_extra["decode"];
        }

        // Reemplazar el valor de idprecios con el resultado_extra
        $row["idprecios"] = $extra_data;

        // Agregar toda la fila al arreglo $data
        $data[] = $row;
    }
}

// Cerrar conexión
$conn->close();

// Devolver los datos en formato JSON
header('Content-Type: application/json');
echo json_encode($data);
?>