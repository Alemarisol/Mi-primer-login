<?php
session_start();
include 'modelo/conexion.php';

// Verificar si el usuario está logueado
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['id'])) {
    echo "<script>alert('Por favor, inicia sesión para revisar tus cursos.'); window.location.href = 'index.php';</script>";
    exit();
}

$id_usuario = $_SESSION['usuario']['id'];

// Obtener la información del usuario
$sql_usuario = "SELECT nombre FROM usuarios WHERE id = ?";
$stmt_usuario = $conexion->prepare($sql_usuario);
$stmt_usuario->bind_param('i', $id_usuario);
$stmt_usuario->execute();
$result_usuario = $stmt_usuario->get_result();
$usuario = $result_usuario->fetch_assoc();
$stmt_usuario->close();

// Obtener los cursos en los que el usuario está inscrito
$sql_cursos = "
    SELECT c.nombre, c.descripcion, c.duracion, c.inicio, c.fin, i.fecha_inscripcion, c.precio
    FROM inscripciones i
    JOIN cursos c ON i.id_curso = c.id_curso
    WHERE i.id_usuario = ?
";
$stmt_cursos = $conexion->prepare($sql_cursos);
$stmt_cursos->bind_param('i', $id_usuario);
$stmt_cursos->execute();
$result_cursos = $stmt_cursos->get_result();
$stmt_cursos->close();
?>
