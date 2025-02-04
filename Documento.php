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
	<link rel="stylesheet" href="estilo/documento.css">
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
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			
			
		</nav>
		
		<main>
			<br><br>
			<div class="contenedor">

			<a href="ver_libro.php"><div style="background-image: url(imagenes/libro-magico.png);" class="box">
				<div class="ima">
					<h5>Doc</h5><br><h2>Libro</h2>
				</div>
				<div style="background-image: url(imagenes/libros.png);" class="boci"></div>
			  </div>
			</a>

			 <a href="comunitario.php"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
				<div class="ima">
					<h5>Servicios</h5><br><h2>Comunitario</h2>
				</div>
				<div style="background-image: url(imagenes/libro\ \(1\).png);" class="boci"></div>
			  </div>
			</a>



			 <a href="grado.php"><div style="background-image: url(imagenes/libro-magico.png);" class="box">
				<div class="ima">
					<h5>Post</h5><br><h2>Grado</h2>
				</div>
				<div style="background-image: url(imagenes/libro\ \(2\).png);" class="boci"></div>
			  </div>
			</a> 

			<a href="prestamo.php"><div style="background-image: url(imagenes/libro-magico.png);" class="box">
				<div class="ima">
					<h5>Ver</h5><br><h2>Prestamos</h2>
				</div>
				<div style="background-image: url(imagenes/libro\ \(2\).png);" class="boci"></div>
			  </div>
			</a> 

			
			</div>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html> 