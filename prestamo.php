<?php
require_once './ruta.php';
require ROOT_DIR . '/modelo/conexion.php';
require ROOT_DIR . '/controlador/getInfo/prestamo.php';
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
	<section id="sidebar">
		<div class="l">
			<span>
				<div style="background-image: url(imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div>
			</span>
			<div>
				<p class="pe">Biblioteca </p>
				<p class="p">Luis Beltran Prieto Figueroa</p><br>
			</div>

		</div>
		<ul class="side-menu top">


			<li>
				<a href="admin-inicio.php">
					<i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Inicio</span>
				</a>
			</li>

			<li>
				<a href="Registrar.php">
					<i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li class="active">
				<a href="Documento.php">
					<i style="background-image: url(imagenes/libro.png);" class='bx bxs-doughnut-chart icon'></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li>
				<a href="estudiantes.php">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon'></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="unefaper.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon'></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">

			<li>
				<a href="./controlador/cerrar_sesion.php" class="logout">
					<i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon'></i>
					<span class="text">Salir</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="Documento.php">Regresar</a>
			<?php require './componentes/buscador.php'?>
		</nav>
		<br><br>
		<main>

			<div id="main-container">

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
							<td><?= $prestamo["cedula_persona"] ?></td>
							<td><?= $prestamo["cota_documento"] ?></td>
							<td><?= $prestamo["estado"] ?></td>
							<td><?= $prestamo["fecha_prestamo"] ?></td>
							<td><?= $prestamo["fecha_devolucion"] ?></td>
							<td>
								<?php if($prestamo["estado"] == "Prestado"):?>
									<a href="./controlador/modificar/actualizar.php?id=<?= $prestamo["id"]?>&tipo=1" >Devolver</a>
								<?php elseif($prestamo["estado"] == "Devuelto"):?>
									<a href="./regis_prestamo.php?cota=<?= $prestamo["cota_documento"]?>" >Prestar</a>
								<?php else: ?>
									<p>Error</p>
								<?php endif?>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
				<div id="noResults" style="display: none;">No se encontraron resultados.</div>

			</div>

		</main>
	</section>
	<!-- BARRA SUPERIOR -->

	<script src="script.js"></script>
	<script src="./script/busqueda.js" ></script>

</body>

</html>