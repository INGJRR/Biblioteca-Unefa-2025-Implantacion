<?php

class Temporizador {
  private $inicio;
  private $detenido;

  public function __construct() {
    $this->inicio = null;
    $this->detenido = true;
  }

  public function iniciar() {
    if ($this->detenido) {
      $this->inicio = microtime(true);
      $this->detenido = false;
    }
  }

  public function detener() {
    if (!$this->detenido) {
      $this->detenido = true;
    }
  }

  public function reiniciar() {
    $this->inicio = microtime(true);
    $this->detenido = false;
  }

  public function obtenerTiempo() {
    if ($this->detenido || $this->inicio === null) {
      return $this->formatearTiempo(0);
    }

    $ahora = microtime(true);
    $tiempoTranscurrido = $ahora - $this->inicio;
    return $this->formatearTiempo($tiempoTranscurrido);
  }

  private function formatearTiempo($tiempo) {
    $horas = floor($tiempo / 3600);
    $minutos = floor(($tiempo % 3600) / 60);
    $segundos = floor($tiempo % 60);
    $milisegundos = round(($tiempo - floor($tiempo)) * 1000);

    return sprintf('%02d:%02d:%02d:%03d', $horas, $minutos, $segundos, $milisegundos);
  }
}

?>