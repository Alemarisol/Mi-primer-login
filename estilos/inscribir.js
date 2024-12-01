xhr.withCredentials = true;

document.addEventListener('DOMContentLoaded', function () {
    // No es necesario asociar un botón específico, se usa el evento de los botones de inscripción.
});

// Función para confirmar la inscripción
function confirmInscription(idCurso) {
    if (confirm("¿Desea inscribirse en este curso?")) {
        enrollInCourse(idCurso);
    }
}

// Función para inscribir al usuario vía AJAX
function enrollInCourse(idCurso) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "controlador/inscribir.php", true);
    xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            try {
                const response = JSON.parse(xhr.responseText);
                
                // Verificamos si la inscripción fue exitosa
                if (response.success) {
                    alert(response.message || "¡Usted se ha registrado correctamente!");
                } else {
                    alert(response.message); // En caso de error o ya inscrito
                }
                
                // Recargar la página para actualizar la lista de cursos
                location.reload(); 
            } catch (e) {
                console.error("Error al parsear la respuesta JSON", e);
                alert("Hubo un problema al procesar la respuesta del servidor.");
            }
        }
    };

    // Enviar los datos al servidor (id_curso)
    xhr.send(`id_curso=${idCurso}`);
}
