<?php
// Configuración para mostrar todos los errores (útil en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener la URL de conexión desde la variable de entorno
$mysql_url = getenv('MYSQL_URL');

// Verificar que la URL esté disponible y extraer los detalles
if ($mysql_url) {
    $db = parse_url($mysql_url);

    // Datos de conexión a la base de datos
    $servername = $db['host'];
    $username = $db['user'];
    $password = $db['pass'];
    $dbname = ltrim($db['path'], '/');
    $port = $db['port'] ?? 3306; // Usar el puerto 3306 por defecto si no se especifica

    // Crear conexión a la base de datos
    $conn = new mysqli($servername, $username, $password, $dbname, $port);

    // Verificar si la conexión es exitosa
    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    } else {
        echo "Conexión exitosa a la base de datos.";
    }
} else {
    die("No se ha podido obtener la URL de conexión de la base de datos.");
}



