<?php

$buscar = ''; 
// Comprobamos si existe el parámetro 'búsqueda' en la URL
if (isset($_GET['buscar'])) {
    // Si existe, lo almacenamos en una variable
    $buscar = $_GET['buscar'];
    // echo "El valor del parámetro búsqueda es: " . $busqueda;
} else {
    // echo "No se encontró el parámetro búsqueda en la URL.";
}

?>




<!-- Estructura del html -->
<form action="<?php echo (isset($url_buscar)) ? $url_buscar : '' ?>" style="margin: 0 auto;" method="get">
    <div class="form-input">
        <input id="busqueda" type="search" placeholder="Buscar" name="buscar" value="<?= $buscar?>">
        <button type="submit" style="background-image: url(imagenes/buscar\ \(1\).png);" class="search-btn"><i class='bx bx-search'></i></button>
    </div>
</form>