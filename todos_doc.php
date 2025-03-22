<?php
	//proteccion de rutas
	session_start();

	if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
		header('location: ./index.php');
	};
	 
	require_once './ruta.php';
    require_once ROOT_DIR . '/modelo/conexion.php';
    include_once ROOT_DIR . '/controlador/getInfo/docs.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/ver.css">
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
			<?php if(isset($docs)){
				$url_buscar = './todos_doc.php';
				require './componentes/buscador.php';
				}
			?>
		</nav>
		<br><br>
		<main>
			
            <div id="main-container">
				<?php if(isset($docs)):?>
                <table class="busquedatabla">
                    <thead>
                        <tr>
							<th>Cota</th>
                            <th>Titulo</th>
							<th>Autor</th>
							<th>Ejemplares</th>
							<th>Tipo de documento</th>
                        </tr>
                    </thead>
					<tbody>
                    <?php foreach( $docs as $doc): ?>
                    <tr>
						<td><?= $doc["cota"]?></td>
                        <td><?= $doc["titulo"]?></td>
                        <td><?= $doc["autor"]?></td>
                        <td><?= $doc["cantidad"]?></td>
                        <td><?= $doc["tipo"]?></td>
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