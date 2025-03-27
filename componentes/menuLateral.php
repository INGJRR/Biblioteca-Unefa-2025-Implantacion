	<style>

		/* es el contenedor del menu desplegable */
		#sidebar{
			min-width: 280px;
			overflow: hidden;
			max-width: 280px;
		}
		
		#sidebar.hide{
			min-width: 80px;
		}
		
		#sidebar.hide .logo{
			width: 80px;
			height: 100px;
		}

		#sidebar.hide .l .logo-letras{
			display: none;
		}

		.text2{
			white-space: wrap;
		}
		
		/* es el contenedor que tiene las imagenes de los iconos */

		#sidebar.hide .side-menu li a{
			overflow: hidden;
		}
		#sidebar .side-menu li a{
			overflow: hidden;
		}
		
		#sidebar .side-menu li{
			height: 3rem;
		}
		
		
		/* media para controlar que no exceda del tamaño del menu verticalmente */

		@media(max-width: 370px){
			html{
				font-size: 14px;
			}
			
		}

		@media(min-width: 1350px){
			html{
				font-size: 16px;
			}
			
		}

		@media(max-width: 1800px){
			html{
				font-size: 14px;
			}
			
		}


	</style>
	
	
	
	<!-- MENU -->
	<section id="sidebar">

	    <div class="l">
	        <span>
	            <div style="background-image: url(imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div>
	        </span>
	        <div class="logo-letras">
	            <p class="pe">Biblioteca </p>
	            <p class="p">Luis Beltran Prieto Figueroa</p> 
	        </div>

	    </div>

	    <ul class="side-menu top">

	        <li class="<?= ($menuActive == 1) ? 'active' : '' ?>">
	            <a title="Inicio" href="admin-inicio.php">
	                <i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon'></i>
	                <span class="text text2">Inicio</span>
	            </a>
	        </li>
            
            <li class="<?= ($menuActive == 2) ? 'active' : '' ?>">
	            <a title="Registrar estudiante" href="regis_estu.php">
	                <i style="background-image: url(imagenes/graduado.png);" class='bx bxs-group icon'></i>
	                <span class="text text2">Registrar estudiante</span>
	            </a>
	        </li> 
 
            <li class="<?= ($menuActive == 3) ? 'active' : '' ?>">
	            <a title="Registrar personal" href="regis_pero.php">
	                <i style="background-image: url(imagenes/social.png);" class='bx bxs-doughnut-chart icon'></i>
	                <span class="text text2">Registrar personal   unefa </span>
	            </a>
	        </li> 

            <li class="<?= ($menuActive == 4) ? 'active' : '' ?>">
	            <a title="Registrar libro" href="regis_libro.php">
	                <i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon'></i>
	                <span class="text text2">Registrar libro</span>
	            </a>
	        </li> 

	        <li class="<?= ($menuActive == 5) ? 'active' : '' ?>">
	            <a title="Registrar Trabajo de Investigación" href="regis_grado.php">
	                <i style="background-image: url(imagenes/libro.png);" class='bx bxs-message-dots icon'></i>
	                <span class="text text2">Registrar trabajo de   investigación </span>
	            </a>
	        </li>  
	        <li class="<?= ($menuActive == 6) ? 'active' : '' ?>">
	            <a title="Registrar Trabajo de servicio comunitario" href="regis_comu.php">
	                <i style="background-image: url(imagenes/sc.png);" class='bx bxs-group icon'></i>
	                <span class="text text2">Registrar trabajo de  servicio comunitario</span>
	            </a>
	        </li> 
			<li class="<?= ($menuActive == 7) ? 'active' : '' ?>">
	            <a title="Registrar Trabajo de pasantia" href="regis_pasantia.php">
	                <i style="background-image: url(imagenes/pasantia.png);" class='bx bxs-group icon'></i>
	                <span class="text text2">Registrar trabajo de   pasantia</span>
	            </a>
	        </li> 
	        <li class="<?= ($menuActive == 8) ? 'active' : '' ?>">
	            <a title="Realizar prestamo" href="regis_prestamo.php">
	                <i style="background-image: url('./imagenes/prestamos.png');" class='bx bxs-group icon'></i>
	                <span class="text text2 ">Realizar prestamo</span>
	            </a>
	        </li> 
	    </ul>

	    <ul class="side-menu">

	        <li>
	            <a title="Cerrar Sesión" href="./controlador/cerrar_sesion.php" class="logout">
	                <i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon'></i>
	                <span class="text text2">Cerrar sesión</span>
	            </a>
	        </li>
	    </ul>

	</section>
	<!-- MENU -->