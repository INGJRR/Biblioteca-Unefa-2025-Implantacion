<?php
//proteccion de rutas
session_start();

if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
	header('location: ./index.php');
};

require_once './ruta.php';
require  ROOT_DIR . '/modelo/conexion.php';
require ROOT_DIR . '/controlador/getInfo/profesor.php';

require ROOT_DIR . '/modelo/conexion.php';
require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';
?>


<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/docente.css">
	<link rel="stylesheet" href="estilo/estilosNew.css">
	<title>Biblioteca</title>
</head>
<!--  body -->

<body>

	<!-- MENU -->
	<?php
		$menuActive = 1;
		require ROOT_DIR . '/componentes/menuLateral.php';
	?>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu '></i>

			<a class="retorn" href="admin-inicio.php">Regresar</a>
			<?php if(isset($profesores)){
				$url_buscar = './docente.php';
				require './componentes/buscador.php';
				} 
			?>
		</nav>
		<br><br>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;">LISTADO DEL PERSONAL DOCENTE</h4>
		<main>
			<?php if (empty($profesores)): ?>
				<div>No hay información para mostrar</div>
			<?php else: ?>
				<div id="main-container">
					<table class="busquedatabla">
						<thead>
							<tr>
								<th>Cédula</th>
								<th>Nombre</th>
								<th>Estado</th>
								<th>Moroso</th>
								<th>Prestamos activos</th>
								<th>Acciones</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($profesores as $profesor): ?>
							<tr>
								<td><?= $profesor["cedula"] ?></td>
								<td><?= $profesor["nombre"] ?></td>
								<td><?php echo ($profesor["estado"] == 0) ? 'Inactivo' : 'Activo' ?></td>
								<td><?php echo ($profesor["moroso"] == 0) ? 'No' : 'Si' ?></td>
								<td>
									<?php 
										$cedula_actual = $profesor['cedula'];
										$sql = "SELECT COUNT(*) AS cantidad
										FROM prestamos
										WHERE cedula_persona = '$cedula_actual' AND estado = 'Prestado'";
										echo obtener_cantidad_base_dato($sql, $conexion);
									?>
								</td>
								<td>
									<a href="./modificar/personalUnefa.php?cedula=<?= $profesor["cedula"] ?>&tipo=1" class="button">
										<span class="button__text">Modificar</span>
										<span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
									</a>
								</td>
							</tr>
						<?php endforeach ?>
						<?php $conexion->close(); ?>
						</tbody>
					</table>
					<div id="noResults" style="display: none; margin: 40px 0; font-size: 30px;">
						No se encontraron resultados, Busqueda: <span id="noResultsSpan"></span>
					</div>
				</div>
			<?php endif ?>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->

	<script src="script.js"></script>
	<script src="./script/busqueda.js" ></script>

</body>

</html>