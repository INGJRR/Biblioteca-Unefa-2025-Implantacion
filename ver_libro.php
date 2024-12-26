<?php 
    require_once './modelo/conexion.php';
    include_once './controlador/info_libro.php'
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
	<section id="sidebar">
		<div class="l">
			<span><div style="background-image: url(imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div></span>
		  <div><p class="pe">Biblioteca </p> <p class="p" >Luis Beltran Prieto Figueroa</p><br></div>
		
		</div>
		<ul class="side-menu top">
			

			<li >
				<a href="admin-inicio.php">
					<i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon' ></i>
					<span class="text">Inicio</span>
				</a>
			</li>

			<li >
				<a href="Registrar.php">
					<i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon' ></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li class="active">
				<a href="Documento.php">
					<i style="background-image: url(imagenes/libro.png);" class='bx bxs-doughnut-chart icon' ></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li>
				<a href="estudiantes.php">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon' ></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="unefaper.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon' ></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
		
			<li>
				<a href="index.php" class="logout">
					<i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon' ></i>
					<span class="text">Salir</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			<a class="retorn" href="Documento.php">Regresar</a>
			
		</nav>
		<br><br>
		<main>
			
            <div id="main-container">

                <table>
                    <thead>
                        <tr>
                            <th>Titulo</th>
							<th>Autor</th>
							<th>Año</th>
							<th>Cota</th>
							<th>Editorial</th>
							<th>Ejemplar</th>
							
                        </tr>
                    </thead>
                    <?php foreach( $libros as $libro): ?>
                    <tr>
                        <td><?= $libro["titulo"]?></td>
                        <td><?= $libro["autor"]?></td>
                        <td><?= $libro["fecha"]?></td>
                        <td><?= $libro["cota"]?></td>
                        <td><?= $libro["editorial"]?></td>
                        <td><?= $libro["cantidad"]?></td>
                    </tr>
                    <?php endforeach?>
                </table>
            </div>
        
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html>