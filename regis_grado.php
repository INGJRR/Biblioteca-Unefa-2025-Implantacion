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
			<br><br>

			<li >
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
			<li class="active">
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
		<form class="form" method="POST" >
			<p class="title">Trabajo de investigacion</p><br><br><br>



			<label>
				<input title="Letra y numeros, ejemplo: O987P789 o K987P890" value="<?= $cota ?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" required="" placeholder="" type="text" class="input">
				<span>Cota</span>
			</label>

			<label>
				<input title="Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100" value="<?= $titulo?>" <?= ($titulo == '') ? $estilosError : '' ?> name="titulo" required="" placeholder="" type="text" class="input">
				<span>Titulo</span>
			</label>
			<label>
				<input title="Solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= $autor ?>" <?= ($autor == '') ? $estilosError : '' ?> name="autor" required="" placeholder="" type="text" class="input">
				<span>Autor</span>
			</label>
			<label>
				<input title="Solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= $tutor ?>" <?= ($tutor == '') ? $estilosError : '' ?> name="tutor" required="" placeholder="" type="text" class="input">
				<span>Tutor</span>
			</label>
			<label>
				<input title="Formato valido 2000-10-01 Año, mes, dia" value="<?= $fecha ?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" required="" placeholder="" type="text" class="input">
				<span>Año</span>
			</label>
			<label>
				<input title="Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100" value="<?= $carrera ?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" required="" placeholder="" type="text" class="input">
				<span>Carrera</span>
			</label>
			<label>
				<input title="Son campos opcionales y deben cumplir con: solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= ($linea_investigacion) ?? '' ?>" <?= ($linea_investigacion == '') ? $estilosError : '' ?> name="linea_investigacion" placeholder="" type="text" class="input">
				<span>Linea de investigacion</span>
			</label>
			<label>
				<input title="Son campos opcionales y deben cumplir con: solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= ($mencion) ?? '' ?>" <?= ($mencion == '') ? $estilosError : '' ?> name="mencion" placeholder="" type="text" class="input">
				<span>Mencion</span>
			</label>
			<label>
				<input title="Son campos opcionales y deben cumplir con: solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= ($metodologia) ?? '' ?>" <?= ($metodologia == '') ? $estilosError : '' ?> name="metodologia" placeholder="" type="text" class="input">
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
	  
	<div class="infoinput form">

	<script src="script.js"></script>
</body>

</html>