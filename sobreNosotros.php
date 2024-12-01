<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sobre Nosotros</title>
    <link rel="stylesheet" href="estilos/index.css">
    <link rel="stylesheet" href="estilos/sobreNosotros.css">
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

    <header class="header-sobre-nosotros">
        <h1>Sobre Nosotros</h1>
        <p>Conoce más acerca de nuestra misión, visión y valores.</p>
    </header>

    <section class="contenido">
        <h2>Nuestra Historia</h2>
        <p>La <b>Escuela Horizonte de Saber</b> nació en 2020 con la misión de ofrecer educación de calidad en áreas de tecnología, negocios y desarrollo personal. Nos hemos convertido en una plataforma educativa confiable que empodera a estudiantes de todas las edades para alcanzar sus metas.</p>

        <h2>Nuestra Misión</h2>
        <p>Brindar a los estudiantes herramientas prácticas y conocimientos aplicables que les permitan destacar en el mercado laboral y mejorar sus habilidades personales y profesionales.</p>

        <h2>Nuestra Visión</h2>
        <p>Ser un referente en educación en línea a nivel internacional, ofreciendo programas innovadores y accesibles para todos.</p>

        <h2>Valores</h2>
        <ul>
            <li><b>Innovación:</b> Nos adaptamos a los cambios y desafíos del mundo actual.</li>
            <li><b>Excelencia:</b> Comprometidos con la calidad en cada uno de nuestros cursos.</li>
            <li><b>Inclusión:</b> Acceso a educación para todos, sin barreras.</li>
        </ul>
    </section>
</body>
</html>
