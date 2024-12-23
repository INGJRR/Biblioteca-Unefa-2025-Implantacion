<?php

require_once 'persona.php';

class Profesor extends Persona{

    function __construct(
        private $cedula, 
        private $nombre, 
        private $apellido,
        private $fecha_nacimiento,
        private $direccion,
        private $telefono,
        private $gmail,
        private $estado,
        private $moroso,
        private $fecha_ingreso,
        private $carrera
    ){
        parent::__construct($cedula,$nombre,$apellido,$fecha_nacimiento,$direccion,$telefono,$gmail,$estado,$moroso);
    }

    public function datos_personales()
    {
        parent::datos_personales();
        echo '<p><strong>Fecha de ingreso a trabajar:</strong> '. $this->fecha_ingreso .'</p>
              <p><strong>carrera:</strong> '.  $this->carrera.'</p>';
    }

    public static function obtener_datos_y_crear_objeto($cedula){
        require '../../modelo/conexion.php';
        // Vamos a obtener toda la informacion del profesor mediante la cedula
        $stmt = $conexion->prepare("SELECT 
            *
        FROM profesores
        WHERE cedula = ?");
    
        $stmt->bind_param("s", $cedula); // 's' indica que el parámetro es una cadena
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            return new self(
                $row['cedula'],
                $row['nombre'],
                $row['apellido'],
                $row['fecha_nacimiento'],
                $row['direccion'],
                $row['telefono'],
                $row['gmail'],
                $row['estado'],
                $row['moroso'],
                '11-12-2024',
                'Ing de Sistemas'
            );
        } else {
            // echo "No se encontraron resultados para la cédula: " . $cedula;
        }

        $stmt->close();
    }
    public static function obtener_datos_y_crear_objetos_todos(){
        require '../../modelo/conexion.php';
        // Vamos a obtener toda la informacion del estudiante mediante la cedula
        $stmt = $conexion->prepare("SELECT 
            *
        FROM profesores");
    
        // $stmt->bind_param("s", $cedula); // 's' indica que el parámetro es una cadena
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $profesores = []; // Arreglo para almacenar los objetos Estudiante
            while ($row = $result->fetch_assoc()) {
                $profesor = new self(
                    $row['cedula'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['fecha_nacimiento'],
                    $row['direccion'],
                    $row['telefono'],
                    $row['gmail'],
                    $row['estado'],
                    $row['moroso'],
                    '11-12-2024',
                    'Ing de Sistemas'
                );
                $profesores[] = $profesor; // Agregamos el objeto al arreglo
            }
            return $profesores;
        } else {
            // echo "No se encontraron resultados para la cédula: " . $cedula;
        }
    }
}

?>