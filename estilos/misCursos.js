
document.addEventListener('DOMContentLoaded', () => {
    const enlaceMisCursos = document.getElementById('enlaceMisCursos');
    const alertaModal = document.getElementById('alertaModal');
    const cerrarModal = document.getElementById('cerrarModal');

    // Variable para determinar si el usuario está autenticado (esta variable debe ser pasada desde PHP)
    const isAuthenticated = JSON.parse('<?= json_encode($isAuthenticated) ?>');

    // Evento para el enlace de "Mis Cursos"
    enlaceMisCursos.addEventListener('click', (event) => {
        event.preventDefault(); // Evitar la redirección predeterminada

        if (!isAuthenticated) {
            // Mostrar modal si no está autenticado
            alertaModal.classList.add('visible');
        } else {
            // Redirigir a la página "Mis Cursos" si está autenticado
            window.location.href = 'misCursos.php';
        }
    });

    // Evento para cerrar el modal
    cerrarModal.addEventListener('click', () => {
        alertaModal.classList.remove('visible'); // Ocultar el modal
    });
});
