<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    include_once('configuracion.php');
    header('Content-Type: application/json');

    $jugador = isset($_POST['jugador']) ? $_POST['jugador'] : null;
    $seleccion = isset($_POST['seleccion']) ? $_POST['seleccion'] : null;

    if (!$jugador || !$seleccion) {
        echo json_encode(["error" => "Faltan datos necesarios."]);
        exit();
    }

    // Consultar si existe algún registro en 'usuarios'
    $sql = "SELECT * FROM usuarios LIMIT 1";  // Agregando LIMIT 1 para mayor eficiencia
    $stmt = $conn->prepare($sql);
    if ($stmt) {
        $stmt->execute();
        $result = $stmt->get_result();
        $registro = $result->fetch_assoc();

        if ($registro) {
            $nombreJugador1 = $registro['nombre'];
            $seleccionJugador1 = $registro['seleccion'];
            echo json_encode(["nombre" => $nombreJugador1, "seleccion" => $seleccionJugador1]);

            $sqlDelete = "DELETE FROM usuarios";
            $stmtDelete = $conn->prepare($sqlDelete);
            $stmtDelete->execute();
        } else {
            $sqlInsert = "INSERT INTO usuarios (nombre, seleccion) VALUES (?, ?)";
            $stmtInsert = $conn->prepare($sqlInsert);

            if ($stmtInsert && $stmtInsert->bind_param("ss", $jugador, $seleccion) && $stmtInsert->execute()) {
                echo json_encode(["message" => "Datos insertados con éxito"]);
            } else {
                echo json_encode(["error" => "Error al ejecutar la inserción."]);
            }
        }
    } else {
        echo json_encode(["error" => "Error en la consulta SQL."]);
    }

    $stmt->close();
    $conn->close();
    exit();
}
