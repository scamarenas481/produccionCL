<?php
// Obtener los datos del formulario de inicio de sesión
$usernameInput = $_POST['username'];
$passwordInput = $_POST['password'];

// Verificar si los campos están vacíos
if (empty($usernameInput) || empty($passwordInput)) {
    echo "Por favor, ingresa el usuario y la contraseña";
    exit();
}

// Incluir el archivo de configuración de la base de datos
include 'conexion_BD.php';

// Crear la conexión a la base de datos
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar si la conexión es exitosa
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

// Consulta para verificar las credenciales del usuario
$sql = "SELECT * FROM usuarios WHERE nombreUsuario  = '$usernameInput' AND password = '$passwordInput'";
$result = $conn->query($sql);


// Verificar si se encontró un registro coincidente
if ($result->num_rows == 1) {
    // Inicio de sesión exitoso, redirigir a la página inicio.php
    header("Location: inventario.html");
    exit();
} else {
    echo "Credenciales inválidas";
}

// No cerrar la conexión a la base de datos

?>
