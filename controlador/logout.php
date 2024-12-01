<?php
// Inicia la sesión existente para acceder a las variables de sesión.
session_start();

// Destruye todas las variables de sesión, cerrando la sesión del usuario.
session_destroy();

// Redirige al usuario a la página de login, ya que ha cerrado sesión.
header("location: ../index.php");
?>
