<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">	
	<!--  CSS -->
	<link rel="stylesheet" href="estilo/Formulario.css">
    <title>Biblioteca</title>
</head>
<!--  body -->
<body>


	<!-- MENU -->
	<!-- MENU -->
	<section id="sidebar">
		<div class="l">
			<span><div style="background-image: url(imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="logo"></div></span>
		  <div><p class="pe">Biblioteca </p> <p class="p" >Luis Beltran Prieto Figueroa</p><br></div>
		
		</div>
		<ul class="side-menu top">
			

			<li >
				<a href="index.html">
					<i style="background-image: url(imagenes/hogar.png);" class='bx bxs-shopping-bag-alt icon' ></i>
					<span class="text">Inicio</span>
				</a>
			</li>

			<li class="active">
				<a href="Registrar.html">
					<i style="background-image: url(imagenes/anadir.png);" class='bx bxs-shopping-bag-alt icon' ></i>
					<span class="text">Registrar</span>
				</a>
			</li>
			<li>
				<a href="Documento.html">
					<i style="background-image: url(imagenes/libro.png);" class='bx bxs-doughnut-chart icon' ></i>
					<span class="text">Documentos</span>
				</a>
			</li>
			<li>
				<a href="estudiantes.html">
					<i style="background-image: url(imagenes/graduado.png);" class='bx bxs-message-dots icon' ></i>
					<span class="text">Estudiantes</span>
				</a>
			</li>
			<li>
				<a href="unefaper.html">
					<i style="background-image: url(imagenes/social.png);" class='bx bxs-group icon' ></i>
					<span class="text">Personal UNEFA</span>
				</a>
			</li>
		</ul>

		<ul class="side-menu">
		
			<li>
				<a href="home.html" class="logout">
					<i style="background-image: url(imagenes/cerrar-sesion.png);" class='bx bxs-log-out-circle icon' ></i>
					<span class="text">Salir</span>
				</a>
			</li>
		</ul>
	</section>
	<!-- MENU -->

	<!-- MENU -->



	<!-- BARRA SUPERIOR -->
	<section id="content">
		<nav>
			<i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
			
			<a class="retorn" href="Registrar.html">Regresar</a>
		</nav>
		
		
	</section>
	
    <br><br>

	<main>
     <!-- FORMULARIO -->
		<form action="" class="formulario" id="formulario">
			
			
			<div class="formulario_grupo" id="grupo_usuario">
				<label for="usuario" class="formulario__label">Usuario</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="usuario" id="usuario" placeholder="john123">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Nombre -->
			<div class="formulario_grupo" id="grupo_nombre">
				<label for="nombre" class="formulario__label">Nombre</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="nombre" id="nombre" placeholder="John Doe">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El usuario tiene que ser de 4 a 16 dígitos y solo puede contener numeros, letras y guion bajo.</p>
			</div>

			<!-- Grupo: Contraseña -->
			<div class="formulario_grupo" id="grupo_password">
				<label for="password" class="formulario__label">Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password" id="password">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">La contraseña tiene que ser de 4 a 12 dígitos.</p>
			</div>

			<!-- Grupo: Contraseña 2 -->
			<div class="formulario_grupo" id="grupo_password2">
				<label for="password2" class="formulario__label">Repetir Contraseña</label>
				<div class="formulario__grupo-input">
					<input type="password" class="formulario__input" name="password2" id="password2">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">Ambas contraseñas deben ser iguales.</p>
			</div>

			<!-- Grupo: Correo Electronico -->
			<div class="formulario_grupo" id="grupo_correo">
				<label for="correo" class="formulario__label">Correo Electrónico</label>
				<div class="formulario__grupo-input">
					<input type="email" class="formulario__input" name="correo" id="correo" placeholder="correo@correo.com">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El correo solo puede contener letras, numeros, puntos, guiones y guion bajo.</p>
			</div>

			<!-- Grupo: Teléfono -->
			<div class="formulario_grupo" id="grupo_telefono">
				<label for="telefono" class="formulario__label">Teléfono</label>
				<div class="formulario__grupo-input">
					<input type="text" class="formulario__input" name="telefono" id="telefono" placeholder="4491234567">
					<i class="formulario__validacion-estado fas fa-times-circle"></i>
				</div>
				<p class="formulario__input-error">El telefono solo puede contener numeros y el maximo son 14 dígitos.</p>
			</div>	

			<div class="formulario_grupo formulario_grupo-btn-enviar">
				<button class="boton" type="button" id="open">enviar</button>
				<p class="formulario_mensaje-exito" id="formulario_mensaje-exito">Formulario enviado exitosamente!</p>
			</div>
		</form>
	</main>

	<script src="https://kit.fontawesome.com/2c36e9b7b1.js" crossorigin="anonymous"></script>

<!-- ESTILOS DEL MODAL -->
	<style>
            .boton {
                background-color:rgb(82, 152, 202);
                border: 0;
                border-radius: 5px;
                box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
                color: #fff;
                font-size: 14px;
                padding: 10px 25px;
            }

        .modal-container {
        display: flex;
        align-items: center;
        justify-content: center;
        position: absolute;
        pointer-events: none;
        background-color:#eeee;
        height:100%;
        width:100%;  
        opacity: 0;  
        top: 0;
        left: 0;
        transition: opacity 0.3s ease;
        
        }

        .show {
        pointer-events: auto;
        opacity: 1;
        }

        .modal {
        
        padding: 50px 40px;
        border-radius: 5px;
        text-align: center;
        overflow: hidden;
        position: relative;
        background-color: #ffffff;
        text-align: left;
        border-radius: 0.5rem;
        height:400px;
        width: 500px;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        margin:auto;
        
        }

        .modal h1 {
        margin: 0;
        }

        .modal p {
        opacity: 0.7;
        font-size: 14px;
        }

        .image {
        display: flex;
        margin-left: auto;
        margin-right: auto;
        background-color:rgb(249, 203, 203);
        flex-shrink: 0;
        justify-content: center;
        align-items: center;
        width: 4rem;
        height: 4rem;
        border-radius: 9999px;
        }

        .image svg {
        color: #dc2626;
        width: 2rem;
        height: 2rem;
        }

        .content {
        margin-top: 1rem;
        text-align: center;
        }

        .title {
        color: #111827;
        font-size: 1.5rem;
        font-weight: 600;
        margin-left:20%;
        line-height: 1.5rem;
        }

        .message {
        margin-top: 0.5rem;
        color: #6b7280;
        font-size: 0.90rem;
        line-height: 1.25rem;
        }

        .actions {
        margin: 0.75rem 1rem;
        background-color: #f9fafb;
        }

        .desactivate {
        display: inline-flex;
        padding: 0.5rem 1rem;
        background-color: #dc2626;
        color: #ffffff;
        font-size: 1rem;
        line-height: 1.5rem;
        font-weight: 500;
        justify-content: center;
        width: 100%;
        border-radius: 0.375rem;
        border-width: 1px;
        border-color: transparent;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }

        .cancel {
        display: inline-flex;
        margin-top: 0.75rem;
        padding: 0.5rem 1rem;
        background-color: #ffffff;
        color: #374151;
        font-size: 1rem;
        line-height: 1.5rem;
        font-weight: 500;
        justify-content: center;
        width: 100%;
        border-radius: 0.375rem;
        border: 1px solid #d1d5db;
        box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);
        }
	</style>
<!-- ESTILOS DEL MODAL -->
	   
	   <div id="modal_container" class="card modal-container">
		 <div class="modal">
		   <div class="image" style="background-color: green;"><br><br><br><br>
           <svg viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <path d="M20 7L9.00004 18L3.99994 13" stroke="#000000" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path> </g></svg>
		   </div>
		   <!--  MODAL -->
		   <div class="content">
			 <span class="title">Enviar datos</span>
			 <p class="message">
                Los datos serán enviado para completar el registro.
			 </p>
		   </div>
		   <div class="actions">
			 <button type="button" class="desactivate boton" style="background-color: green;">Enviar</button>
			 <button type="button" id="close" class="cancel boton">Cancelar</button>
		   </div>
		 </div>
	   </div>
	    <!--  MODAL -->

	 
	  <!-- FUNCION DEL MODAL -->
		 <script>
	 
	        const open = document.getElementById('open');
	        const modal_container = document.getElementById('modal_container');
	        const close = document.getElementById('close');
	 
            open.addEventListener('click', () => {
            modal_container.classList.add('show');  
            });
            
            close.addEventListener('click', () => {
            modal_container.classList.remove('show');
            });
		 </script>
		 <!-- FUNCION DEL MODAL -->
</body>
</html>