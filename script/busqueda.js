document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('busqueda');
    const tableRows = document.querySelectorAll('.busquedatabla tbody tr');
    const table = document.querySelector('.busquedatabla');
    const noResultsMessage = document.getElementById('noResults'); // Nuevo elemento para mostrar el mensaje
    const noBusqueda = document.getElementById('noResultsSpan');
  
    // // mi funcion para el evento
    // function Busqueda() {
    //     const searchTerm = new RegExp(searchInput.value, 'i'); // Búsqueda insensible a mayúsculas y minúsculas
    //     let found = false; // Variable para llevar la cuenta de si se encontró alguna coincidencia
    //     tableRows.forEach(row => {
    //         const textContent = row.textContent.toLowerCase();
    //         if (searchTerm.test(textContent)) {
    //             row.style.display = 'table-row';
    //             found = true; // Si se encuentra una coincidencia, se establece found en true
    //         } else {
    //             row.style.display = 'none';
    //         }
    //     });
          
    //     // Mostrar o ocultar el mensaje según si se encontraron resultados
    //     noResultsMessage.style.display = found ? 'none' : 'block';
    //     noBusqueda.textContent = found ? 'Buscando...' : searchInput.value;
    //     // si no encontramos resultado entonces ocultamos la tabla
    //     table.style.display = found ? 'table' : 'none';
    // }

    function Busqueda() {
        const searchTerms = searchInput.value.split(',').map(term => term.trim()); // Dividir los términos de búsqueda y eliminar espacios en blanco
        let found = false; // Inicializar en false , si hay alguna coincidencia se volvera true
        
        

        tableRows.forEach(row => {
          const textContent = row.textContent.toLowerCase();
          let rowMatches = true; // Bandera para indicar si la fila coincide con todos los términos

          searchTerms.forEach(term => {
            if (!textContent.includes(term.toLowerCase())) {
              rowMatches = false; // Si algún término no coincide, la fila no coincide
            }else{
            }
          });
    
          row.style.display = rowMatches ? 'table-row' : 'none';
          found = rowMatches ? true : found; // Actualizar found solo si todos los términos coinciden
        });
    
        // Mostrar o ocultar el mensaje según si se encontraron resultados
        noResultsMessage.style.display = found ? 'none' : 'block';
        noBusqueda.textContent = found ? 'Buscando...' : searchInput.value;
        table.style.display = found ? 'table' : 'none';
    }
    
    searchInput.addEventListener('input', Busqueda);

    Busqueda();
});