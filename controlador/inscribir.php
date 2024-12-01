<?php
session_start();
header('Content-Type: application/json');

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Por favor, inicia sesión para inscribirte a un curso.']);
    exit();
}

include '../modelo/conexion.php';

// Validamos que la solicitud sea POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_curso = $_POST['id_curso'] ?? null;
    $id_usuario = $_SESSION['usuario']['id']; // Obtenemos el ID del usuario desde la sesión

    // Verificamos si el ID del curso y el ID del usuario están presentes
    if ($id_curso && $id_usuario) {
        // Verificamos si el usuario ya está inscrito en el curso
        $verificar_sql = "SELECT COUNT(*) AS total FROM inscripciones WHERE id_usuario = ? AND id_curso = ?";
        $stmt_verificar = $conexion->prepare($verificar_sql);
        $stmt_verificar->bind_param('ii', $id_usuario, $id_curso);
        $stmt_verificar->execute();
        $resultado = $stmt_verificar->get_result()->fetch_assoc();
        $stmt_verificar->close();

        if ($resultado['total'] > 0) {
            echo json_encode(['success' => false, 'message' => 'Ya estás inscrito en este curso.']);
            exit();
        }

        // Si no está inscrito, realizamos la inserción en la base de datos
        $sql = "INSERT INTO inscripciones (id_usuario, id_curso, fecha_inscripcion) VALUES (?, ?, NOW())";
        $stmt = $conexion->prepare($sql);
        $stmt->bind_param('ii', $id_usuario, $id_curso);

        if ($stmt->execute()) {
            echo json_encode(['success' => true, 'message' => '¡Usted se ha registrado correctamente!']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al inscribirte al curso. Intenta nuevamente.']);
        }
        $stmt->close();
    } else {
        echo json_encode(['success' => false, 'message' => 'Datos incompletos para inscribirte.']);
    }
} else {
    echo json_encode(['success' => false, 'message' => 'Método no permitido.']);
}
?>
