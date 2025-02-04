<?php

require_once "../ruta.php";
// controlador importante pora modificar
require_once ROOT_DIR . '/controlador/modificar/libro.php';

?>
 

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<!-- <link rel="stylesheet" href="../estilo/Regi_libro.css"> -->
	<link rel="stylesheet" href="../estilo/Formulario.css">
	<title>Biblioteca</title>
</head>
<!--  body -->

<body>

   
	<!-- MENU -->
	<?php
		$menuActive = 1;
		$rutaImgMenu = '../';
		require ROOT_DIR . '/componentes/menuLateral2.php';
	?>
	<!-- MENU -->


 
	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(../imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="../funciones/eliminar_sesion_regresar.php?nombre=<?=$nombreSesion?>&ruta=<?= $ruta?>">Regresar</a>

		</nav>
		<br><br>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;" >MODIFICAR LIBRO</h4>
		<main>
			<!-- FORMULARIO -->
			<form class="formulario" id="formulario" method="POST">
				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Titulo *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" id="usuario" required value="<?= $titulo ?>" <?= ($titulo == '') ? $estilosError : '' ?> type="text" name="titulo" placeholder="">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $titulo == '') ? "style='display: block'" : '' ?>>Este campo acepta únicamente caracteres alfanuméricos, con una longitud mínima de 2 letras y una longitud máxima de 100 letras.</p>
				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Autor *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" id="usuario" value="<?= $autor ?>" <?= ($autor == '') ? $estilosError : '' ?> name="autor" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $autor == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Area de estudio *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" id="usuario" value="<?= $carrera ?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $carrera == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Año *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" id="usuario" value="<?= $fecha ?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" required="" placeholder="2000-10-01" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $fecha == '') ? "style='display: block'" : '' ?>>Se aceptan fechas en formato AAAA-MM-DD (Año, Mes, Día).</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Cota *</label>
					<div class="formulario__grupo-input">
						<input disabled class="formulario__input" id="usuario" value="<?= $cota ?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" title="" required="" placeholder="O987P789" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $cota == '') ? "style='display: block'" : '' ?>>Letra y numeros, ejemplo: O987P789 o K987P890</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Editorial *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" id="usuario" value="<?= $editorial ?>" <?= ($editorial == '') ? $estilosError : '' ?> name="editorial" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $editorial == '') ? "style='display: block'" : '' ?>>Este campo acepta exclusivamente caracteres alfanuméricos, con una longitud mínima de 4 y una longitud máxima de 100</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Ejemplar *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" id="usuario" value="<?= $cantidad ?>" <?= ($cantidad == '') ? $estilosError : '' ?> name="cantidad" required="" title=" solo admiten numeros, cantidad minima: 1 Maxima: 100" placeholder="50" type="number">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $cantidad == '') ? "style='display: block'" : '' ?>>Este campo acepta exclusivamente caracteres numéricos, con una cantidad mínima de 1 y una cantidad máxima de 1000.</p>

				</div>

				<br>

				<div class="formulario_grupo formulario_grupo-btn-enviar">
					<button class="boton submit" type="submit" >enviar</button>

					<!-- <p class="formulario_mensaje-exito" id="formulario_mensaje-exito">Formulario enviado exitosamente!</p> -->
				</div>
			</form>
		</main>

	</section>
	<!-- BARRA SUPERIOR -->
	
 



	<script src="../script.js"></script>
</body>

</html>