<?php
//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
	header('location: ./index.php');
};

require_once './ruta.php';
require ROOT_DIR . '/modelo/conexion.php';
require ROOT_DIR . '/controlador/getInfo/ti.php';
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
			<br><br>

			<li class="active">
				<a href="admin-inicio.php">
					<i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Inicio</span>
				</a>
			</li><br>

			<li>
				<a href="regis_libro.php">
					<i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Registrar libro</span>
				</a>
			</li><br>
			<li>
				<a href="regis_pero.php">
					<i style="background-image: url(imagenes/libro.png);" class='bx bxs-doughnut-chart icon'></i>
					<span class="text">Registrar personal <br> unefa </span>
				</a>
			</li><br>
			<li>
				<a href="regis_grado.php">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon'></i>
					<span class="text">Registrar Trabajo de <br> investigacion  </span>
				</a>
			</li><br>
			<li>
				<a href="regis_estu.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon'></i>
					<span class="text">Registrar estudiante</span>
				</a>
			</li><br>
			<li>
				<a href="regis_comu.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon'></i>
					<span class="text">Registrar trabajo de <br> comunitario</span>
				</a>
			</li><br>
			<li>
				<a href="regis_prestamo.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon'></i>
					<span class="text">Registrar prestamo</span>
				</a>
			</li><br>
		</ul>

		<ul class="side-menu">

			<li>
				<a href="./controlador/cerrar_sesion.php" class="logout">
					<i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon'></i>
					<span class="text">Cerrar sesion</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="admin-inicio.php">Regresar</a>
			<?php if(isset($tis)){ 
				$url_buscar = './grado.php';
				require './componentes/buscador.php'; 
			}
			?>
		</nav>
		<br><br>
		<main>

			<div id="main-container">
				<?php if(isset($tis)):?>
				<table class="busquedatabla">
					<thead>
						<tr>
							<th>Titulo</th>
							<th>Autor</th>
							<th>Cota</th>
							<th>Tutor</th>
							<th>Linea de investigacion</th>
							<th>Metodologia</th>
							<th>Acciones</th>
						</tr>
					</thead>
					<tbody>
					<?php foreach ($tis as $ti): ?>
						<tr>
							<td><?= $ti["titulo"] ?></td>
							<td><?= $ti["autor"] ?></td>
							<td><?= $ti["cota"] ?></td>
							<td><?= $ti["tutor"] ?></td>
							<td><?= $ti["linea_investigacion"] ?></td>
							<td><?= $ti["metodologia"] ?></td>
							<td>
								<a href="./modificar/ti.php?cota=<?= $ti["cota"] ?>" >Modificar</a>
							</td>
						</tr>
					<?php endforeach ?>
					</tbody>
				</table>
				<?php else:?>
				<div>No hay informacion para mostrar</div>
				<?php endif?>
				<div id="noResults" style="display: none; margin: 40px 0; font-size: 30px;">
					No se encontraron resultados, Busqueda: <span id="noResultsSpan"></span>
				</div>
			</div>

		</main>
	</section>
	<!-- BARRA SUPERIOR -->

	<script src="script.js"></script>
	<script src="./script/busqueda.js" ></script>

</body>

</html>