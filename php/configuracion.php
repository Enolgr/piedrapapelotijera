<?php
// Configuración para mostrar todos los errores (útil en desarrollo)

error_reporting(E_ALL);
ini_set('display_errors', 1);


// Datos de conexión a la base de datos

$servername = "db5016593574.hosting-data.io";
$username = "dbu199680";
$password = "@Marerafols";
$dbname = "dbs13455435";
$port = 3306; // Especificar el puerto si es necesario


// Crear conexión a la base de datos

$conn = new mysqli($servername, $username, $password, $dbname, $port);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}




