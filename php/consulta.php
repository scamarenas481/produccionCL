<?php

function conexion(){
    return mysqli_connect('localhost','root','123456','newschema');
}

$conexion = conexion();
//$sql = "SELECT ClaveID, Descripción, Línea, Existencias FROM inventarioinicial WHERE Linea ";
//$sql = "SELECT ClaveID, Descripción, Línea, Existencias, Unidaddeentrada,Factorentreunidades FROM inventarioinicial WHERE Línea = 'ABRAZ' ";
$sql = "SELECT * FROM inventarioinicial WHERE Línea = 'ABRAZ' ";

$resultado = mysqli_query($conexion, $sql);
$datos = mysqli_fetch_all($resultado, MYSQLI_ASSOC);

if(!empty($datos)){
    $jsonDatos = json_encode($datos);
} else {
    $jsonDatos = json_encode([]);
}

echo $jsonDatos;
?>
