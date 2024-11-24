<?php
session_start();
if (isset($_SESSION['usuario'])) {
    header("location: ../index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login y Registro</title>
    
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="estilos/style.css">
</head>
<body>

<main>
    <div class="contenedor__todo">
        <div class="caja__trasera">
            <div class="caja__trasera-login">
                <h3>¿Ya tienes una cuenta?</h3>
                <p>Inicia sesión para entrar en la página</p>
                <button id="btn__iniciar-sesion">Iniciar Sesión</button>
            </div>
            <div class="caja__trasera-register">
                <h3>¿Aún no tienes una cuenta?</h3>
                <p>Regístrate para que puedas iniciar sesión</p>
                <button id="btn__registrarse">Registrarse</button>
            </div>
        </div>

        <!--Formulario de Login y registro-->
        <div class="contenedor__login-register">
            <!--Login-->
            <form action="controlador/login_usuarios.php" method="POST" class="formulario__login">
                <h2>Iniciar Sesión</h2>

                <!-- Mostrar mensaje de error -->
                <?php
                if (isset($_SESSION['error'])) {
                    echo '<p class="error-message">' . $_SESSION['error'] . '</p>';
                    unset($_SESSION['error']); // Limpiar el mensaje después de mostrarlo
                }
                ?>

                <input type="text" placeholder="Correo Electrónico" name="correo" required>
                <input type="password" placeholder="Contraseña" name="clave" required>
                <button>Entrar</button>
            </form>

            <!--Registro-->
            <form action="controlador/registro.php" method="POST" class="formulario__register">
                <h2>Regístrarse</h2>
                <input type="text" placeholder="Nombre completo" name="nombre" required>
                <input type="email" placeholder="Correo Electrónico" name="correo" required>
                <input type="text" placeholder="Usuario" name="usuario" required>
                <input type="password" placeholder="Contraseña" name="clave" required>
                <button>Registrarse</button>
            </form>
        </div>
    </div>
</main>

<script src="estilos/script.js"></script>
</body>
</html>
