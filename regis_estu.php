<?php
require_once './ruta.php';
require ROOT_DIR . '/modelo/conexion.php';
require_once ROOT_DIR . '/controlador/getInfo/carreras.php';
require_once ROOT_DIR . '/controlador/registrar/estudiante.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<!-- <link rel="stylesheet" href="estilo/Regi_estu.css"> -->
	<link rel="stylesheet" href="estilo/Formulario.css">
	<title>Biblioteca</title>
</head>
<!--  body -->

<body>


	<?php
	$menuActive = 2;
	require ROOT_DIR . '/componentes/menuLateral.php';

	?>



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu '></i>


			<a class="retorn" href="admin-inicio.php">Regresar</a>
		</nav>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;" >REGISTRAR ESTUDIANTE</h4>
		<main>
			<!-- FORMULARIO -->
			<form class="formulario" id="formulario" method="POST">


				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Cédula *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $cedula ?>" <?= ($cedula == '') ? $estilosError : '' ?> required placeholder="" name="cedula" type="text" required maxlength="8" onkeypress = "return ValidarNumeros(event)">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $cedula == '') ? "style='display: block'" : '' ?>>Solo se aceptan números enteros en el rango de 100,000 a 99,999,999.</p>
				</div>

				<div class="formulario_grupo">

					<label class="formulario__label">Nombre *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $nombre ?>" <?= ($nombre == '') ? $estilosError : '' ?> required placeholder="" name="nombre" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>
					<p class="formulario__input-error" <?php echo ($estilosError != '' && $nombre == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Apellido *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $apellido ?>" <?= ($apellido == '') ? $estilosError : '' ?> required placeholder="" name="apellido" type="text">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $apellido == '') ? "style='display: block'" : '' ?>>Este campo admite exclusivamente caracteres alfabéticos, con una longitud mínima de 3 y una longitud máxima de 100.</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Fecha de nacimiento *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $fecha_nacimiento ?>" <?= ($fecha_nacimiento == '2045-01-01') ? $estilosError : '' ?> required placeholder="" type="date" name="fecha_nacimiento">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $fecha_nacimiento == '') ? "style='display: block'" : '' ?>>Se aceptan fechas en formato DD-MM-AAAA (Día,Mes,Año).</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Dirección *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $direccion ?>" <?= ($direccion == '') ? $estilosError : '' ?> required placeholder="" name="direccion" type="text" class="input" maxlength="30">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $direccion == '') ? "style='display: block'" : '' ?>>Este campo acepta exclusivamente caracteres alfanuméricos, con una longitud mínima de 4 y una longitud máxima de 100</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Teléfono *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $telefono ?>" <?= ($telefono == '') ? $estilosError : '' ?> required placeholder="" name="telefono" type="text" maxlength="11" onkeypress = "return ValidarNumeros(event)">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $telefono == '') ? "style='display: block'" : '' ?>>Solo numeros Empieza por 04 y debe de tener 11 caracteres</p>

				</div>

				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Email *</label>
					<div class="formulario__grupo-input">
						<input class="formulario__input" value="<?= $email ?>" <?= ($email == '') ? $estilosError : '' ?> required placeholder="" name="email" type="email">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $email == '') ? "style='display: block'" : '' ?>>Debe tener la forma "usuario@dominio.extensión". El usuario puede contener: letras, números, guiones bajos (_) y puntos (.)</p>

				</div>
				<div class="formulario_grupo">

					<label for="usuario" class="formulario__label">Carrera *</label>
					<div class="formulario__grupo-input">
						<select <?= ($id_carrera == '') ? $estilosError : '' ?> name="carrera" class="formulario__input" id="">
							<?php if (empty($carrera)): ?>
								<?php foreach ($carreras as $carrera): ?>
									<option value="<?= $carrera["id"] ?>" <?php echo ($carrera["id"] == $id_carrera) ? "selected" : '' ?>>
										<?= $carrera["nombre"] ?>
									</option>
								<?php endforeach ?>
							<?php endif ?>
						</select>
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $carrera == '') ? "style='display: block'" : '' ?>></p>

				</div>

				<div class="formulario_grupo">
					<label for="usuario" class="formulario__label">Semestre *</label>
					<div class="formulario__grupo-input">
						<input value="<?= $semestre_actual ?>" <?= ($semestre_actual == '') ? $estilosError : '' ?> name="semestre" required="" placeholder="" type="number" min="1" class="formulario__input">
						<i class="formulario__validacion-estado fas fa-times-circle"></i>
					</div>

					<p class="formulario__input-error" <?php echo ($estilosError != '' && $semestre_actual == '') ? "style='display: block'" : '' ?>></p>
				</div>

				<br>


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

	<?php if (isset($mensaje) && $mensaje != ""): ?>
		<?php
		$md_error_titulo = "Error";
		$md_error_mensaje = $mensaje;
		require ROOT_DIR . '/componentes/modal-error.php';
		?>
	<?php endif ?>


	<script src="script.js"></script>
	<script src="/script/validarNumeros.js"></script>
</body>

</html>