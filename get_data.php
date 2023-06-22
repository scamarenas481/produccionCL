<?php
// Incluir el archivo de configuración de la base de datos
include 'conexion_BD.php';

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta SQL para obtener los datos de la tabla
$sql = "SELECT * FROM inventarioinicial";
$result = $conn->query($sql);

// Verificar si se obtuvieron resultados
if ($result->num_rows > 0) {
    $data = array();

    // Recorrer los resultados y agregarlos al arreglo de datos
    while ($row = $result->fetch_assoc()) {
        $data[] = $row;
    }

    // Enviar los datos como respuesta en formato JSON
    $response = array(
        'success' => true,
        'data' => $data
    );
} else {
    $response = array(
        'success' => false,
        'data' => array()
    );
}



// Enviar la respuesta como JSON
header('Content-Type: application/json');
echo json_encode($response);
?>
