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
			<li>
				<a href="regis_grado.php">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon'></i>
					<span class="text">Registrar Trabajo de <br> investigacion  </span>
				</a>
			</li><br>
			<li class="active">
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
		<h4>Informacion acerca de los campos</h4>
		<div>
			<p>cedula: Solo numeros desde el 100 Mil al 99 Millones</p>
			<p>Nombre y Apellido: Solo letras, numeros de letras: minimo: 3 , Max: 100</p>
			<p>Fecha Nacimiento: Formato valido 2000-10-01 Año, mes, dia</p>
			<P>Direccion: Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100</P>
			<p>Telefono: Solo numeros Empieza por 04 y debe de tener 11 caracteres</p>
			<p>Email: Debe tener la forma "usuario@dominio.extensión". El usuario puede contener: letras, números, guiones bajos (_) y puntos (.)</p>
		</div>
	</div>
 
	<script src="script.js"></script>
</body>

</html>