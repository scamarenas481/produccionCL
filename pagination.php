<?php
// Generar los enlaces de paginación
$totalPages = ceil($totalItems / $itemsPerPage);
for ($i = 1; $i <= $totalPages; $i++) {
    echo "<a href='inventario.php?page=$i'>$i</a> ";
}
?>
