<?php
// abre y cierra la conexion solo 
require './controlador/cantidad.php';

?>
<?php
require_once './ruta.php';
require_once ROOT_DIR . '/controlador/registrar/prestamo.php';
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
			<br><br><br>

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
					<span class="text">Registrar Trabajo de <br> investigacion </span>
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
			<br>
			<li>
				<a href="./controlador/cerrar_sesion.php" class="logout">
					<i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon'></i>
					<span style="color: red;" class="text">Cerrar sesion</span>
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
						<p class="portada">Documentos</p>
						<h3 class="sub_portada"><?= $total_general_registro_doc ?></h3>
					</div>
				</div>

				<div class="item dS">
					<div style="background-image: url(imagenes/leer.png);" class="image d"></div>
					<div class="info"><br>
						<p class="portada">Ejemplares</p>
						<h3 class="sub_portada"><?= $total_general ?></h3>

					</div>
				</div>

				<div class="item tS">
					<div style="background-image: url(imagenes/libro-magico.png);" class="image t"></div>
					<div class="info"><br>
						<p class="portada">Prestamos</p>
						<h3 class="sub_portada"> <?= $total_prestados ?></h3>
					</div>
				</div>





			</div>



			<div class="elementos">

				<div class=" porcentaje">
					<h3>Estudiantes registrados</h3><br>

					<div>
						<?php
							$url = './todos_estudiantes_ver.php'; 
							require ROOT_DIR . '/componentes/buscadorGlobal.php'
						?>
					</div>

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
								<p>Lic Administracion</p>
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

				<div class="elementosdedereca">

					<div class=" tabla">

						<div class="menurapido">
							<h3>Descargar reporte</h3>

							<div class="elementosflex">

								<!-- muestra todos los documentos por tipo cuantos hay en total -->
								<div class="descargar">
									<a href="./reportes/reporte_doc.php" target="_blank">
										<div class="gla"> Documentos
											<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton"></div>
										</div>
									</a>
								</div>

								<!-- muestra todos los documentos prestados que estan pendientes por entregar -->
								<div class="descargar">
									<a href="./reportes/reporte_doc_prestados.php" target="_blank">
										<div class="gla"> Documentos prestados
											<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton"></div>
										</div>
									</a>
								</div>



								<div class="descargar">
									<a href="./reportes/reporte_estudiantes.php">
										<div class="gla">Estudiantes <div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
											</div>
										</div>
									</a>
								</div>
								<div class="descargar">
									<a href="./reportes/reporte_prestamos.php">
										<div class="gla">Prestamos<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
											</div>
										</div>
									</a>
								</div>
								<div class="descargar">
									<a href="./reportes/reporte_personal_unefa.php">
										<div class="gla">Personal administrativo<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
											</div>
										</div>
									</a>
								</div>
							</div>
						</div>
					</div>

					<div class="personalUNEFA">
						<div class="cajapadre">
							<H3>Personal UNEFA registrado</H3><br><br>
							<div>
								<?php
									$url = './todos_personal_une.php'; 
									require ROOT_DIR . '/componentes/buscadorGlobal.php'
								?>
							</div>
							<a href="docente.php">
								<div style="background-image: url(imagenes/informatica.png);" class="box">
									<div class="ima">
										<p>Personal docente</p><br>

									</div>
									<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
								</div>
							</a><br>

							<a href="obrero.php">
								<div style="background-image: url(imagenes/excavador.png);" class="box ci">
									<div class="ima vil">
										<p style="color: white;">Personal administrativo</p><br>

									</div>
									<div style="background-image: url(imagenes/libro\ \(2\).png);" class="boci"></div>
								</div>
							</a>
						</div>
					</div>

					<div class="reistrodeprestamo">
						<h3>Registrar un prestamo</h3>
						<form class="form" method="POST">

							<label>
								<input value="<?= $cedula ?>" <?= ($cedula == '') ? $estilosError : '' ?> name="cedula" required="" placeholder="" type="number" class="input">
								<span>Cedula</span>
							</label>

							<label>
								<input value="<?= $cota ?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" required="" placeholder="" type="text" class="input">
								<span>Cota</span>
							</label>
							<br>
							<button class="submit">Realizar prestamo</button>
						</form>
					</div>
				</div>



				<div class="docc">
					<h3>Documentos registrados</h3>
					<div>
						<?php
							$url = './todos_doc.php'; 
							require ROOT_DIR . '/componentes/buscadorGlobal.php'
						?>
					</div>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="ver_libro.php">
						<div class="ima">
							<p>Libros </p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="comunitario.php">
						<div class="ima">
							<p>Servicio comunitario </p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="grado.php">
						<div class="ima">
							<p>Trabajos de investigacion Post Grado/ Pre Grado</p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
				</div>

				
				<div class="docc">
					<h3>Visualizar prestamos realizados</h3>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="./prestamo.php">
						<div class="ima">
							<p>Prestamos </p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
				</div>

			</div>


		</main>
	</section>
	<!-- BARRA SUPERIOR -->

	<script src="script.js"></script>
</body>

</html>