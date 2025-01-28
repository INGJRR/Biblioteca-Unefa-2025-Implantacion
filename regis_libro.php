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
	<!-- <link rel="stylesheet" href="estilo/Regi_libro.css"> -->
	<link rel="stylesheet" href="estilo/Formulario.css">
	
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
     <!-- FORMULARIO -->
		<form class="formulario" id="formulario" method="POST">
			
			
			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Titulo</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" required value="<?= $titulo?>" <?= ($titulo == '') ? $estilosError : '' ?> type="text" name="titulo" >
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error" <?php echo ($estilosError != '' && $titulo == '') ? "style='display: block'" : '' ?> >Solo admiten numeros y letras.</p>
			</div>

			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Autor</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" value="<?= $autor?>" <?= ($autor == '') ? $estilosError : '' ?>  name="autor" required="" placeholder="" type="text">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error" <?php echo ($estilosError != '' && $autor == '') ? "style='display: block'" : '' ?> >Solo letras, numeros de letras: minimo: 3 , Max: 100</p>

			</div>

			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Area de estudio</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" value="<?= $carrera?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" placeholder="" type="text">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>

				<p class="formulario__input-error" <?php echo ($estilosError != '' && $carrera == '') ? "style='display: block'" : '' ?> >Solo letras.</p>

			</div>

			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Año</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" value="<?= $fecha?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha"  required="" placeholder="2000-10-01" type="text">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				
				<p class="formulario__input-error" <?php echo ($estilosError != '' && $fecha == '') ? "style='display: block'" : '' ?> >Formato valido 2000-10-01 Año, mes, dia</p>

			</div>

			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Cota</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" value="<?= $cota?>" <?= ($cota == '') ? $estilosError : '' ?>  name="cota" title=""  required="" placeholder="O987P789" type="text">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				
				<p class="formulario__input-error" <?php echo ($estilosError != '' && $cota == '') ? "style='display: block'" : '' ?> >Letra y numeros, ejemplo: O987P789 o K987P890</p>

			</div>

			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Editorial</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" value="<?= $editorial?>" <?= ($editorial == '') ? $estilosError : '' ?> name="editorial" required=""  placeholder="" type="text">
					<i class="formulario__validacion-estado fas fa-times-circle" ></i>
				</div>
				
				<p class="formulario__input-error" <?php echo ($estilosError != '' && $editorial == '') ? "style='display: block'" : '' ?> >Solo admiten numeros y letras numero de letras: minimo: 4, Maximo: 100</p>

			</div>

			<div class="formulario_grupo">

				<label for="usuario" class="formulario__label">Ejemplar</label>
				<div class="formulario__grupo-input">
					<input class="formulario__input" id="usuario" value="<?= $cantidad?>" <?= ($cantidad == '') ? $estilosError : '' ?>  name="cantidad" required="" title=" solo admiten numeros, cantidad minima: 1 Maxima: 100"  placeholder="50" type="number">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				
				<p class="formulario__input-error" <?php echo ($estilosError != '' && $cantidad == '') ? "style='display: block'" : '' ?> >Solo numeros</p>

			</div>

			<br>

			<div class="formulario_grupo formulario_grupo-btn-enviar">
				<button class="boton submit" type="button" id="open">enviar</button>
				<button id="enviar" hidden ></button>
				
				<!-- <p class="formulario_mensaje-exito" id="formulario_mensaje-exito">Formulario enviado exitosamente!</p> -->
			</div>
		</form>
	</main>

	<?php 
		require './componentes/modal-registro.php'

	
	
	
	?>

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