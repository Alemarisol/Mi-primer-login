<?php
include 'controlador/misCursos.php'; // Incluimos el controlador

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mis Cursos</title>
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

        <?php if (isset($_SESSION['usuario'])): ?>
            <form action="controlador/logout.php" method="POST" style="display: inline;">
                <button class="logout-btn">Cerrar Sesión</button>
            </form>
        <?php else: ?>
            <button class="login-btn" onclick="window.location.href='login.php'">Iniciar Sesión</button>
        <?php endif; ?>
    </div>

    <!-- Contenido principal -->
    <div class="container">
        <h1 class="welcome-message">Bienvenido, <?php echo $usuario['nombre']; ?></h1>
        <p>Actualmente estás inscrito en:</p>
        <?php if (!empty($result_cursos) && $result_cursos->num_rows > 0): ?>
            <table>
                <thead>
                    <tr>
                        <th>Curso</th>
                        <th>Descripción</th>
                        <th>Duración</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Fecha de Inscripción</th>
                        <th>Precio</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $total_precio = 0;
                    while ($curso = $result_cursos->fetch_assoc()):
                        $total_precio += $curso['precio'];
                    ?>
                    <tr>
                        <td><?php echo $curso['nombre']; ?></td>
                        <td><?php echo $curso['descripcion']; ?></td>
                        <td><?php echo $curso['duracion']; ?> meses</td>
                        <td><?php echo $curso['inicio']; ?></td>
                        <td><?php echo $curso['fin']; ?></td>
                        <td><?php echo $curso['fecha_inscripcion']; ?></td>
                        <td>$<?php echo $curso['precio']; ?></td>
                    </tr>
                    <?php endwhile; ?>
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="6">Total</td>
                        <td>$<?php echo $total_precio; ?></td>
                    </tr>
                </tfoot>
            </table>
        <?php else: ?>
            <p class="no-courses">No estás inscrito en ningún curso.</p>
        <?php endif; ?>
    </div>
</body>
</html>
