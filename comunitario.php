<?php
    require_once './modelo/conexion.php';
    include './controlador/info_servicio_comunitario.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/comunitario.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>

	<!-- MENU -->
	<?php include "./componentes/barra-lateral.php" ?>
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
                            <th>Cota</th>
                            <th>Tutor</th>
                            <th>Tutor Comunitario</th>
                            <th>Fecha de presentacion</th>
                            <th>Cantidad</th>
                            <th>Institucion</th>
                        </tr>
                    </thead>
                    <?php foreach($servicios_comunitarios as $sv): ?>
                    <tr>
                        <td><?= $sv["titulo"]?></td>
                        <td><?= $sv["autor"]?></td>
                        <td><?= $sv["cota"]?></td>
                        <td><?= $sv["tutor"]?></td>
                        <td><?= $sv["tutor_comunitario"]?></td>
                        <td><?= $sv["fecha_presentacion"]?></td>
                        <td><?= $sv["cantidad"]?></td>
                        <td><?= $sv["lugar"]?></td>
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