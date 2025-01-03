<?php
// abre y cierra la conexion solo 
require './controlador/cantidad.php';

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
	<link rel="stylesheet" href="./estilo/style.css">
	<title>Biblioteca</title>
</head>
<!--  body -->

<body>
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
			</li>

			<li>
				<a href="Registrar.php">
					<i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li>
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

		</nav>

		<main>

			<div class="items">
				<div class="item uS">
					<div style="background-image: url(imagenes/graduado.png);" class="image u"></div>
					<div class="info"><br>
						<p class="portada">Libros</p>
						<h3 class="sub_portada"><?= $total_libro ?></h3>
					</div>
				</div>

				<div class="item dS">
					<div style="background-image: url(imagenes/leer.png);" class="image d"></div>
					<div class="info"><br>
						<p class="portada">Trabajos</p>
						<h3 class="sub_portada"><?= $total_ti ?></h3>

					</div>
				</div>

				<div class="item tS">
					<div style="background-image: url(imagenes/libro-magico.png);" class="image t"></div>
					<div class="info"><br>
						<p class="portada">Prestamos</p>
						<h3 class="sub_portada"> <?= $total_prestados ?></h3>
					</div>
				</div>




				<div class="item cS">
					<div style="background-image: url(imagenes/diario.png);" class="image c"></div>
					<div class="info"><br>

						<p class="portada">Personas registrada</p>
						<h3 class="sub_portada"> <?= $total_personas ?> </h3>


					</div>
				</div>
			</div>

			<div class="elementos">

				<div class=" porcentaje">
					<p>Carreras</p><br>
					<a href="Sistemas.php">
						<div style="background-image: url(imagenes/informatica.png);" class="box">


							<div class="ima">
								<p>Ingenieria en Sistemas</p>
							</div>

							<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</div>
					</a>
					<br>

					<a href="civil.php">
						<div style="background-image: url(imagenes/excavador.png);" class="box ci">
							<div class="ima vil">
								<p>Ingenieria civil</p>
							</div>
							<div style="background-image: url(imagenes/civil.png);" class="boci"></div>
						</div>
					</a>
					<br>
					<a href="enfermeria.php">
						<div style="background-image: url(imagenes/caduceo.png);" class="box en">

							<div class="ima fer">
								<p>TSU Enfermeria</p>
							</div>
							<div style="background-image: url(imagenes/enfermeria.png);" class="boci"></div>
						</div>
					</a>
					<br>
					<a href="turismo.php">
						<div style="background-image: url(imagenes/turismo\ \(1\).png);" class="box tu">
							<div class="ima ris">
								<p>Licurismo</p>
							</div>
							<div style="background-image: url(imagenes/turismo\ \(2\).png);" class="boci b"></div>
						</div>
					</a>

					<br>
					<a href="adminis.php">
						<div style="background-image: url(imagenes/admin\ \(2\).png);" class="box ad">
							<div class="ima mon">
								<p>Lic Admon</p>
							</div>
							<div style="background-image: url(imagenes/admin.png);" class="boci b"></div>
						</div>
					</a>
					<br>
					<a href="ads.php">
						<div style="background-image: url(imagenes/ads\ \(2\).png);" class="box ads">
							<div class="ima asd">
								<p>TSU ADS</p>
							</div>
							<div style="background-image: url(imagenes/ads.png);" class="boci b"></div>
						</div>
					</a>
				</div>


				<div class=" tabla">
					<div class="menurapido">
						<p>Reporte</p>
						<div style="background-image: url(imagenes/libro-magico.png);" class="descargar">
							<a href="./reportes/reporte_doc.php">
							<div class="gla"> Documento
								<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton"></div>
							</div>
							</a>
						</div>
						<div style="background-image: url(imagenes/libro-magico.png);" class="descargar">
							<a href="./reportes/reporte_estudiantes.php">
							<div class="gla">Estudiantes <div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
								</div>
							</div>
							</a>
						</div>
						<div style="background-image: url(imagenes/libro-magico.png);" class="descargar">
							<a href="./reportes/reporte_prestamos.php">
							<div class="gla">Prestamos<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
								</div>
							</div>
							</a>
						</div>
						<div style="background-image: url(imagenes/libro-magico.png);" class="descargar">
							<a href="./reportes/reporte_personal_unefa.php">
							<div class="gla">Personal UNEFA<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
								</div>
							</div>
							</a>
						</div>
					</div>
				</div>
			</div>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->

	<script src="script.js"></script>
</body>

</html>