let timerInterval;
let startTime;
let elapsedTime = 0;
let isRunning = false;
let savedTime = 0; // Variable para guardar el tiempo del temporizador
let currentTimerValue = "00:00:00.000"; // Variable para almacenar el valor formateado del temporizador
let tiempos = {};
// Función para formatear el tiempo en HH:MM:SS
function formatTime(milliseconds) {
  const totalSeconds = Math.floor(milliseconds / 1000);
  const hours = Math.floor(totalSeconds / 3600);
  const minutes = Math.floor((totalSeconds % 3600) / 60);
  const seconds = totalSeconds % 60;
  const ms = milliseconds % 1000;
  return `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2, "0")}:${String(seconds).padStart(2, "0")}.${String(ms).padStart(3, '0')}`;
}

// Función para actualizar el temporizador
function updateTimer() {
  const currentTime = Date.now();
  elapsedTime = currentTime - startTime;
  currentTimerValue = formatTime(elapsedTime); // Guardar el valor formateado en la variable
  // console.log(currentTimerValue); // Opcional: Mostrar el valor en la consola
}

// Iniciar el temporizador
function iniciar() {
  if (!isRunning) {
    isRunning = true;
    startTime = Date.now() - elapsedTime;
    timerInterval = setInterval(updateTimer, 10);
  }
}

// Detener el temporizador
function detener() {
  if (isRunning) {
    isRunning = false;
    clearInterval(timerInterval);
    savedTime = elapsedTime; // Guardar el tiempo actual en la variable savedTime
    // console.log("Tiempo guardado:", formatTime(savedTime)); // Opcional: Mostrar el tiempo guardado en consola
  }
}

// Reiniciar el temporizador
function reiniciar() {
  isRunning = false;
  clearInterval(timerInterval);
  elapsedTime = 0;
  savedTime = 0; // Reiniciar también el tiempo guardado
  currentTimerValue = formatTime(elapsedTime); // Reiniciar el valor formateado
//   console.log(currentTimerValue); // Opcional: Mostrar el valor en la consola
}

// // Asignar eventos a los botones (si los tienes)
// startButton.addEventListener("click", iniciar);
// stopButton.addEventListener("click", detener);
// resetButton.addEventListener("click", reiniciar);


 
function paginaCargada() {
    if (document.readyState === "complete") {
      console.log("La página se ha cargado completamente.");
      detener();
      const mostrar = document.getElementById('timer');
      mostrar.textContent = currentTimerValue;
      console.log(currentTimerValue);
  
      // Aquí puedes agregar el código que deseas ejecutar cuando la página esté cargada,
      // por ejemplo, mostrar elementos, iniciar animaciones, etc.
    } else {
      console.log("La página aún no se ha cargado completamente. Esperando...");
      setTimeout(paginaCargada, 100); // Verifica cada 100 milisegundos
    }
}

function paginaCargadaHistorial() {
  if (document.readyState === "complete") {
    console.log("La página se ha cargado completamente.");
    detener();
    const mostrar = document.getElementById('timer');
    const elemento = document.getElementById('tp-historial');
    tiempos.inicio = currentTimerValue;
    //primera carga en el sistema
    // Crea el elemento párrafo
    const nuevoParrafo = document.createElement("p");

    // Crea el contenido del párrafo
    const contenidoParrafo = document.createTextNode('Modulo registrar: ' + currentTimerValue);

    // Agrega el contenido al párrafo
    nuevoParrafo.appendChild(contenidoParrafo);

    // Agrega el párrafo al div
    elemento.appendChild(nuevoParrafo);
    
    reiniciar();
    iniciar();
    setInterval(()=>{
      mostrar.textContent = currentTimerValue;
    }, 10);
    // Aquí puedes agregar el código que deseas ejecutar cuando la página esté cargada,
    // por ejemplo, mostrar elementos, iniciar animaciones, etc.
  } else {
    console.log("La página aún no se ha cargado completamente. Esperando...");
    setTimeout(paginaCargada, 100); // Verifica cada 100 milisegundos
  }
}


