<?php 
    require_once './modelo/conexion.php';
    include_once './controlador/info_libro.php'
    ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/ver.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>

	<!-- MENU -->
	<?php include "./componentes/barra-lateral.php"?>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			<a class="retorn" href="Documento.php">Regresar</a>
			
		</nav>
		<br><br>
		<main>
			
            <div id="main-container">

                <table>
                    <thead>
                        <tr>
                            <th>Titulo</th>
							<th>Autor</th>
							<th>Año</th>
							<th>Cota</th>
							<th>Editorial</th>
							<th>Ejemplar</th>
							
                        </tr>
                    </thead>
                    <?php foreach( $libros as $libro): ?>
                    <tr>
                        <td><?= $libro["titulo"]?></td>
                        <td><?= $libro["autor"]?></td>
                        <td><?= $libro["fecha"]?></td>
                        <td><?= $libro["cota"]?></td>
                        <td><?= $libro["editorial"]?></td>
                        <td><?= $libro["cantidad"]?></td>
                    </tr>
                    <?php endforeach?>
                </table>
            </div>
        
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html>