<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

session_start();

if (isset($_GET['nombre']) && isset($_GET['email'])) {
    $nombre = $_GET['nombre'];
    $email = $_GET['email'];

    // Conectar a la base de datos
    $conn = new mysqli("localhost", "animalre", "y367}A]y){K4Cg4", "animalre_database");

    // Verificar la conexión
    if ($conn->connect_error) {
        die("La conexión ha fallado: " . $conn->connect_error);
    }

    // Preparar la consulta SQL con los datos del usuario
    $sql = "INSERT INTO Usuarios (nombre, email, documento, celular, tipo_doc, tipo_usuario)
            VALUES ('$nombre', '$email', '00000', '123', 'cedula', 'Usuario')";

    // Ejecutar la consulta
    if ($conn->query($sql) === TRUE) {
        echo "<script>
        var nombreUsuario = '" . $nombre . "';
        var emailUsuario = '" . $email . "';
        alert('Usuario ' + nombreUsuario + ' (correo electrónico: ' + emailUsuario + ') registrado correctamente.');
        window.location.href = 'index.php';
        </script>";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    // Cerrar la conexión
    $conn->close();
} else {
    echo "Faltan datos para el registro.";
}
?>
