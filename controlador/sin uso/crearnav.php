<?php
function ocultarElementosMenu($elementosAOcultar, $htmlMenu) {
    // Convertimos el HTML en un DOMDocument para manipularlo
    $dom = new DOMDocument();
    @$dom->loadHTML($htmlMenu, LIBXML_HTML_NOIMPLIED);

    // Seleccionamos todos los elementos <a>
    $links = $dom->getElementsByTagName('a');

    // Iteramos sobre cada enlace
    foreach ($links as $link) {
        // Obtenemos el valor del atributo href
        $contenido = $link->textContent;

        // Verificamos si el href está en el arreglo de elementos a ocultar
        if (in_array($contenido, $elementosAOcultar)) {
            // Eliminamos el nodo del DOM
            $link->parentNode->removeChild($link);
        }
    }

    // Retornamos el HTML modificado
    return $dom->saveHTML();
}

// Ejemplo de uso
$htmlMenuOriginal = '<nav class="nav_principal" >
    <a href="inicio.php">Inicio</a>
    <a href="detalles_personal.php?tipo=estudiantes">Estudiantes</a>
    <a href="detalles_personal.php?tipo=profesores">Profesores</a>
    <a href="detalles_documentos.php?tipo=libros">Libros</a>
    <a href="detalles_documentos.php?tipo=trabajos_inv">Trabajos de investigacion</a>
    <a href="registrar_doc.php?tipo=libro">Registrar libro</a>
    <a href="registrar_doc.php?tipo=trabajo_inv">Registrar Trabajo de investigacion</a>
    <a href="registrar_personal.php?tipo=estudiante">Registrar estudiante</a>
    <a href="registrar_personal.php?tipo=profesor">Registrar profesor</a>
    <a href="../controladorfinal/clases/index.php">Objeto</a>
    <form id="formularioCerrarSesion" action="../controladorfinal/cerrar_sesion.php" method="post">
        <!-- <input type="text" value="Cerrar sesión"> -->
        <button type="button" class="cerrar_sesion" onclick="confirmarCerrarSesion()">Cerrar sesion</button>
    </form>
</nav>';
?>
<script>
    function confirmarCerrarSesion() {
        if (confirm("¿Estás seguro de que deseas cerrar sesión?")) {
            localStorage.setItem("inicio_sesion", "true");
            document.getElementById('formularioCerrarSesion').submit();
        }
    }
</script>
