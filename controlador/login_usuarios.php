<?php
session_start();
include '../modelo/conexion.php';

$correo = trim($_POST['correo']);
$clave = trim($_POST['clave']);
$clave = hash('sha512', $clave);

// Verificar si el usuario existe
$validar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($validar_usuario) == 0) {
    $_SESSION['error'] = "Usuario incorrecto";
    header("location: ../login.php");
    exit();
}

// Verificar la contraseña
$datos_usuario = mysqli_fetch_assoc($validar_usuario);
if ($datos_usuario['clave'] !== $clave) {
    $_SESSION['error'] = "Contraseña incorrecta";
    header("location: ../login.php");
    exit();
}

// Si el usuario y la contraseña son correctos, almacenar el id y correo en la sesión
$_SESSION['usuario'] = [
    'id' => $datos_usuario['id'],  // Usamos el campo id de la tabla usuarios
    'correo' => $datos_usuario['correo']
];

header("location: ../index.php");
exit();
?>
