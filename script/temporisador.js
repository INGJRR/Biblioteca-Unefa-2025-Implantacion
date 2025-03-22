let timerInterval;
let startTime;
let elapsedTime = 0;
let isRunning = false;

const timerDisplay = document.getElementById("timer");
const startButton = document.getElementById("start");
const stopButton = document.getElementById("stop");
const resetButton = document.getElementById("reset");

// Función para formatear el tiempo en HH:MM:SS
function formatTime(milliseconds) {
  const totalSeconds = Math.floor(milliseconds / 1000);
  const hours = Math.floor(totalSeconds / 3600);
  const minutes = Math.floor((totalSeconds % 3600) / 60);
  const seconds = totalSeconds % 60;
  const ms = milliseconds % 1000;
  return `${String(hours).padStart(2, "0")}:${String(minutes).padStart(2,"0")}:${String(seconds).padStart(2, "0")}.${String(ms).padStart(3, '0')}`;
}

// Función para actualizar el temporizador
function updateTimer() {
  const currentTime = Date.now();
  elapsedTime = currentTime - startTime;
  timerDisplay.textContent = formatTime(elapsedTime);
}

// Iniciar el temporizador
startButton.addEventListener("click", () => {
  if (!isRunning) {
    isRunning = true;
    startTime = Date.now() - elapsedTime;
    timerInterval = setInterval(updateTimer, 10);
  }
});

// Detener el temporizador
stopButton.addEventListener("click", () => {
  if (isRunning) {
    isRunning = false;
    clearInterval(timerInterval);
  }
});

// Reiniciar el temporizador
resetButton.addEventListener("click", () => {
  isRunning = false;
  clearInterval(timerInterval);
  elapsedTime = 0;
  timerDisplay.textContent = formatTime(elapsedTime);
});
