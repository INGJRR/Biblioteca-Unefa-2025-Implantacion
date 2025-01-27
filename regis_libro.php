<?php
require_once './ruta.php';
require_once ROOT_DIR . '/controlador/registrar/libro.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/Regi_libro.css">
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

			<li >
				<a href="admin-inicio.php">
					<i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Inicio</span>
				</a>
			</li><br>

			<li class="active">
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

			<a class="retorn" href="Registrar.php">Regresar</a>

		</nav>


	</section>
	<!-- BARRA SUPERIOR -->
	<br><br>
	<main>

		<br>
		<form class="form" method="POST">
			<p class="title">Libro</p><br>
			<label>
				<input value="<?= $titulo?>" <?= ($titulo == '') ? $estilosError : '' ?> name="titulo" title="Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100" required="" placeholder="" type="text" class="input">
				<span>Titulo</span>
			</label>
 
			<label>
				<input value="<?= $autor?>" <?= ($autor == '') ? $estilosError : '' ?>  name="autor" title="Solo letras, numeros de letras: minimo: 3 , Max: 100"  required="" placeholder="" type="text" class="input">
				<span>Autor</span>
			</label>
			<label>
				<input value="<?= $carrera?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" title=" Solo letras, numeros de letras: minimo: 2 , Max: 100"  placeholder="" type="text" class="input">
				<span>Area de estudio</span>
			</label>
			<label>
				<input value="<?= $fecha?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" title="Formato valido 2000-10-01 Año, mes, dia"  required="" placeholder="" type="text" class="input">
				<span>Año</span>
			</label>
			<label>
				<input value="<?= $cota?>" <?= ($cota == '') ? $estilosError : '' ?>  name="cota" title="Letra y numeros, ejemplo: O987P789 o K987P890"  required="" placeholder="" type="text" class="input">
				<span>Cota</span>
			</label>
			<label>
				<input value="<?= $editorial?>" <?= ($editorial == '') ? $estilosError : '' ?> name="editorial" required="" title=" Solo admiten numeros y letras numero de letras: minimo: 4, Maximo: 100"  placeholder="" type="text" class="input">
				<span>Editorial</span>
			</label>
			<label>
				<input value="<?= $cantidad?>" <?= ($cantidad == '') ? $estilosError : '' ?>  name="cantidad" required="" title=" solo admiten numeros, cantidad minima: 1 Maxima: 100"  placeholder="" type="number" class="input">
				<span>Ejemplar</span>
			</label>
			<br>
			<button class="submit">Registrar</button>

		</form>
		<br>
	</main>

	<style>
		.infoinput{
			margin: 30px auto;
			width: 60vw;
			text-align: center;
			font-size: 20px;
			display: flex;
			flex-direction: column;
			line-height: 2;
		}
	</style>
	 
	<?php if(isset($mensaje) && $mensaje != ""):?>
	<div class="infoinput form">
		<h4>Mensaje de alerta</h4>
		<div>
			<p><?= $mensaje ?></p>			
		</div>
	</div>
	<?php endif?>
	




	<script src="script.js"></script>
</body>

</html>