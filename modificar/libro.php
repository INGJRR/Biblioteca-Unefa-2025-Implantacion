<?php

require_once "../ruta.php";
require_once ROOT_DIR . '/funciones/info_uno_libro.php';
require ROOT_DIR . '/modelo/conexion.php';
require_once ROOT_DIR . '/controlador/modificar/libro.php';

//sirve para cuando regresemos
$nombreSesion = "modificarLibro";
$ruta = '../ver_libro.php';

$libro = '';

$cota = '';
$titulo = '';
$autor = '';
$fecha = '';
$carrera = '';
$cantidad = '';
$editorial = '';
$estilosError = '';

if(isset($_SESSION["modificarLibro"])){
	//si existe quiere decir que ya cargamos los datos de la cota
	$estilosError = "style=\"border: 2px solid red;\"";
	$cota = $_SESSION["modificarLibro"]->cota ?? '';
	$titulo = $_SESSION['modificarLibro']->titulo ?? '';
	$autor = $_SESSION['modificarLibro']->autor ?? '';
	$fecha = $_SESSION['modificarLibro']->fecha ?? '';
	$carrera = $_SESSION['modificarLibro']->carrera ?? '';
	$cantidad = $_SESSION['modificarLibro']->cantidad ?? '';
	$editorial = $_SESSION['modificarLibro']->editorial ?? '';
}else{
	// no hemos cargado los datos de la cota, entonces lo cargaremos
	if (isset($_GET['cota'])) {
		$cota = $_GET['cota'];
		require ROOT_DIR . '/modelo/conexion.php';
		$libro = info_uno_libro($cota, $conexion);
		$conexion->close();

		//comprobamos si libro tiene un valor 
		if($libro != ''){	
			// Guardamos todos los datos en variables
			$cota = $libro["cota"];
			$titulo = $libro["titulo"];
			$autor = $libro["autor"];
			$fecha = substr($libro["fecha"] , 0, 4);
			$carrera = $libro["carrera"];
			$cantidad = $libro["cantidad"];
			$editorial = $libro["editorial"];
		}else{
			//la consulta fallo
		}
	} else {
		// echo "No se ha ingresado una cota.";
	}
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="../estilo/Regi_libro.css">
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
				<a href="admin-inicio.php">
					<i style="background-image: url(../imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Inicio</span>
				</a>
			</li>

			<li>
				<a href="Registrar.php">
					<i style="background-image: url(../imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li class="active">
				<a href="Documento.php">
					<i style="background-image: url(../imagenes/libro.png);" class='bx bxs-doughnut-chart icon'></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li>
				<a href="estudiantes.php">
					<i style="background-image: url(../imagenes/graduado.png);" class='bx bxs-message-dots icon'></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="unefaper.php">
					<i style="background-image: url(../imagenes/social.png);" class='bx bxs-group icon'></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">

			<li>
				<a href="index.php" class="logout">
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
			<p class="title">Modificando libro</p><br>
			<label>
				<input value="<?= $titulo?>" <?= ($titulo == '') ? $estilosError : '' ?> name="titulo" required="" placeholder="" type="text" class="input">
				<span>Titulo</span>
			</label>

			<label>
				<input value="<?= $autor?>" <?= ($autor == '') ? $estilosError : '' ?>  name="autor" required="" placeholder="" type="text" class="input">
				<span>Autor</span>
			</label>
			<label>
				<input value="<?= $carrera?>" <?= ($carrera == '') ? $estilosError : '' ?> name="carrera" placeholder="" type="text" class="input">
				<span>Area de estudio</span>
			</label>
			<label>
				<input value="<?= $fecha?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" required="" placeholder="" type="text" class="input">
				<span>Año</span>
			</label>
			<label>
				<input value="<?= $cota?>" <?= ($cota == '') ? $estilosError : '' ?>  name="cota" required="" placeholder="" type="text" class="input">
				<span>Cota</span>
			</label>
			<label>
				<input value="<?= $editorial?>" <?= ($editorial == '') ? $estilosError : '' ?> name="editorial" required="" placeholder="" type="text" class="input">
				<span>Editorial</span>
			</label>
			<label>
				<input value="<?= $cantidad?>" <?= ($cantidad == '') ? $estilosError : '' ?>  name="cantidad" required="" placeholder="" type="number" class="input">
				<span>Ejemplar</span>
			</label>
			<br>
			<button class="submit">Actualizar</button>

		</form>

	</main>




	<script src="../script.js"></script>
</body>

</html>