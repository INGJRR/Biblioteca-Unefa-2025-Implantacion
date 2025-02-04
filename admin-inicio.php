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

	<?php
		$menuActive = 1;
		require ROOT_DIR . '/componentes/menuLateral.php';

	?>


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
								<p>Ingeniería en Sistemas</p>
							</div>

							<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</div>
					</a>
					<br>

					<a href="civil.php">
						<div style="background-image: url(imagenes/excavador.png);" class="box ci">
							<div class="ima vil">
								<p>Ingeniería Civil</p>
							</div>
							<div style="background-image: url(imagenes/civil.png);" class="boci"></div>
						</div>
					</a>
					<br>
					<a href="enfermeria.php">
						<div style="background-image: url(imagenes/caduceo.png);" class="box en">

							<div class="ima fer">
								<p>TSU Enfermería</p>
							</div>
							<div style="background-image: url(imagenes/enfermeria.png);" class="boci"></div>
						</div>
					</a>
					<br>
					<a href="turismo.php">
						<div style="background-image: url(imagenes/turismo\ \(1\).png);" class="box tu">
							<div class="ima ris">
								<p>Lic en Turismo</p>
							</div>
							<div style="background-image: url(imagenes/turismo\ \(2\).png);" class="boci b"></div>
						</div>
					</a>

					<br>
					<a href="adminis.php">
						<div style="background-image: url(imagenes/admin\ \(2\).png);" class="box ad">
							<div class="ima mon">
								<p>Lic en Administración</p>
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
									<a href="./reportes/reporte_estudiantes.php" target="_blank">
										<div class="gla">Estudiantes <div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
											</div>
										</div>
									</a>
								</div>
								<div class="descargar">
									<a href="./reportes/reporte_prestamos.php" target="_blank">
										<div class="gla">Morosos<div style="background-image: url(imagenes/flecha-hacia-abajo-para-navegar.png);" class="boton">
											</div>
										</div>
									</a>
								</div>
								<div class="descargar">
									<a href="./reportes/reporte_personal_unefa.php" target="_blank">
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



				<div class="docc" style="width: 100%;" >
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
							<p>Libros</p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="comunitario.php">
						<div class="ima">
							<p>Trabajos de servicio comunitario</p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="pasantia.php">
						<div class="ima">
							<p>Prácticas profesionales (pasantía)</p>
						</div>
						<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
						</a>
					</div>
					<div style="background-image: url(imagenes/informatica.png);" class="box">
						<a href="grado.php">
						<div class="ima">
							<p>Trabajos de investigación de posgrado y pregrado</p>
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