<?php

class TiempoTranscurrido {
    private $tiempo_inicio;
    private $tiempo_fin;
    private $tiempo_transcurrido;

    public function __construct() {
        $this->tiempo_inicio = microtime(true);
    }

    public function calcularTiempo() {
        $this->tiempo_fin = microtime(true);
        $this->tiempo_transcurrido = $this->tiempo_fin - $this->tiempo_inicio;
    }

    public function getMilisegundos() {
        return $this->tiempo_transcurrido * 1000;
    }

    public function getHoras() {
        return floor($this->tiempo_transcurrido / 3600);
    }

    public function getMinutos() {
        return floor(fmod($this->tiempo_transcurrido, 3600) / 60);
    }

    public function getSegundos() {
        return fmod(fmod($this->tiempo_transcurrido, 3600), 60);
    }

    public function getSegundosFormateados() {
        $segundos = floor($this->getSegundos()); // Obtener la parte entera de los segundos
        return str_pad($segundos, 2, '0', STR_PAD_LEFT); // Formatear con dos dígitos y ceros a la izquierda
    }

    public function getTiempoTranscurrido() {
        return $this->tiempo_transcurrido;
    }

    // Nuevo método para mostrar el tiempo en formato 00:00:00.000
    public function getTiempoFormateado() {
        $horas = str_pad($this->getHoras(), 2, '0', STR_PAD_LEFT);
        $minutos = str_pad($this->getMinutos(), 2, '0', STR_PAD_LEFT);
        $segundos = $this->getSegundosFormateados(); // Usar el método corregido para los segundos
        
        // Obtener los milisegundos (sin cambios)
        $segundos_con_decimales = fmod($this->tiempo_transcurrido, 60);
        $milisegundos = round(($segundos_con_decimales - floor($segundos_con_decimales)) * 1000);
        $milisegundos = str_pad($milisegundos, 3, '0', STR_PAD_LEFT);

        return $horas . ':' . $minutos . ':' . $segundos . '.' . $milisegundos;
    }

}

?>