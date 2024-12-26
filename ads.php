<?php 
	require './modelo/conexion.php';
	$carrera = 'Ads';
	require './controlador/info_estudiante.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="./estilo/ads.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>

	<!-- MENU -->
	<?php require './componentes/barra-lateral.php'?>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			<a class="retorn" href="estudiantes.php">Regresar</a>
			
		</nav>
		<br><br>
		<main>
			<?php if(empty($estudiantes)): ?>
				<div>No hay datos para mostrar</div>
			<?php else: ?>
            <div id="main-container">
			<table>
                    <thead>
                        <tr>
                            <th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Telefono</th>
							<th>Estado</th>
							<th>Moroso</th>
                        </tr>
                    </thead>
					<?php foreach($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?= $estudiante["cedula"] ?></td>
                        <td><?= $estudiante["nombre"] ?></td>
                        <td><?= $estudiante["apellido"] ?></td>
                        <td><?= $estudiante["telefono"] ?></td>
                        <td><?php echo ($estudiante["estado"] == 0) ? 'Inactivo' : 'Activo' ?></td>
                        <td><?php echo ($estudiante["moroso"] == 0) ? 'No' : 'Si' ?></td>
                    </tr>
					<?php endforeach?>
                </table>
            </div>
			<?php endif?>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html>