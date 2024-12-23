<?php
require_once 'documento.php';
class Pasantia extends Documento{
    public function __construct(
        //datos del padre
        private $cota, 
        private $titulo,
        private $autor,
        private $fecha_presentacion,
        private $fecha_registro,
        private $cantidad,
        //datos de nuestro objeto nuevo servicio comunitario
        private $tutor,
        private $tutor_comunitario,
        private $carrera,
        private $lugar
    ) {
        parent::__construct($cota,$titulo,$autor,$fecha_presentacion,$fecha_registro,$cantidad);
    }
    

    public function get_datos(){
        parent::get_datos();
        echo '<p><strong>Tutor:</strong> '. $this->tutor .'</p>
                <p><strong>Tutor comunitario:</strong> '.  $this->tutor_comunitario.'</p>
                <p><strong>Carrera:</strong> '.  $this->carrera.'</p>
                <p><strong>Lugar:</strong> '.  $this->lugar.'</p>';
    }
    public static function obtener_datos_y_crear_objeto($cota){
        require '../../modelo/conexion.php';
        // Vamos a obtener toda la informacion del libro mediante la cota
        $stmt = $conexion->prepare("SELECT 
            *
        FROM pasantias pa
        WHERE pa.cota = ?");
    
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
                $row['tutor_comunitario'],
                $row['carrera'],
                $row['lugar']
            );
        } else {
            // echo "No se encontraron resultados para la cédula: " . $cedula;
        }

        $stmt->close();
    }
}
?>