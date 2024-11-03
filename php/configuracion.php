<?php
// Configuración para mostrar todos los errores (útil en desarrollo)
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Obtener las variables de entorno
$host = getenv('mysql.railway.internal'); // Dominio privado
$port = getenv('11525'); // Puerto TCP
$db   = 'ppot'; // Nombre de la base de datos
$user = 'root'; // Usuario
$pass = 'rYevINocCFMEoBZYIzpDbkXHEHNjMAlh'; // Contraseña
$charset = 'utf8mb4'; // Conjunto de caracteres

// DSN para PDO
$dsn = "mysql:host=$host;dbname=$db;charset=$charset;port=$port";

$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, // Manejo de errores
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC, // Modo de recuperación de datos
    PDO::ATTR_EMULATE_PREPARES => false, // Usar preparaciones nativas
];

try {
    // Crear la conexión
    $pdo = new PDO($dsn, $user, $pass, $options);
    echo "Conexión exitosa a la base de datos.";
} catch (PDOException $e) {
    // Manejo de excepciones
    throw new PDOException($e->getMessage(), (int)$e->getCode());
}

