<?php 
	//proteccion de rutas
	session_start();

	if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
		header('location: ./index.php');
	};
	
	require_once './ruta.php';
	require ROOT_DIR . '/modelo/conexion.php';
	$carrera = 'Ingeniería Civil';
	require ROOT_DIR . '/controlador/getInfo/estudiante.php';
	
	require ROOT_DIR . '/modelo/conexion.php';
	require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="./estilo/civil.css">
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

			<li class="active">
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
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			<a class="retorn" href="admin-inicio.php">Regresar</a>
			<?php if(isset($estudiantes)){
				$url_buscar = './civil.php';
				require './componentes/buscador.php';
				} 
			?>
			
		</nav>
		<br><br>
		<main>
			<?php if(empty($estudiantes)): ?>
				<div>No hay información para mostrar</div>
			<?php else: ?>
            <div id="main-container">
			<table class="busquedatabla">
					<h4>Lista de estudiante, Carrera Ing Civil</h4>
                    <thead>
                        <tr>
                            <th>Cedula</th>
							<th>Nombre</th>
							<th>Estado</th>
							<th>Moroso</th>
							<th>Prestamos Activo</th>
							<th>Acciones</th>
                        </tr>
                    </thead>
					<tbody>
					<?php foreach($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?= $estudiante["cedula"] ?></td>
                        <td><?= $estudiante["nombre"] ?></td>
                        <td><?php echo ($estudiante["estado"] == 0) ? 'Inactivo' : 'Activo' ?></td>
                        <td><?php echo ($estudiante["moroso"] == 0) ? 'No' : 'Si' ?></td>
						<td>
							<?php 
								$cedula_actual = $estudiante['cedula'];
								$sql = "SELECT COUNT(*) AS cantidad
								FROM prestamos
								WHERE cedula_persona = '$cedula_actual' AND estado = 'Prestado'";
								echo obtener_cantidad_base_dato($sql, $conexion);
							?>
						</td>
						<td>
							<a href="./modificar/estudiante.php?cedula=<?= $estudiante["cedula"] ?>" >Modificar</a>
						</td>
                    </tr>
					<?php endforeach?>
					<?php $conexion->close()?>
					</tbody>
                </table>
				<div id="noResults" style="display: none; margin: 40px 0; font-size: 30px;">
					No se encontraron resultados, Busqueda: <span id="noResultsSpan"></span>
				</div>
            </div>
			<?php endif?>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="./script.js"></script>
	<script src="./script/busqueda.js" ></script>
</body>
</html> 