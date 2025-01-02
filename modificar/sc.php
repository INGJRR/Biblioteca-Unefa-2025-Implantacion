<?php
	require_once '../ruta.php';
	require ROOT_DIR . '/modelo/conexion.php';
	require ROOT_DIR . '/controlador/modificar/sc.php';
	require ROOT_DIR . '/funciones/info_idv_db.php';
	//sirve para cuando regresemos
	$nombreSesion = "modificarSc";
	$ruta = '../comunitario.php';
 
	$cota = '';
	$titulo = '';
	$autor = '';
	$fecha = '';
	$tutor = '';
	$tutor_comunitario = '';
	$lugar = '';
	$estilosError = '';
	
	if(isset($_SESSION["modificarSc"])){
		//si existe quiere decir que ya cargamos los datos de la cota
		$estilosError = "style=\"border: 2px solid red;\"";
		$cota = $_SESSION["modificarSc"]->cota ?? '';
		$titulo = $_SESSION['modificarSc']->titulo ?? '';
		$autor = $_SESSION['modificarSc']->autor ?? '';
		$fecha = $_SESSION['modificarSc']->fecha ?? '';
		$tutor = $_SESSION['modificarSc']->tutor ?? '';
		$tutor_comunitario = $_SESSION['modificarSc']->tutor_comunitario ?? '';
		$lugar = $_SESSION['modificarSc']->lugar ?? '';
	}else{
		// no hemos cargado los datos de la cota, entonces lo cargaremos
		if (isset($_GET['cota'])) {
			$cota = $_GET['cota'];
			require ROOT_DIR . '/modelo/conexion.php';
			$sql = "SELECT 
			*
			FROM servicio_comunitario WHERE cota = '$cota'";
			$sv = info_idv_db($sql, $conexion);
			$conexion->close();
	
			//comprobamos si libro tiene un valor 
			if($sv != ''){	
				// Guardamos todos los datos en variables
				$cota = $sv["cota"];
				$titulo = $sv["titulo"];
				$autor = $sv["autor"];
				$fecha = substr($sv["fecha_presentacion"], 0, 4);
				$tutor = $sv["tutor"];
				$tutor_comunitario = $sv["tutor_comunitario"];
				$lugar = $sv["lugar"];
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
	<link rel="stylesheet" href="../estilo/Regis_comu.css">
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
			<li class="active">
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
			<li>
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

			<a class="retorn" href="../funciones/eliminar_sesion_regresar.php?nombre=<?= $nombreSesion?>&ruta=<?= $ruta?>">Regresar</a>
		</nav>


	</section>
	<!-- BARRA SUPERIOR -->
	<br><br>
	<main>

		<br>
		<form class="form" method="POST" >
			<p class="title">Modificar Servicio Comunitario</p><br><br><br>



			<label>
				<input value="<?= $cota?>" <?= ($cota == '') ? $estilosError : '' ?> name="cota" required="" placeholder="" type="text" class="input">
				<span>Cota</span>
			</label>

			<label>
				<input value="<?= $titulo?>" <?= ($titulo == '') ? $estilosError : '' ?> name="titulo" required="" placeholder="" type="text" class="input">
				<span>Titulo</span>
			</label>
			<label>
				<input value="<?= $autor?>" <?= ($autor == '') ? $estilosError : '' ?> name="autor" required="" placeholder="" type="text" class="input">
				<span>Autor</span>
			</label>
			<label>
				<input value="<?= $tutor?>" <?= ($tutor == '') ? $estilosError : '' ?> name="tutor" required="" placeholder="" type="" class="input">
				<span>Tutor</span>
			</label>
			<label>
				<input value="<?= $tutor_comunitario ?>" <?= ($tutor_comunitario == '') ? $estilosError : '' ?> name="tutor_comunitario" required="" placeholder="" type="" class="input">
				<span>Tutor comunitario</span>
			</label>
			<label>
				<input value="<?= $fecha ?>" <?= ($fecha == '') ? $estilosError : '' ?> name="fecha" required="" placeholder="" type="text" class="input">
				<span>Año</span>
			</label>
			<label>
				<input value="<?= $lugar?>" <?= ($lugar == '') ? $estilosError : '' ?> name="lugar" required="" placeholder="" type="tel" class="input">
				<span>Lugar</span>
			</label>
			<br>
			<button class="submit">Modificar</button>

		</form>

	</main>




	<script src="script.js"></script>
</body>

</html>