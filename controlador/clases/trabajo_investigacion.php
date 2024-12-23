<?php
require_once 'documento.php';
class Trabajo_investigacion extends Documento{
    public function __construct(
        //datos del padre
        private $cota, 
        private $titulo,
        private $autor,
        private $fecha_presentacion,
        private $fecha_registro,
        private $cantidad,
        //datos de nuestro objeto nuevo trabajo de investigacion
        private $tutor,
        private $carrera,
        private $linea_investigacion,
        private $mencion,
        private $metodologia,
        private $metodo,
        private $tipo, 
        private $palabras_claves,
        private $nivel_academico

    ) {
        parent::__construct($cota,$titulo,$autor,$fecha_presentacion,$fecha_registro,$cantidad);
    }
    

    public function get_datos(){
        parent::get_datos();
        echo '<p><strong>Tutor:</strong> '. $this->tutor .'</p>
                <p><strong>Carrera:</strong> '.  $this->carrera.'</p>
                <p><strong>Linea de investigacion:</strong> '.  $this->linea_investigacion.'</p>
                <p><strong>Mencion:</strong> '.  $this->mencion.'</p>
                <p><strong>Metodologia:</strong> '.  $this->metodologia.'</p>
                <p><strong>Metodo:</strong> '.  $this->metodo.'</p>
                <p><strong>Tipo:</strong> '.  $this->tipo.'</p>
                <p><strong>Palabras claves:</strong> '.  $this->palabras_claves.'</p>
                <p><strong>Nivel academico:</strong> '. $this->nivel_academico .'</p>';
    }
    public static function obtener_datos_y_crear_objeto($cota){
        require '../../modelo/conexion.php';
        // Vamos a obtener toda la informacion del libro mediante la cota
        $stmt = $conexion->prepare("SELECT 
            *
        FROM trabajos_investigacion t
        WHERE t.cota = ?");
    
        $stmt->bind_param("s", $cota); // 's' indica que el parámetro es una cadena
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new self(
                $row['cota'],
                $row['titulo'],
                $row['autor'],
                $row['fecha_presentacion'],
                $row['fecha_registro'],
                $row['cantidad'],
                $row['tutor'],
                $row['carrera'],
                $row['linea_investigacion'],
                $row['mencion'],
                $row['metodologia'],
                $row['metodo'],
                $row['tipo'],
                $row['palabras_claves'],
                $row['nivel_academico']
            );
        } else {
            // echo "No se encontraron resultados para la cédula: " . $cedula;
        }

        $stmt->close();
    }
}
?>