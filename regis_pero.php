<?php
	require_once './ruta.php';
	require_once ROOT_DIR . '/controlador/registrar/personal_unefa.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/Regi_pero.css">
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
			<li class="active">
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
			<p class="title">Personal UNEFA</p><br><br><br>
			<label>
				<input title="Solo numeros desde el 100 Mil al 99 Millones" value="<?= $cedula ?>" <?= ($cedula == '') ? $estilosError : '' ?> required placeholder="" name="cedula" type="text" class="input">
				<span>Cedula</span>
			</label>

			<label>
				<input title="Solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= $nombre ?>" <?= ($nombre == '') ? $estilosError : '' ?> required placeholder="" name="nombre" type="text" class="input">
				<span>Nombre</span>
			</label>
			<label>
				<input title="Solo letras, numeros de letras: minimo: 3 , Max: 100" value="<?= $apellido ?>" <?= ($apellido == '') ? $estilosError : '' ?>  required placeholder="" name="apellido"  type="text" class="input">
				<span>Apellido</span>
			</label>
			<label>
				<input title="Formato valido 01-12-2005 dia, mes, año" value="<?= $fecha_nacimiento ?>" <?= ($fecha_nacimiento == '2045-01-01') ? $estilosError : '' ?>  required placeholder="" type="date" name="fecha_nacimiento" class="input">
				<span>Fecha de nacimiento</span>
			</label>
			<label>
				<input title="Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100" value="<?= $direccion ?>" <?= ($direccion == '') ? $estilosError : '' ?> required placeholder="" name="direccion" type="text" class="input">
				<span>Direccion</span>
			</label>
			<label>
				<input title="Solo numeros Empieza por 04 y debe de tener 11 caracteres" value="<?= $telefono ?>" <?= ($telefono == '') ? $estilosError : '' ?>  required placeholder="" name="telefono" type="text" class="input">
				<span>Telefono</span>
			</label>
			<label>
				<input title="Debe tener la forma usuario@dominio.extensión. El usuario puede contener: letras, números, guiones bajos (_) y puntos (.)" value="<?= $email ?>" <?= ($email == '') ? $estilosError : ''?>   required placeholder="" name="email" type="email" class="input">
				<span>Email</span>
			</label>
			<label>
				<select value="<?= $categoria ?>" <?= ($categoria == '') ? $estilosError : '' ?> class="input" name="categoria" required id="">
					<option value="1">Profesor</option>
					<option value="2">Administrativo</option>
				</select>
				<span>Categoria</span>
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
	<!-- <div class="infoinput form">
		<h4>Informacion acerca de los campos</h4>
		<div>
			<p>cedula: Solo numeros desde el 100 Mil al 99 Millones</p>
			<p>Nombre y Apellido: Solo letras, numeros de letras: minimo: 3 , Max: 100</p>
			<p>Fecha Nacimiento: Formato valido 01-12-2005 dia, mes, año</p>
			<P>Direccion: Solo admiten numeros y letras, numero de letras: minimo: 2, Maximo: 100</P>
			<p>Telefono: Solo numeros Empieza por 04 y debe de tener 11 caracteres</p>
			<p>Email: Debe tener la forma "usuario@dominio.extensión". El usuario puede contener: letras, números, guiones bajos (_) y puntos (.)</p>
		</div>
	</div> -->

 


	<script src="script.js"></script>
</body>

</html>