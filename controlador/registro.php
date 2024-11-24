<?php
include '../modelo/conexion.php';

// Obtener valores del formulario
$nombre = trim($_POST['nombre']);
$correo = trim($_POST['correo']);
$usuario = trim($_POST['usuario']);
$clave = trim($_POST['clave']);

// Verificar campos vacíos
if (empty($nombre) || empty($correo) || empty($usuario) || empty($clave)) {
    echo '
    <script>
    alert("Todos los campos son obligatorios");
    window.location = "../login.php";
    </script>
    ';
    exit();
}

// Escapar caracteres especiales para evitar inyecciones SQL
$nombre = mysqli_real_escape_string($conexion, $nombre);
$correo = mysqli_real_escape_string($conexion, $correo);
$usuario = mysqli_real_escape_string($conexion, $usuario);
$clave = mysqli_real_escape_string($conexion, $clave);

// Encriptar la contraseña
$clave = hash('sha512', $clave);

// Verificar si el correo ya está registrado
$verificar_correo = mysqli_query($conexion, "SELECT * FROM usuarios WHERE correo = '$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
    alert("Este correo ya está registrado, intenta con uno diferente");
    window.location = "../login.php";
    </script>
    ';
    exit();
}

// Verificar si el usuario ya está registrado
$verificar_usuario = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$usuario'");
if (mysqli_num_rows($verificar_usuario) > 0) {
    echo '
    <script>
    alert("Este usuario ya existe, intenta con uno diferente");
    window.location = "../login.php";
    </script>
    ';
    exit();
}

// Insertar los datos en la base de datos
$query = "INSERT INTO usuarios(nombre, correo, usuario, clave) VALUES('$nombre', '$correo', '$usuario', '$clave')";
$ejecutar = mysqli_query($conexion, $query);

// Verificar si la inserción fue exitosa
if ($ejecutar) {
    echo '
    <script>
    alert("Usuario registrado exitosamente");
    window.location = "../login.php";
    </script>
    ';
} else {
    echo '
    <script>
    alert("Registro fallido, inténtelo nuevamente");
    window.location = "../registro.php";
    </script>
    ';
}

// Cerrar conexión
mysqli_close($conexion);
?>
