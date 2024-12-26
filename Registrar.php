<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/Registrar.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>


	<!-- MENU -->
	<?php require './componentes/barra-lateral.php' ?>


	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			
		</nav>
		
		<main>
			<br><br>
			<div class="contenedor">

			<a href="registrar_indv.php?tipo=libro">	<div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Doc</h5><br><h2>Libro</h2>
					</div>
					<div style="background-image: url(imagenes/libros.png);" class="boci"></div>
				  </div>

			</a>


				<a href="registrar_indv.php?tipo=estudiante">  <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5></h5><br><h2>Estudiante</h2>
					</div>
					<div style="background-image: url(imagenes/graduacion.png);" class="boci"></div>
				  </div>
				</a> 


				 <a href="registrar_indv.php?tipo=profesor"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Personal</h5><br><h2>UNEFA</h2>
					</div>
					<div style="background-image: url(imagenes/profesor.png);" class="boci"></div>
				  </div>
				</a>

				<a href="registrar_indv.php?tipo=servicio-comunitario"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Servicio</h5><br><h2>Comunitario</h2>
					</div>
					<div style="background-image: url(imagenes/admin.png);" class="boci"></div>
				  </div>
				</a>
				
				<a href="registrar_indv.php?tipo=trabajo-inv"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Post</h5><br><h2>Grado</h2>
					</div>
					<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
				  </div>
				</a>
            </div>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html>