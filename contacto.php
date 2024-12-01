<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contacto</title>
    <link rel="stylesheet" href="estilos/index.css">
    <link rel="stylesheet" href="estilos/contacto.css">
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

    <!-- Encabezado -->
    <header class="header-contacto">
        <h1>Contacto</h1>
        <p>¿Tienes alguna pregunta o comentario? ¡Contáctanos!</p>
    </header>

    <!-- Información de contacto -->
    <section class="informacion-contacto">
        <h2>Nuestra Información</h2>
        <p><b>Dirección:</b> Calle Principal 123, Ciudad Horizonte</p>
        <p><b>Teléfono:</b> +593 9 8765 4321</p>
        <p><b>Email:</b> contacto@escuelahorizonte.com</p>
        <p><b>Horario de Atención:</b> Lunes a Viernes, 9:00 AM - 5:00 PM</p>
    </section>

    <!-- Formulario de contacto -->
    <section class="formulario-contacto">
        <h2>Envíanos un Mensaje</h2>
        <form action="#" method="POST">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" placeholder="Tu nombre" required>
            </div>

            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Tu correo electrónico" required>
            </div>

            <div class="form-group">
                <label for="mensaje">Mensaje:</label>
                <textarea id="mensaje" name="mensaje" rows="5" placeholder="Escribe tu mensaje aquí..." required></textarea>
            </div>

            <button type="submit" class="btn-enviar">Enviar Mensaje</button>
        </form>
    </section>
</body>
</html>
