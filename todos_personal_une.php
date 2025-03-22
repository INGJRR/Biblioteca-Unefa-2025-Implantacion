<?php
	//proteccion de rutas
	session_start();

	if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
		header('location: ./index.php');
	};
	
	require_once './ruta.php';
	require  ROOT_DIR . '/modelo/conexion.php';
	require ROOT_DIR . '/controlador/getInfo/personal_une.php';

	require ROOT_DIR . '/modelo/conexion.php';
	require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/obrero.css">
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
			<?php if(isset($personal_une)){
				$url_buscar = './todos_personal_une.php';
				require './componentes/buscador.php';
				} 
			?>
		</nav>
		<br><br>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;">LISTADO DEL PERSONAL UNEFA</h4>
		<main>
			<?php if (empty($personal_une)): ?>
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
								<th>Tipo personal</th>
							</tr>
						</thead>
						<tbody>
						<?php foreach ($personal_une as $persona): ?>
							<tr>
								<td><?= $persona["cedula"] ?></td>
								<td><?= $persona["nombre"] ?></td>
								<td><?php echo ($persona["estado"] == 0) ? 'Inactivo' : 'Activo' ?></td>
								<td><?php echo ($persona["moroso"] == 0) ? 'No' : 'Si' ?></td>
								<td>
								<?php 
									$cedula_actual = $persona['cedula'];
									$sql = "SELECT COUNT(*) AS cantidad
									FROM prestamos
									WHERE cedula_persona = '$cedula_actual' AND estado = 'Prestado'";
									$ActivoNum = obtener_cantidad_base_dato($sql, $conexion);
									if($ActivoNum > 0){
										require_once ROOT_DIR . '/funciones/convertirMoroso.php';
										require_once ROOT_DIR . '/funciones/verificarFecha.php';
										require ROOT_DIR . '/modelo/conexion.php';
										Moroso($cedula_actual, ($persona['tipo'] == 'Profesor') ? 2 : 3, $conexion);
									}else{
										require_once ROOT_DIR . '/funciones/convertirMoroso.php';
										quitarMoroso($cedula_actual, ($persona['tipo'] == 'Profesor') ? 2 : 3, $conexion);
									}
									echo $ActivoNum;
								?>
								</td>
								<td><?= $persona["tipo"] ?></td>

							</tr>
						<?php endforeach ?>
						<?php $conexion->close()?>
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