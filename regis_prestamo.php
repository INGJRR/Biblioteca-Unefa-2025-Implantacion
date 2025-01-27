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
	<link rel="stylesheet" href="estilo/Regi_libro.css">
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
	<li class="active">
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
			<p class="title">Prestamo</p><br>
			<label>
				<input value="<?= $cedula?>" <?= ($cedula == '') ? $estilosError : '' ?> name="cedula" required="" placeholder="" type="number" class="input">
				<span>Cedula</span>
			</label>

			<label>
				<input value="<?= $cota?>" <?= ($cota == '') ? $estilosError : '' ?>  name="cota" required="" placeholder="" type="text" class="input">
				<span>Cota</span>
			</label>
			<br>
			<button class="submit">Realizar prestamo</button>

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
	 
	<?php if($mensajeDoc != '' || $mensajePer != ''):?>
	<div class="infoinput form">
		<h4>Mensaje de alerta</h4>
		<div>
			<p><?php echo ($mensajeDoc != '') ? $mensajeDoc : '' ?></p>	
			<p><?php echo ($mensajePer != '') ? $mensajePer : '' ?></p>	
		</div>
	</div>
	<?php endif?>
	 
	<div class="infoinput form">
		<h4>Informacion acerca de los Campos</h4>
		<div>
			<p>Cedula: Estudiante o personal administrativo, debe de estar previamente registrado</p>
			<p>Cota: Documentos, debe de estar previamente registrado</p>
		</div>
	</div>



	<script src="script.js"></script>
</body>

</html>