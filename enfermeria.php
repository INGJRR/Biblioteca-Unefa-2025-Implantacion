<?php 
	require './modelo/conexion.php';
	$carrera = 'Tsu en Enfermeria';
	require './controlador/info_estudiante.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="./estilo/enfermeria.css">
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
			<li >
				<a href="Documento.php">
					<i style="background-image: url(imagenes/libro.png);" class='bx bxs-doughnut-chart icon' ></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li class="active">
				<a href="estudiantes.php">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon' ></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="persounefa.php">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon' ></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
		
			<li>
				<a href="./controlador/cerrar_sesion.php" class="logout">
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
			
			<a class="retorn" href="estudiantes.php">Regresar</a>
			
		</nav>
		<br><br>
		<main>
			<?php if(empty($estudiantes)): ?>
				<div>No hay datos para mostrar</div>
			<?php else: ?>
            <div id="main-container">
			<table>
                    <thead>
                        <tr>
                            <th>Cedula</th>
							<th>Nombre</th>
							<th>Apellido</th>
							<th>Telefono</th>
							<th>Estado</th>
							<th>Moroso</th>
                        </tr>
                    </thead>
					<?php foreach($estudiantes as $estudiante): ?>
                    <tr>
                        <td><?= $estudiante["cedula"] ?></td>
                        <td><?= $estudiante["nombre"] ?></td>
                        <td><?= $estudiante["apellido"] ?></td>
                        <td><?= $estudiante["telefono"] ?></td>
                        <td><?php echo ($estudiante["estado"] == 0) ? 'Inactivo' : 'Activo' ?></td>
                        <td><?php echo ($estudiante["moroso"] == 0) ? 'No' : 'Si' ?></td>
                    </tr>
					<?php endforeach?>
                </table>
            </div>
			<?php endif?>
		</main>
	</section>
	<!-- BARRA SUPERIOR -->
	
	<script src="script.js"></script>
</body>
</html>