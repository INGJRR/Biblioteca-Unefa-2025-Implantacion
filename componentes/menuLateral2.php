	<style>
		#sidebar.hide .logo{
			width: 80px;
			height: 100px;
		}

		#sidebar.hide .l .logo-letras{
			display: none;
		}
	</style>
	
	
	<!-- MENU -->
	<section id="sidebar">

	    <div class="l">
	        <span>
	            <div style="background-image: url(<?= $rutaImgMenu?>imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div>
	        </span>
	        <div class="logo-letras">
	            <p class="pe">Biblioteca </p>
	            <p class="p">Luis Beltran Prieto Figueroa</p><br>
	        </div>

	    </div>

	    <ul class="side-menu top">
	        <br><br>

	        <li class="<?= ($menuActive == 1) ? 'active' : '' ?>">
	            <a title="Inicio" href="<?= $rutaImgMenu?>admin-inicio.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
	                <span class="text">Inicio</span>
	            </a>
	        </li><br>
            
            <li class="<?= ($menuActive == 2) ? 'active' : '' ?>">
	            <a title="Registrar estudiante" href="<?= $rutaImgMenu?>regis_estu.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/graduado.png);" class='bx bxs-group icon'></i>
	                <span class="text">Registrar estudiante</span>
	            </a>
	        </li><br>

            <li class="<?= ($menuActive == 3) ? 'active' : '' ?>">
	            <a title="Registrar personal" href="<?= $rutaImgMenu?>regis_pero.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/social.png);" class='bx bxs-doughnut-chart icon'></i>
	                <span class="text">Registrar personal <br> unefa </span>
	            </a>
	        </li><br>

            <li class="<?= ($menuActive == 4) ? 'active' : '' ?>">
	            <a title="Registrar libro" href="<?= $rutaImgMenu?>regis_libro.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
	                <span class="text">Registrar libro</span>
	            </a>
	        </li><br>

	        <li class="<?= ($menuActive == 5) ? 'active' : '' ?>">
	            <a title="Registrar Trabajo de Investigación" href="<?= $rutaImgMenu?>regis_grado.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/libro.png);" class='bx bxs-message-dots icon'></i>
	                <span class="text">Registrar trabajo de <br> investigación </span>
	            </a>
	        </li><br>
	        <li class="<?= ($menuActive == 6) ? 'active' : '' ?>">
	            <a title="Registrar Trabajo de servicio comunitario" href="<?= $rutaImgMenu?>regis_comu.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/sc.png);" class='bx bxs-group icon'></i>
	                <span class="text">Registrar trabajo de <br>servicio comunitario</span>
	            </a>
	        </li><br>
			<li class="<?= ($menuActive == 7) ? 'active' : '' ?>">
	            <a title="Registrar Trabajo de pasantia" href="<?= $rutaImgMenu?>regis_pasantia.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/pasantia.png);" class='bx bxs-group icon'></i>
	                <span class="text">Registrar trabajo de <br> pasantia</span>
	            </a>
	        </li><br>
	        <li class="<?= ($menuActive == 8) ? 'active' : '' ?>">
	            <a title="Realizar prestamo" href="<?= $rutaImgMenu?>regis_prestamo.php">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/prestamos.png);" class='bx bxs-group icon'></i>
	                <span class="text">Realizar prestamo</span>
	            </a>
	        </li><br>
	    </ul>

	    <ul class="side-menu">

	        <li>
	            <a title="Cerrar Sesión" href="<?= $rutaImgMenu?>controlador/cerrar_sesion.php" class="logout">
	                <i style="background-image: url(<?= $rutaImgMenu?>imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon'></i>
	                <span class="text">Cerrar sesión</span>
	            </a>
	        </li>
	    </ul>

	</section>
	<!-- MENU -->