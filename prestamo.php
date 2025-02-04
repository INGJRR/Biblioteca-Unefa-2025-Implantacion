<?php
require_once './ruta.php';
require ROOT_DIR . '/modelo/conexion.php';
require ROOT_DIR . '/controlador/getInfo/prestamo.php';




$md_confi_mensaje = '';
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
	<?php
		$menuActive = 1;
		require ROOT_DIR . '/componentes/menuLateral.php';
	?>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="admin-inicio.php">Regresar</a>
			<?php if(isset($prestamos)){require './componentes/buscador.php';}?>
		</nav>
		<br><br>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;">LISTADO DE LOS PRESTAMOS REALIZADO</h4>
		<main>

			<div id="main-container">
				<?php if(isset($prestamos)): ?>
				<table class="busquedatabla">
					<thead>
						<tr>
							<th>ID Prestamo</th>
							<th>Cedula</th>
							<th>Cota</th>
							<th>Estado</th>
							<th>Fecha</th>
							<th>Fecha de devolucion</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($prestamos as $prestamo): ?>
						<tr>
							<td><?= $prestamo["id"] ?></td>
							<td>
								<?= $prestamo["cedula_persona"] ?>
							</td>
							<td><?= $prestamo["cota_documento"] ?></td>
							<td><?= $prestamo["estado"] ?></td>
							<td><?= $prestamo["fecha_prestamo"] ?></td>
							<td><?= $prestamo["fecha_devolucion"] ?></td>
							<td>
								<?php if($prestamo["estado"] == "Prestado"):?>
									 <a href="./controlador/modificar/actualizar.php?tipo=1&id=<?= $prestamo["id"]?>" class="button open-button" style="cursor: pointer;" >Devolver</a>
								<?php elseif($prestamo["estado"] == "Devuelto"):?>
								<?php else: ?>
									<p>Error</p>
								<?php endif?>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
				<?php else: ?>
					<div>No hay información para mostrar</div>
				<?php endif?>
				<div id="noResults" style="display: none; margin: 40px 0; font-size: 30px;">
					No se encontraron resultados, Busqueda: <span id="noResultsSpan"></span>
				</div>
 
			</div>

		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<style>
		.button{
			background-color: var(--ico);
			text-decoration: none;
			padding: 5px 10px;
			color: black;
			border-radius: 10px;
			font-size: 20px;
		}
		.button:hover{
			color: darkblue;
		}

	</style>



	<script src="script.js"></script>
	<script src="./script/busqueda.js" ></script>

</body>

</html>