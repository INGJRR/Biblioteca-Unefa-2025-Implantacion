document.getElementById('notificaciones').addEventListener('click', function(event) {
    event.preventDefault(); // Evitar el comportamiento por defecto del enlace
    const notificacionesList = document.getElementById('notificaciones-list');
    notificacionesList.style.display = notificacionesList.style.display === 'block' ? 'none' : 'block';
});

// Cerrar la lista de notificaciones si se hace clic fuera de ella
document.addEventListener('click', function(event) {
    const notificacionesList = document.getElementById('notificaciones-list');
    const notificacionesLink = document.getElementById('notificaciones');
    if (!notificacionesLink.contains(event.target) && !notificacionesList.contains(event.target)) {
        notificacionesList.style.display = 'none';
    }
});

    