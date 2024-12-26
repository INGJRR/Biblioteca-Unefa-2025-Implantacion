<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="estilo/login.css">
</head>
<body >
    
    <main>

<div class="box">
    <div class="ele">
    <div class="titulo">
        <div style="background-image: url(imagenes/unefa-logo-3FC9336783-seeklogo.com.png);" class="fo"></div>
        <div class="tit">Biblioteca <br><h3>Luis Beltran Prieto Figueroa</h3></div>
    </div>

    <div class="fotos">
        <div class="rec s">
            <div style="background-color: rgb(131, 243, 208);" class="fot a"></div>
            <div style="background-image: url(imagenes/sistemas.jpg);" class="fot b"></div>
            <div style="background-color: rgb(189, 131, 243);" class="fot c"></div>
        </div>


        <div class="rec z">
            <div style="background-image: url(imagenes/turismo.jpg);"  class="fot"></div>
            <div class="fot"></div>
            <div style="background-image: url(imagenes/admin.jpg);"  class="fot"></div>
        </div>
        <div class="rec x">
            <div style="background-color: rgb(131, 200, 243);" class="fot"></div>
            <div style="background-image: url(imagenes/civil.jpg);"  class="fot"></div>
            <div style="background-color: rgb(243, 166, 131);" class="fot"></div>
        </div>
       
    </div>


    </div>

    <?php include_once './controlador/login.php' ?>

    <div class="ele">
        <form class="form" method="POST">
            <div class="for"><br><br><br>
            <h2>Inicio De Sesion</h2><br> 
              <input class="input" id="usuario" name="usuario" placeholder="Usuario">
              <br>
              <input class="input" id="clave" name="clave" type="password" placeholder="Contraseña">
            </div>
            
          <div class="botones">
            <button type="submit">
                <a></a><span>Iniciar</span>
              </button>
              <button type="button" id="limpiar">
                <span>Limpiar</span>
              </button>
          </div>
        </form>
    </div>
  
</div>
<br><br><br><br><br><br><br><br><br>
  <svg id="wave" style="transform:rotate(0deg); transition: 0.3s" viewBox="0 0 1440 490" version="1.1" xmlns="http://www.w3.org/2000/svg"><defs><linearGradient id="sw-gradient-0" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(218, 240, 255, 1)" offset="0%"></stop><stop stop-color="rgba(164, 207, 237, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 0px); opacity:1" fill="url(#sw-gradient-0)" d="M0,147L30,122.5C60,98,120,49,180,32.7C240,16,300,33,360,89.8C420,147,480,245,540,253.2C600,261,660,180,720,138.8C780,98,840,98,900,122.5C960,147,1020,196,1080,179.7C1140,163,1200,82,1260,73.5C1320,65,1380,131,1440,179.7C1500,229,1560,261,1620,245C1680,229,1740,163,1800,130.7C1860,98,1920,98,1980,130.7C2040,163,2100,229,2160,220.5C2220,212,2280,131,2340,138.8C2400,147,2460,245,2520,261.3C2580,278,2640,212,2700,187.8C2760,163,2820,180,2880,163.3C2940,147,3000,98,3060,81.7C3120,65,3180,82,3240,147C3300,212,3360,327,3420,375.7C3480,425,3540,408,3600,375.7C3660,343,3720,294,3780,228.7C3840,163,3900,82,3960,49C4020,16,4080,33,4140,98C4200,163,4260,278,4290,334.8L4320,392L4320,490L4290,490C4260,490,4200,490,4140,490C4080,490,4020,490,3960,490C3900,490,3840,490,3780,490C3720,490,3660,490,3600,490C3540,490,3480,490,3420,490C3360,490,3300,490,3240,490C3180,490,3120,490,3060,490C3000,490,2940,490,2880,490C2820,490,2760,490,2700,490C2640,490,2580,490,2520,490C2460,490,2400,490,2340,490C2280,490,2220,490,2160,490C2100,490,2040,490,1980,490C1920,490,1860,490,1800,490C1740,490,1680,490,1620,490C1560,490,1500,490,1440,490C1380,490,1320,490,1260,490C1200,490,1140,490,1080,490C1020,490,960,490,900,490C840,490,780,490,720,490C660,490,600,490,540,490C480,490,420,490,360,490C300,490,240,490,180,490C120,490,60,490,30,490L0,490Z"></path><defs><linearGradient id="sw-gradient-1" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(218, 240, 255, 1)" offset="0%"></stop><stop stop-color="rgba(164, 207, 237, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 50px); opacity:0.9" fill="url(#sw-gradient-1)" d="M0,441L30,424.7C60,408,120,376,180,326.7C240,278,300,212,360,228.7C420,245,480,343,540,326.7C600,310,660,180,720,138.8C780,98,840,147,900,138.8C960,131,1020,65,1080,65.3C1140,65,1200,131,1260,163.3C1320,196,1380,196,1440,236.8C1500,278,1560,359,1620,367.5C1680,376,1740,310,1800,269.5C1860,229,1920,212,1980,196C2040,180,2100,163,2160,163.3C2220,163,2280,180,2340,187.8C2400,196,2460,196,2520,228.7C2580,261,2640,327,2700,351.2C2760,376,2820,359,2880,302.2C2940,245,3000,147,3060,114.3C3120,82,3180,114,3240,179.7C3300,245,3360,343,3420,318.5C3480,294,3540,147,3600,114.3C3660,82,3720,163,3780,228.7C3840,294,3900,343,3960,351.2C4020,359,4080,327,4140,294C4200,261,4260,229,4290,212.3L4320,196L4320,490L4290,490C4260,490,4200,490,4140,490C4080,490,4020,490,3960,490C3900,490,3840,490,3780,490C3720,490,3660,490,3600,490C3540,490,3480,490,3420,490C3360,490,3300,490,3240,490C3180,490,3120,490,3060,490C3000,490,2940,490,2880,490C2820,490,2760,490,2700,490C2640,490,2580,490,2520,490C2460,490,2400,490,2340,490C2280,490,2220,490,2160,490C2100,490,2040,490,1980,490C1920,490,1860,490,1800,490C1740,490,1680,490,1620,490C1560,490,1500,490,1440,490C1380,490,1320,490,1260,490C1200,490,1140,490,1080,490C1020,490,960,490,900,490C840,490,780,490,720,490C660,490,600,490,540,490C480,490,420,490,360,490C300,490,240,490,180,490C120,490,60,490,30,490L0,490Z"></path><defs><linearGradient id="sw-gradient-2" x1="0" x2="0" y1="1" y2="0"><stop stop-color="rgba(218, 240, 255, 1)" offset="0%"></stop><stop stop-color="rgba(164, 207, 237, 1)" offset="100%"></stop></linearGradient></defs><path style="transform:translate(0, 100px); opacity:0.8" fill="url(#sw-gradient-2)" d="M0,392L30,359.3C60,327,120,261,180,269.5C240,278,300,359,360,367.5C420,376,480,310,540,253.2C600,196,660,147,720,130.7C780,114,840,131,900,179.7C960,229,1020,310,1080,285.8C1140,261,1200,131,1260,98C1320,65,1380,131,1440,138.8C1500,147,1560,98,1620,138.8C1680,180,1740,310,1800,318.5C1860,327,1920,212,1980,212.3C2040,212,2100,327,2160,326.7C2220,327,2280,212,2340,171.5C2400,131,2460,163,2520,220.5C2580,278,2640,359,2700,326.7C2760,294,2820,147,2880,89.8C2940,33,3000,65,3060,122.5C3120,180,3180,261,3240,277.7C3300,294,3360,245,3420,204.2C3480,163,3540,131,3600,130.7C3660,131,3720,163,3780,179.7C3840,196,3900,196,3960,236.8C4020,278,4080,359,4140,343C4200,327,4260,212,4290,155.2L4320,98L4320,490L4290,490C4260,490,4200,490,4140,490C4080,490,4020,490,3960,490C3900,490,3840,490,3780,490C3720,490,3660,490,3600,490C3540,490,3480,490,3420,490C3360,490,3300,490,3240,490C3180,490,3120,490,3060,490C3000,490,2940,490,2880,490C2820,490,2760,490,2700,490C2640,490,2580,490,2520,490C2460,490,2400,490,2340,490C2280,490,2220,490,2160,490C2100,490,2040,490,1980,490C1920,490,1860,490,1800,490C1740,490,1680,490,1620,490C1560,490,1500,490,1440,490C1380,490,1320,490,1260,490C1200,490,1140,490,1080,490C1020,490,960,490,900,490C840,490,780,490,720,490C660,490,600,490,540,490C480,490,420,490,360,490C300,490,240,490,180,490C120,490,60,490,30,490L0,490Z"></path></svg>
    </main>
    <script type="module" src="login.js"></script>

<script>
    // Obtener los elementos por su ID
    const inputUsuario = document.getElementById('usuario');
    const inputClave = document.getElementById('clave');
    const botonLimpiar = document.getElementById('limpiar');

    function validarCampos() {
        // Verificamos si ambos campos están vacíos
        const ambosVacios = inputUsuario.value === '' && inputClave.value === '';
        // Habilitamos o deshabilitamos el botón según la condición
        botonLimpiar.disabled = ambosVacios;
    }

    // Llamamos a la función de validación al cargar la página y cada vez que cambie el valor de un input
    validarCampos();
    inputUsuario.addEventListener('input', validarCampos);
    inputClave.addEventListener('input', validarCampos);


    botonLimpiar.addEventListener('click', () => {
        if (confirm("¿Estás seguro de que quieres borrar los datos?")) {
            inputUsuario.value = '';
            inputClave.value = '';
            validarCampos();
        }
    });
</script>


</body>
</html>