<?php
// Incluir el archivo de conexión
include 'conexon.php';

if(!isset($_COOKIE['usuario_id'])) {
    echo "<script>alert('Sesión expirada, inicie nuevamente'); window.location.href='index.php';</script>";
    exit();
}

try {
    // No es necesario crear una nueva conexión, ya que 'conexon.php' la define
    // y $conexion está disponible aquí
    if ($conexion->connect_error) {
        throw new Exception("Error de conexión: " . $conexion->connect_error);
    }

    // Obtener y sanitizar el id del usuario desde la cookie
    $idUsuario = intval($_COOKIE['usuario_id']);

    // Preparar la consulta SQL utilizando declaraciones preparadas
    $stmt = $conexion->prepare("SELECT ciudad, direccion, descripcion FROM Direcciones WHERE usuario_direccion = ?");
    if ($stmt === false) {
        throw new Exception("Error al preparar la consulta: " . $conexion->error);
    }
    $stmt->bind_param("i", $idUsuario);
    $stmt->execute();
    $result = $stmt->get_result();

    $data = array(); // Arreglo para almacenar los datos

    // Guardar los datos en el arreglo
    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $data[] = $row;
        }
    }

    // Cerrar la declaración y la conexión
    $stmt->close();
    $conexion->close();

    // Devolver los datos en formato JSON
    header('Content-Type: application/json');
    echo json_encode($data);

} catch (Exception $e) {
    // Manejo de errores
    error_log($e->getMessage());
    echo json_encode(array('error' => 'Error al conectar con la base de datos'));
}
?>
