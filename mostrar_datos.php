<?php
// Incluir el archivo de configuración de la base de datos
include  'config.php';

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consultar los datos de la tabla inventarioinicial
$sql = "SELECT * FROM inventarioinicial";
$result = $conn->query($sql);

// Obtener los resultados de la consulta
$rows = $result->fetch_all(MYSQLI_ASSOC);

// Cerrar la conexión a la base de datos
$conn->close();
?>
