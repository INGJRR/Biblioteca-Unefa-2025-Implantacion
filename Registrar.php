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
	<link rel="stylesheet" href="estilo/Registrar.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>


	<!-- MENU -->
	<section id="sidebar">
		
		<div class="l">
			<span><div style="background-image: url(imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div></span>
		  <div><p class="pe">Biblioteca </p> <p class="p" >Luis Beltran Prieto Figueroa</p><br></div>
		
		</div>


		<ul class="side-menu top">
			

			<li >
				<a href="admin-inicio.php">
					<i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon' ></i>
					<span class="text">Inicio</span>
				</a>
			</li>

			<li class="active">
				<a href="Registrar.php">
					<i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon' ></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li>
				<a href="Documento.php">
					<i style="background-image: url(imagenes/libro.png);" class='bx bxs-doughnut-chart icon' ></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li>
				<a href="estudiantes.php">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon' ></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="unefaper.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon' ></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
		
			<li>
				<a href="./controlador/cerrar_sesion.php" class="logout">
					<i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon' ></i>
					<span class="text">Salir</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			
		</nav>
		
		<main>
			<br><br>
			<div class="contenedor">

			<a href="regis_libro.php">	<div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Doc</h5><br><h2>Libro</h2>
					</div>
					<div style="background-image: url(imagenes/libros.png);" class="boci"></div>
				  </div>

			</a>


				<a href="regis_estu.php">  <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5></h5><br><h2>Estudiante</h2>
					</div>
					<div style="background-image: url(imagenes/graduacion.png);" class="boci"></div>
				  </div>
				</a> 


				 <a href="regis_pero.php"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Personal</h5><br><h2>UNEFA</h2>
					</div>
					<div style="background-image: url(imagenes/profesor.png);" class="boci"></div>
				  </div>
				</a>

				<a href="regis_comu.php"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
					<div class="ima">
						<h5>Servicio</h5><br><h2>Comunitario</h2>
					</div>
					<div style="background-image: url(imagenes/admin.png);" class="boci"></div>
				  </div>
				</a>
				
				<a href="regis_grado.php"> <div style="background-image: url(imagenes/libro-magico.png);" class="box">
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