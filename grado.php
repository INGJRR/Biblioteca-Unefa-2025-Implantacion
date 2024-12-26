<?php 
	require './modelo/conexion.php';
	require './controlador/info_trabajo_inv.php'
?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/grado.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>

	<!-- MENU -->
	<?php require './componentes/barra-lateral.php'  ?>
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
							<th>Linea de investigacion</th>
							<th>Metodologia</th>
                        </tr>
                    </thead>
					<?php foreach($tis as $ti): ?>
                    <tr>
                        <td><?= $ti["titulo"] ?></td>
                        <td><?= $ti["autor"] ?></td>
                        <td><?= $ti["cota"] ?></td>
                        <td><?= $ti["tutor"] ?></td>
                        <td><?= $ti["linea_investigacion"] ?></td>
                        <td><?= $ti["metodologia"] ?></td>
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