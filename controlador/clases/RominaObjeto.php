<?php

class TiempoDB {
    public $errores;
    public $dbsql;

    public function __construct($errores, $dbsql) {
        $this->errores = $errores;
        $this->dbsql = $dbsql;
    }
}

class TiempoRegistro {
    public $inicio;
    public $registro;
    public $db = []; // Inicializamos como un array vacío

    public function __construct($inicio, $registro) {
        $this->inicio = $inicio;
        $this->registro = $registro;
    }

    public function agregarDB(TiempoDB $db) {
        $this->db[] = $db;
    }
}

class TiempoSeccion {
    public $registros = []; // Inicializamos como un array vacío

    public function agregarRegistro(TiempoRegistro $registro) {
        $this->registros[] = $registro;
    }
}

class Tiempo {
    public $secciones = []; // Inicializamos como un array vacío

    public function agregarSeccion(TiempoSeccion $seccion, $nombreSeccion) {
        $this->secciones[$nombreSeccion] = $seccion;
    }

    public function toArray() {
        $array = [];
        foreach ($this->secciones as $nombreSeccion => $seccion) {
            $registrosArray = [];
            foreach ($seccion->registros as $registro) {
                $dbArray = [];
                foreach ($registro->db as $db) {
                    $dbArray[] = [
                        'errores' => $db->errores,
                        'dbsql' => $db->dbsql
                    ];
                }
                $registrosArray[] = [
                    'inicio' => $registro->inicio,
                    'registro' => $registro->registro,
                    'db' => $dbArray
                ];
            }
            $array[$nombreSeccion] = $registrosArray;
        }
        return $array;
    }
}

?>