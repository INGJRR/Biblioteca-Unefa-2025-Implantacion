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
	<link rel="stylesheet" href="estilo/Regi_estu.css">
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
		<form class="form" method="POST">
			<p class="title">Estudiante</p><br><br><br>
			
			<label>
				<input value="<?= $cedula ?>" <?= ($cedula == '') ? $estilosError : '' ?> name="cedula" required="" placeholder="" type="text" class="input">
				<span>Cedula</span>
			</label>

			<label>
				<input value="<?= $nombre ?>" <?= ($nombre == '') ? $estilosError : '' ?> name="nombre" required="" placeholder="" type="text" class="input">
				<span>Nombre</span>
			</label>
			<label>
				<input value="<?= $apellido ?>" <?= ($apellido == '') ? $estilosError : '' ?> name="apellido" required="" placeholder="" type="text" class="input">
				<span>Apellido</span>
			</label>
			<label>
				<input value="<?= $fecha_nacimiento ?>" <?= ($fecha_nacimiento == '2045-01-01') ? $estilosError : '' ?> name="fecha_nacimiento" required="" placeholder="" type="date" class="input">
				<span>Fecha de nacimiento</span>
			</label>
			<label>
				<input value="<?= $direccion ?>" <?= ($direccion == '') ? $estilosError : '' ?> name="direccion" required="" placeholder="" type="text" class="input">
				<span>Direccion</span>
			</label>
			<label>
				<input value="<?= $telefono ?>" <?= ($telefono == '') ? $estilosError : '' ?> name="telefono" required="" placeholder="" type="tel" class="input">
				<span>Telefono</span>
			</label>
			<label>
				<input value="<?= $email ?>" <?= ($email == '') ? $estilosError : '' ?> name="email" required="" placeholder="" type="email" class="input">
				<span>Email</span>
			</label>
			<label>
				<select <?= ($id_carrera == '') ? $estilosError : '' ?> name="carrera" class="input" id="">
					<?php if (empty($carrera)): ?>
						<?php foreach ($carreras as $carrera): ?>
							<option value="<?= $carrera["id"]?>" <?php echo ($carrera["id"] == $id_carrera) ? "selected" : '' ?> >
								<?= $carrera["nombre"] ?>
							</option>
						<?php endforeach ?>
					<?php endif ?>
				</select>
				<span>Carrera</span>
			</label>
			<label>
				<input value="<?= $semestre_actual ?>" <?= ($semestre_actual == '') ? $estilosError : '' ?> name="semestre" required="" placeholder="" type="number" class="input">
				<span>Semestre</span>
			</label>
			<br>
			<button class="submit">Registrar</button>

		</form>

	</main>




	<script src="script.js"></script>
</body>

</html>