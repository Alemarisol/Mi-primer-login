<?php
// Configuración de la conexión a la base de datos
$servidor = "localhost"; // Servidor (generalmente localhost)
$usuario = "root";       // Usuario de la base de datos
$contraseña = "";        // Contraseña del usuario
$base_datos = "login_forobim1"; // Nombre de la base de datos

// Crear la conexión
$conexion = new mysqli($servidor, $usuario, $contraseña, $base_datos, 3307);
/*
// Verificar la conexión
if ($conexion) {
    echo 'Conexion Exitosa a la base de datos';
}else {
    echo 'Error en la conexion';
}
*/    
// Configurar el conjunto de caracteres para evitar problemas con acentos
$conexion->set_charset("utf8");
?>
