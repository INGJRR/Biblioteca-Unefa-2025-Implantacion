<?php
	//proteccion de rutas
	session_start();

	if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
		header('location: ./index.php');
	};
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="./estilo/unefa.css">
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



		</nav>

		<main>
			<br><br>
			<div class="contenedor">

				<a href="docente.php">
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<div class="ima">
							<h5>Personal</h5><br>
							<h2>Docente</h2>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
					</div>
				</a>


				<a href="obrero.php">
					<div style="background-image: url(imagenes/excavador.png);" class="box ci">
						<div class="ima vil">
							<h5>Personal</h5><br>
							<h2>Obrero</h2>
						</div>
						<div style="background-image: url(imagenes/civil.png);" class="boci"></div>
					</div>
				</a>
			</div>
			<br><br>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->

	<script src="script.js"></script>
</body>

</html>