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
	<!-- <link rel="stylesheet" href="estilo/Regi_libro.css"> -->
	<link rel="stylesheet" href="estilo/Formulario.css">
	<title>Biblioteca</title>
</head>
<!--  body -->

<body>


	<?php
	$menuActive = 8;
	require ROOT_DIR . '/componentes/menuLateral.php';
	?>


	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="admin-inicio.php">Regresar</a>

		</nav>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;">REALIZAR PRESTAMO</h4>
		<main>
			<!-- FORMULARIO -->
			<form class="formulario" id="formulario" method="POST">

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Cédula *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $cedula ?>" <?= ($cedula == '') ? $estilosError : '' ?> name="cedula" required="" placeholder="Ejm 30414587" type="number">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $cedula == '') ? "style='display: block'" : '' ?>>Solo se aceptan números enteros en el rango de 100,000 a 99,999,999.</p>

				</div>

				<div class="formulario_grupo">
					<label for="usuario" class="formulario__label">Cota *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $cota ?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" required="" placeholder="Ejm P756K987" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $cota == '') ? "style='display: block'" : '' ?>>Letra y numeros, ejemplo: O987P789 o K987P890</p>
				</div>

				<div class="formulario_grupo formulario_grupo-btn-enviar">
					<button class="boton submit" type="button" id="open">enviar</button>
					<button id="enviar" hidden></button>

					<!-- <p class="formulario_mensaje-exito" id="formulario_mensaje-exito">Formulario enviado exitosamente!</p> -->
				</div>
			</form>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	<br><br>

	<?php
	require './componentes/modal-registro.php';
	?>

	<?php if ($mensajePer != "" || $mensajeDoc != ''): ?>
		<?php
		$md_error_titulo = "Error";
		$md_error_mensaje = $mensajePer . '<br/>' . $mensajeDoc;
		require ROOT_DIR . '/componentes/modal-error.php';
		?>
	<?php endif ?>



	<script src="script.js"></script>
</body>

</html>