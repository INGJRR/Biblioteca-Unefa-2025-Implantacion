<?php
	//proteccion de rutas
	session_start();

	if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
		header('location: ./index.php');
	};




?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/estudiantes.css">
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
			
			
			
		</nav>
		
		<main>
			<br><br>
			<div class="contenedor">

            <a href="Sistemas.php"> <div style="background-image: url(imagenes/informatica.png);" class="box">
				

				<div class="ima">
					<h5>Ing</h5><br><h2>Ing Sistemas</h2>
				</div>
				<div style="background-image: url(imagenes/sistemas.png);" class="boci"></div>
			  </div></a> 


			  <a href="civil.php"><div style="background-image: url(imagenes/excavador.png);" class="box ci">
					<div class="ima vil">
					<h5>Ing</h5><br><h2>civil</h2>
				</div>
				<div style="background-image: url(imagenes/civil.png);" class="boci"></div>
			  </div></a>



		<a href="enfermeria.php"><div style="background-image: url(imagenes/caduceo.png);" class="box en">
	
				<div class="ima fer">
					<h5>TSU</h5><br><h2>Enfermeria</h2>
				</div>
				<div style="background-image: url(imagenes/enfermeria.png);" class="boci"></div>
			  </div></a>	  
    
			<a href="turismo.php"><div style="background-image: url(imagenes/turismo\ \(1\).png);" class="box tu">
				<div class="ima ris">
					<h5>Lic</h5><br><h2>Turismo</h2>
				</div>
				<div style="background-image: url(imagenes/turismo\ \(2\).png);" class="boci b"></div>
			  </div></a>  


			 <a href="adminis.php"><div style="background-image: url(imagenes/admin\ \(2\).png);" class="box ad">
				<div class="ima mon">
					<h5>Lic</h5><br><h2>Admon</h2>
				</div>
				<div style="background-image: url(imagenes/admin.png);" class="boci b"></div>
			  </div></a> 

			 <a href="ads.php"><div style="background-image: url(imagenes/ads\ \(2\).png);" class="box ads">
				<div class="ima asd">
					<h5>TSU</h5><br><h2>ADS</h2>
				</div>
				<div style="background-image: url(imagenes/ads.png);" class="boci b"></div>
			  </div></a> 


            </div>
			<br><br>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html>