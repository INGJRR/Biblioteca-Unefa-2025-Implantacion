<?php
	require_once '../ruta.php';
	//controlador importante
	require_once ROOT_DIR . '/controlador/modificar/personalUnefa.php';

?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="../estilo/Regi_pero.css">
	<title>Biblioteca</title>
</head>
<!--  body -->

<body>


	<!-- MENU -->
	<section id="sidebar">

		<div class="l">
			<span>
				<div style="background-image: url(../imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div>
			</span>
			<div>
				<p class="pe">Biblioteca </p>
				<p class="p">Luis Beltran Prieto Figueroa</p><br>
			</div>

		</div>


		<ul class="side-menu top">


			<li>
				<a href="../admin-inicio.php">
					<i style="background-image: url(../imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Inicio</span>
				</a>
			</li>

			<li>
				<a href="../Registrar.php">
					<i style="background-image: url(../imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li>
				<a href="../Documento.php">
					<i style="background-image: url(../imagenes/libro.png);" class='bx bxs-doughnut-chart icon'></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li>
				<a href="../estudiantes.php">
					<i style="background-image: url(../imagenes/graduado.png);" class='bx bxs-message-dots icon'></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li class="active">
				<a href="../unefaper.php">
					<i style="background-image: url(../imagenes/social.png);" class='bx bxs-group icon'></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">

			<li>
				<a href="../controlador/cerrar_sesion.php" class="logout">
					<i style="background-image: url(../imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon'></i>
					<span class="text">Salir</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(../imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="../funciones/eliminar_sesion_regresar.php?nombre=<?=$nombreSesion?>&ruta=<?= $ruta?>">Regresar</a>
		</nav>


	</section>
	<!-- BARRA SUPERIOR -->
	<br><br>
	<main>

		<br>
		<form class="form" method="POST">
			<p class="title">Modificar Personal UNEFA</p><br><br><br>
			<label>
				<input value="<?= $cedula ?>" <?= ($cedula == '') ? $estilosError : '' ?> required placeholder="" name="cedula" type="text" class="input">
				<span>Cedula</span>
			</label>

			<label>
				<input value="<?= $nombre ?>" <?= ($nombre == '') ? $estilosError : '' ?> required placeholder="" name="nombre" type="text" class="input">
				<span>Nombre</span>
			</label>
			<label>
				<input value="<?= $apellido ?>" <?= ($apellido == '') ? $estilosError : '' ?>  required placeholder="" name="apellido"  type="text" class="input">
				<span>Apellido</span>
			</label>
			<label>
				<input value="<?= $fecha_nacimiento ?>" <?= ($fecha_nacimiento == '2045-01-01') ? $estilosError : '' ?>  required placeholder="" type="date" name="fecha_nacimiento" class="input">
				<span>Fecha de nacimiento</span>
			</label>
			<label>
				<input value="<?= $direccion ?>" <?= ($direccion == '') ? $estilosError : '' ?> required placeholder="" name="direccion" type="text" class="input">
				<span>Direccion</span>
			</label>
			<label>
				<input value="<?= $telefono ?>" <?= ($telefono == '') ? $estilosError : '' ?>  required placeholder="" name="telefono" type="text" class="input">
				<span>Telefono</span>
			</label>
			<label>
				<input value="<?= $email ?>" <?= ($email == '') ? $estilosError : ''?>   required placeholder="" name="email" type="email" class="input">
				<span>Email</span>
			</label>
			<label>
				<select value="<?= $categoria ?>" <?= ($categoria == '') ? $estilosError : '' ?> class="input" name="categoria" required id="">
					<option value="1">Profesor</option>
					<option value="2">Obrero</option>
				</select>
				<span>Categoria</span>
			</label>
			<br>
			<button class="submit">Modificar</button>
		</form>
	</main>




	<script src="script.js"></script>
</body>

</html>