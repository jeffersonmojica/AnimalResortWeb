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
$searchTerm = $_GET['search'];

$sql = "SELECT id, nombre_producto, precio_venta, descripcion_producto, categoria_productos, stock FROM ProductoTienda WHERE nombre_producto LIKE '%$searchTerm%'";
$result = $conn->query($sql);

$data = array(); // Arreglo para almacenar los datos

if ($result->num_rows > 0) {
    // Guardar los datos en el arreglo
    while ($row = $result->fetch_assoc()) {
        // Realizar la segunda consulta basada en idprecios
        $id = $row["id"];
        $sql_extra = "SELECT decode FROM multimediaProductos WHERE id_producto = $id";
        $result_extra = $conn->query($sql_extra);
        $extra_data = "";

        if ($result_extra->num_rows > 0) {
            $row_extra = $result_extra->fetch_assoc();
            $extra_data = $row_extra["decode"];
        }

        // Reemplazar el valor de idprecios con el resultado_extra
        $row["id"] = $extra_data;

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