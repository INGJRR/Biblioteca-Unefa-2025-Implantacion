<?php 

if(isset($_GET['tipo'])){
    $tipo = $_GET['tipo'];
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">	
    	<!--  CSS -->
    <title>Registrar idv</title>
</head>
<body>
    <?php include './componentes/barra-lateral.php'?>

    <?php if($tipo == 'libro'):  ?>
        <head>
            <link rel="stylesheet" href="estilo/Regi_libro.css">
        </head>
         <!-- BARRA SUPERIOR -->
        <section id="content">
            <nav>
                <i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
                <a class="retorn" href="Registrar.php">Regresar</a>
            </nav>
        <section>
        <br><br>
        <main>
            <br>   
            <form class="form">
                <p class="title">Libro</p><br>      
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Titulo</span>
                </label> 
                    
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Autor</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Area de estudio</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Año</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Cota</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Nivel</span>
                </label>
                <label>
                    <input required="" placeholder="" type="number" class="input">
                    <span>Ejemplar</span>
                </label>
                <br>
                <button class="submit">Registrar</button> 
            </form>
        </main>
        <script src="script.js"></script>
    <?php elseif($tipo == "estudiante"): ?>
        <head>
            <link rel="stylesheet" href="estilo/Regi_estu.css">
        </head>
        <body>
            <!-- BARRA SUPERIOR -->
            <section id="content">
                <nav>
                    <i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
                    <a class="retorn" href="Registrar.php">Regresar</a>
                </nav>
            <section>
            <br><br>
            <main>
                <br>   
                <form class="form">
                    <p class="title">Estudiante</p><br><br><br>     
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Cedula</span>
                    </label>   
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Nombre</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Apellido</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="" class="input">
                        <span>Fecha de nacimiento</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Direccion</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="tel" class="input">
                        <span>Telefono</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="email" class="input">
                        <span>Email</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Carrera</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Matricula</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="number" class="input">
                        <span>Semestre</span>
                    </label>
                    <br>
                    <button class="submit">Registrar</button>
                </form>
                <script src="script.js"></script>
            </main>  
            <script src="script.js"></script> 
        </body>
    <?php elseif($tipo == "profesor"): ?>
        <head>
            <link rel="stylesheet" href="estilo/Regi_pero.css">
        </head>
             <!-- BARRA SUPERIOR -->
            <section id="content">
                <nav>
                    <i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
                    <a class="retorn" href="Registrar.php">Regresar</a>
                </nav>
            <section>
            <br><br>
        <body>
            <main>
                <br>   
                <form class="form">
                    <p class="title">Personal UNEFA</p><br><br><br>      
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Cedula</span>
                    </label> 
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Nombre</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Apellido</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="" class="input">
                        <span>Fecha de nacimiento</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Direccion</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="tel" class="input">
                        <span>Telefono</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="email" class="input">
                        <span>Email</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Categoria</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="text" class="input">
                        <span>Año de ingreso</span>
                    </label>
                    <label>
                        <input required="" placeholder="" type="number" class="input">
                        <span>Area</span>
                    </label>
                    <br>
                    <button class="submit">Registrar</button>
                    
                </form>
            </main>
        </body>
    <?php elseif($tipo == "servicio-comunitario"): ?>
        <head>
            <link rel="stylesheet" href="estilo/Regis_comu.css">
        </head>
        <!-- BARRA SUPERIOR -->
        <section id="content">
            <nav>
                <i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
                <a class="retorn" href="Registrar.php">Regresar</a>
            </nav>
        <section>
        <br><br>
        <main>
            <br>   
            <form class="form">
                <p class="title">Servicio Comunitario</p><br><br><br>  
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Cedula</span>
                </label> 
                    
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Nombre</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Apellido</span>
                </label>
                <label>
                    <input required="" placeholder="" type="" class="input">
                    <span>Fecha de nacimiento</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Direccion</span>
                </label>
                <label>
                    <input required="" placeholder="" type="tel" class="input">
                    <span>Telefono</span>
                </label>
                <label>
                    <input required="" placeholder="" type="email" class="input">
                    <span>Email</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Categoria</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Año de ingreso</span>
                </label>
                <label>
                    <input required="" placeholder="" type="number" class="input">
                    <span>Area</span>
                </label>
                <br>
                <button class="submit">Registrar</button>
            </form>
        </main>
	    <script src="script.js"></script>
    <?php elseif($tipo == "trabajo-inv"): ?>
        <head>
            <link rel="stylesheet" href="estilo/Regi_grado.css">
        </head>
        <!-- BARRA SUPERIOR -->
        <section id="content">
            <nav>
                <i style="background-image: url(imagenes/flecha-curva.png);" class='bx bx-menu ' ></i>
                <a class="retorn" href="Registrar.php">Regresar</a>
            </nav>
        <section>
        <br><br>
        <main>
            <br>   
            <form class="form">
                <p class="title">Post Grado</p><br><br><br>      
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Cedula</span>
                </label> 
                    
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Nombre</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Apellido</span>
                </label>
                <label>
                    <input required="" placeholder="" type="" class="input">
                    <span>Fecha de nacimiento</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Direccion</span>
                </label>
                <label>
                    <input required="" placeholder="" type="tel" class="input">
                    <span>Telefono</span>
                </label>
                <label>
                    <input required="" placeholder="" type="email" class="input">
                    <span>Email</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Categoria</span>
                </label>
                <label>
                    <input required="" placeholder="" type="text" class="input">
                    <span>Año de ingreso</span>
                </label>
                <label>
                    <input required="" placeholder="" type="number" class="input">
                    <span>Area</span>
                </label>
                <br>
                <button class="submit">Registrar</button>
            </form>
      </main>
      <script src="script.js"></script>
    <?php else: ?>
    <?php endif?>
</body>
</html>