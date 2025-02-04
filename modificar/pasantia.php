<?php
	require_once '../ruta.php';
	//controlador importante
	require ROOT_DIR . '/controlador/modificar/pasantia.php';
?>






<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<!-- <link rel="stylesheet" href="../estilo/Regis_comu.css"> -->
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

			<a class="retorn" href="../funciones/eliminar_sesion_regresar.php?nombre=<?= $nombreSesion?>&ruta=<?= $ruta?>">Regresar</a>
		</nav>
		<br><br>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;" >MODIFICAR TRABAJO DE PASANTÍA</h4>
		<main>
			<!-- FORMULARIO -->
			<form class="formulario" id="formulario" method="POST">
				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Cota *</label>
					<div class="formulario__grupo-input">
						<input disabled class="formulario__input" value="<?= $cota ?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $cota == '') ? "style='display: block'" : '' ?>>Letra y numeros, ejemplo: O987P789 o K987P890</p>
				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Titulo *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $titulo ?>" <?= ($titulo == '') ? $estilosError : '' ?> name="titulo" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $titulo == '') ? "style='display: block'" : '' ?>>Este campo acepta exclusivamente caracteres alfanuméricos, con una longitud mínima de 4 y una longitud máxima de 100</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Autor *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $autor ?>" <?= ($autor == '') ? $estilosError : '' ?> name="autor" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $autor == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Tutor *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $tutor ?>" <?= ($tutor == '') ? $estilosError : '' ?> name="tutor" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $tutor == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>
				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Tutor institucional *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $tutor_comunitario ?>" <?= ($tutor_comunitario == '') ? $estilosError : '' ?> name="tutor_comunitario" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $tutor_comunitario == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Año *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $fecha ?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $fecha == '') ? "style='display: block'" : '' ?>>Se aceptan fechas en formato AAAA-MM-DD (Año, Mes, Día).</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Lugar / Institución *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $lugar ?>" <?= ($lugar == '') ? $estilosError : '' ?> name="lugar" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $lugar == '') ? "style='display: block'" : '' ?>>Este campo acepta exclusivamente caracteres alfanuméricos, con una longitud mínima de 4 y una longitud máxima de 100</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Carrera *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $carrera ?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" required="" placeholder="" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $carrera == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

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
					<button class="boton submit" type="sudmit">enviar</button>

					<!-- <p class="formulario_mensaje-exito" id="formulario_mensaje-exito">Formulario enviado exitosamente!</p> -->
				</div>
			</form>
		</main>

	</section>
	<!-- BARRA SUPERIOR -->
	

 



	<script src="../script.js"></script>
</body>

</html>