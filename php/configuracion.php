<?php
// Credenciales para conectar a la base de datos en Railway
$host = 'mysql.railway.internal'; // Host interno para la conexión
$port = 3306;                      // Puerto estándar para MySQL
$dbname = 'ppot';    // Reemplaza con el nombre de tu base de datos
$username = 'root';          // Reemplaza con tu nombre de usuario
$password = 'rYevINocCFMEoBZYIzpDbkXHEHNjMAlh';       // Reemplaza con tu contraseña

try {
    // Crear conexión a la base de datos usando PDO
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$dbname;charset=utf8", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error en la conexión: " . $e->getMessage();
}

