<?php
require_once 'documento.php';
class Libro extends Documento{
    public function __construct(
        //datos del padre
        private $cota, 
        private $titulo,
        private $autor,
        private $fecha_presentacion,
        private $fecha_registro,
        private $cantidad,
        //datos de nuestro objeto nuevo libro
        private $editorial,
        private $carrera,
        private $tipo_libro,

    ) {
        parent::__construct($cota,$titulo,$autor,$fecha_presentacion,$fecha_registro,$cantidad);
    }
    

    public function get_datos(){
        parent::get_datos();
        echo '<p><strong>Editorial:</strong> '. $this->editorial .'</p>
                <p><strong>Carrera:</strong> '.  $this->carrera.'</p>
                <p><strong>Tipo de libro:</strong> '. $this->tipo_libro.'</p>';
    }
    public static function obtener_datos_y_crear_objeto($cota){
        require '../../modelo/conexion.php';
        // Vamos a obtener toda la informacion del libro mediante la cota
        $stmt = $conexion->prepare("SELECT 
            *
        FROM libros l
        WHERE l.cota = ?");
    
        $stmt->bind_param("s", $cota); // 's' indica que el parámetro es una cadena
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new self(
                $row['cota'],
                $row['titulo'],
                $row['autor'],
                $row['fecha'],
                $row['fecha_registro'],
                $row['cantidad'],
                $row['editorial'],
                $row['carrera'],
                $row['tipo_libro']
            );
        } else {
            // echo "No se encontraron resultados para la cédula: " . $cedula;
        }

        $stmt->close();
    }
}
?>