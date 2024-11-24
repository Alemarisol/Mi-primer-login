<?php
session_start();
if (!isset($_SESSION['usuario'])) {
    echo '
    <script>
    alert("Por favor debes iniciar sesión");
    window.location ="../login.php";
    </script>
    ';
    session_destroy();
    die();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Home</title>
    <!-- Vinculacion del archivo CSS -->
    <link rel="stylesheet" href="estilos/index.css">
</head>
<body>
    <!-- Barra de navegación -->
    <div class="navbar">
        <div class="nav-links">
            <a href="#">Inicio</a>
            <a href="#">Acerca de</a>
            <a href="#">Servicios</a>
            <a href="#">Contacto</a>
        </div>
        <button class="logout-btn" onclick="window.location.href='controlador/logout.php'">Cerrar Sesión</button>
    </div>

    <!-- Contenido principal -->
    <h1>Bienvenidos a mi Mundo</h1>
</body>
</html>
