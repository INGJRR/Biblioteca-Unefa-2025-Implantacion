<?php
	require_once './ruta.php';
	require_once ROOT_DIR . '/controlador/registrar/ti.php';
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/Regi_grado.css">
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

			<li class="active">
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

			<a class="retorn" href="Registrar.php">Regresar</a>
		</nav>


	</section>
	<!-- BARRA SUPERIOR -->
	<br><br>
	<main>

		<br>
		<form class="form" method="POST" >
			<p class="title">Trabajo de investigacion</p><br><br><br>



			<label>
				<input value="<?= $cota ?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" required="" placeholder="" type="text" class="input">
				<span>Cota</span>
			</label>

			<label>
				<input value="<?= $titulo?>" <?= ($titulo == '') ? $estilosError : '' ?> name="titulo" required="" placeholder="" type="text" class="input">
				<span>Titulo</span>
			</label>
			<label>
				<input value="<?= $autor ?>" <?= ($autor == '') ? $estilosError : '' ?> name="autor" required="" placeholder="" type="text" class="input">
				<span>Autor</span>
			</label>
			<label>
				<input value="<?= $tutor ?>" <?= ($tutor == '') ? $estilosError : '' ?> name="tutor" required="" placeholder="" type="text" class="input">
				<span>Tutor</span>
			</label>
			<label>
				<input value="<?= $fecha ?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" required="" placeholder="" type="number" class="input">
				<span>Año</span>
			</label>
			<label>
				<input value="<?= $carrera ?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" required="" placeholder="" type="text" class="input">
				<span>Carrera</span>
			</label>
			<label>
				<input value="<?= ($linea_investigacion) ?? '' ?>" <?= ($linea_investigacion == '') ? $estilosError : '' ?> name="linea_investigacion" placeholder="" type="text" class="input">
				<span>Linea de investigacion</span>
			</label>
			<label>
				<input value="<?= ($mencion) ?? '' ?>" <?= ($mencion == '') ? $estilosError : '' ?> name="mencion" placeholder="" type="text" class="input">
				<span>Mencion</span>
			</label>
			<label>
				<input value="<?= ($metodologia) ?? '' ?>" <?= ($metodologia == '') ? $estilosError : '' ?> name="metodologia" placeholder="" type="text" class="input">
				<span>Metodologia</span>
			</label>
			<label>
				<select value="<?= $tipo ?>" <?= ($tipo == '') ? $estilosError : '' ?> name="tipo" required id="" class="input" >
					<option value="1">Posgrado</option>
					<option value="2">Pregrado</option>
				</select>
				<span>Tipo</span>
			</label>
			<label>
				<input value="<?= ($palabras_claves) ?? '' ?>" <?= ($palabras_claves == '') ? $estilosError : '' ?> name="palabras_claves" placeholder="" type="text" class="input">
				<span>Palabras claves</span>
			</label>
			<br>
			<button class="submit">Registrar</button>

		</form>

	</main>




	<script src="script.js"></script>
</body>

</html>