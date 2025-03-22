<?php
	//proteccion de rutas
	session_start();

	if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
		header('location: ./index.php');
	};
	require_once './ruta.php';
    require_once ROOT_DIR . '/modelo/conexion.php';
    include ROOT_DIR . '/controlador/getInfo/pasantia.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/comunitario.css">
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
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			<a class="retorn" href="admin-inicio.php">Regresar</a>
			<?php if(isset($pasantias)){
				$url_buscar = './pasantia.php';
				require './componentes/buscador.php';
			}?>
		</nav>
		<br><br>
		<h4 style="font-size: 25PX; text-align: center; margin: 20px; font-weight: bolder; letter-spacing: 3px;">LISTADO DE TODOS LOS TRABAJOS DE PASANTíA</h4>
		<main>
			
            <div id="main-container">
				<?php if(isset($pasantias)): ?>
                <table class="busquedatabla">
                    <thead>
                        <tr>	
							<th>Cota</th>
                            <th>Titulo</th>
                            <th>Autor</th>
                            <th>Tutor</th>
                            <th>Tutor Comunitario</th>
                            <th>Fecha de presentación</th>
                            <th>Cantidad</th>
                            <th>Institución</th>
							<th>Acciones</th>
                        </tr>
                    </thead>
					<tbody>
                    <?php foreach($pasantias as $pasantia): ?>
                    <tr>
						<td><?= $pasantia["cota"]?></td>
                        <td><?= $pasantia["titulo"]?></td>
                        <td><?= $pasantia["autor"]?></td>
                        <td><?= $pasantia["tutor"]?></td>
                        <td><?= $pasantia["tutor_comunitario"]?></td>
                        <td><?= $pasantia["fecha_presentacion"]?></td>
                        <td><?= $pasantia["cantidad"]?></td>
                        <td><?= $pasantia["lugar"]?></td>
						<td>
							<a href="./modificar/pasantia.php?cota=<?= $pasantia["cota"] ?>" class="button">
								<span class="button__text">Modificar</span>
								<span class="button__icon"><svg xmlns="http://www.w3.org/2000/svg" width="24" viewBox="0 0 24 24" stroke-width="2" stroke-linejoin="round" stroke-linecap="round" stroke="currentColor" height="24" fill="none" class="svg"><line y2="19" y1="5" x2="12" x1="12"></line><line y2="12" y1="12" x2="19" x1="5"></line></svg></span>
							</a>
						</td>
                    </tr>
                    <?php endforeach?>
					</tbody>
                </table>
				<?php else: ?>
				<div>No hay informacion para mostrar</div>
				<?php endif?>
				<div id="noResults" style="display: none; margin: 40px 0; font-size: 30px;">
					No se encontraron resultados, Busqueda: <span id="noResultsSpan"></span>
				</div>

            </div>
        
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
	<script src="./script/busqueda.js" ></script>

</body>
</html>