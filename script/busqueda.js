document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('busqueda');
    const tableRows = document.querySelectorAll('.busquedatabla tbody tr');
    const table = document.querySelector('.busquedatabla');
    const noResultsMessage = document.getElementById('noResults'); // Nuevo elemento para mostrar el mensaje
    const noBusqueda = document.getElementById('noResultsSpan');
  
    // mi funcion para el evento
    function Busqueda() {
        const searchTerm = new RegExp(searchInput.value, 'i'); // Búsqueda insensible a mayúsculas y minúsculas
        let found = false; // Variable para llevar la cuenta de si se encontró alguna coincidencia
        tableRows.forEach(row => {
            const textContent = row.textContent.toLowerCase();
            if (searchTerm.test(textContent)) {
                row.style.display = 'table-row';
                found = true; // Si se encuentra una coincidencia, se establece found en true
            } else {
                row.style.display = 'none';
            }
        });
          
        // Mostrar o ocultar el mensaje según si se encontraron resultados
        noResultsMessage.style.display = found ? 'none' : 'block';
        noBusqueda.textContent = found ? 'Buscando...' : searchInput.value;
        // si no encontramos resultado entonces ocultamos la tabla
        table.style.display = found ? 'table' : 'none';
    }
    
    searchInput.addEventListener('input', Busqueda);

    Busqueda();
});