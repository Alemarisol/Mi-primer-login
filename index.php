<?php
session_start();
$isAuthenticated = isset($_SESSION['usuario']);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Escuela de Aprendizaje</title>
    <link rel="stylesheet" href="estilos/index.css">
    <link rel="stylesheet" href="estilos/misCursos.css">
</head>
<body>
    <!-- Barra de navegación -->
    <div class="navbar">
        <div class="nav-links">
            <a href="index.php">Inicio</a>
            <a href="misCursos.php">Mis Cursos</a>
            <a href="sobreNosotros.php">Sobre Nosotros</a>
            <a href="contacto.php">Contacto</a>
        </div>

        <?php if ($isAuthenticated): ?>
            <form action="controlador/logout.php" method="POST" style="display: inline;">
                <button class="logout-btn">Cerrar Sesión</button>
            </form>
        <?php else: ?>
            <button class="login-btn" onclick="window.location.href='login.php'">Iniciar Sesión</button>
        <?php endif; ?>
    </div>

    <!-- Contenido principal -->
    <header class="main-header">
        <h1>Bienvenidos a la Escuela Horizonte de Saber</h1>
        <p>Explora nuestra selección de cursos y mejora tus habilidades.</p>
    </header>

    <section class="courses">
        <h2>Nuestros Cursos</h2>
        <div class="course-grid">
            <?php
            include 'modelo/conexion.php';
            $sql = "SELECT id_curso, nombre, precio, duracion, inicio, fin FROM cursos";
            $result = $conexion->query($sql);
            
            if ($result && $result->num_rows > 0):
                while ($curso = $result->fetch_assoc()):
            ?>
            <div class="course-card">
                <h3><?= $curso['nombre'] ?></h3>
                <p>Precio: $<?= $curso['precio'] ?></p>
                <p>Duración: <?= $curso['duracion'] ?> meses</p>
                <p>Inicio: <?= $curso['inicio'] ?></p>
                <p>Fin: <?= $curso['fin'] ?></p>
                <?php if ($isAuthenticated): ?>
                    <button class="enroll-btn" onclick="confirmInscription(<?= $curso['id_curso'] ?>)">Inscribirse</button>
                <?php else: ?>
                    <button class="enroll-btn" onclick="alert('Por favor, inicia sesión para formalizar la inscripción al curso.');">Inscribirse</button>
                <?php endif; ?>
            </div>
            <?php
                endwhile;
            else:
            ?>
            <p>No hay cursos disponibles.</p>
            <?php endif; ?>
        </div>
    </section>
    <script src="estilos/inscribir.js"></script>
    <!-- Modal de alerta -->
    <div id="alertaModal" class="modal oculto">
        <div class="modal-contenido">
            <p>Por favor, inicia sesión para formalizar la inscripción al curso.</p>
            <button id="cerrarModal">Aceptar</button>
        </div>
    </div>
    <script src="estilos/inscribir.js"></script>
    <script src="estilos/misCursos.js"></script>
</body>
</html>

