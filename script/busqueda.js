document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('busqueda');
    const tableRows = document.querySelectorAll('.busquedatabla tbody tr');
    const table = document.querySelector('.busquedatabla');
    const noResultsMessage = document.getElementById('noResults'); // Nuevo elemento para mostrar el mensaje
  
    searchInput.addEventListener('keyup', function() {
      const searchTerm = new RegExp(this.value, 'i'); // Búsqueda insensible a mayúsculas y minúsculas
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
        // si no encontramos resultado entonces ocultamos la tabla
        table.style.display = found ? 'table' : 'none';
    });
  });