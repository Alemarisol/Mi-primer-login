<?php
session_start();
header('Content-Type: application/json');

// Verificamos si el usuario ha iniciado sesión
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id'])) {
    echo json_encode(['success' => false, 'message' => 'Por favor, inicia sesión para inscribirte a un curso.']);
    exit();
}

include 'modelo/conexion.php';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscripción a Cursos</title>
    <script src="estilos/inscribir.js" defer></script> <!-- Vinculamos el archivo JS -->
</head>
<body>
    <h1>Inscríbete en un curso</h1>
    <form id="form-inscripcion">
        <label for="curso">Selecciona un curso:</label>
        <select name="id_curso" id="curso" required>
            <option value="">-- Selecciona un curso --</option>
            <?php
            $sql = "SELECT id_curso, nombre FROM cursos";
            $result = $conexion->query($sql);
            if ($result && $result->num_rows > 0) {
                while ($curso = $result->fetch_assoc()) {
                    echo "<option value='" . $curso['id_curso'] . "'>" . $curso['nombre'] . "</option>";
                }
            } else {
                echo "<option value=''>No hay cursos disponibles</option>";
            }
            ?>
        </select>
        <button type="button" id="btn-inscribir">Inscribirme</button> <!-- Botón con ID -->
    </form>
</body>
</html>
