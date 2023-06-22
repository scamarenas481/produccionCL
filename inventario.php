<?php
// Incluir el archivo de configuración de la base de datos
include 'conexion_BD.php';

// Obtener el número total de elementos en la tabla
$sql = "SELECT COUNT(*) as total FROM inventarioinicial";
$result = $conn->query($sql);
$row = $result->fetch_assoc();
$totalItems = $row['total'];

// Obtener el número de página actual
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calcular el índice de inicio y fin para la consulta
$itemsPerPage = 50;
$startIndex = ($page - 1) * $itemsPerPage;

// Consulta para obtener los elementos paginados
$sql = "SELECT * FROM inventarioinicial LIMIT $startIndex, $itemsPerPage";
$result = $conn->query($sql);

// Mostrar los elementos en la tabla
while ($row = $result->fetch_assoc()) {
    echo "<tr>";
    echo "<td>" . $row['ClaveID'] . "</td>";
    echo "<td>" . $row['Descripción'] . "</td>";
    echo "<td>" . $row['Línea'] . "</td>";
    echo "<td>" . $row['Existencias'] . "</td>";
    // Agrega aquí las demás columnas que deseas mostrar
    echo "</tr>";
}


?>