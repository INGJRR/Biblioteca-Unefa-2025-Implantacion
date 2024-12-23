<?php

require_once 'persona.php';

class Estudiante extends Persona{

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
        private $semestre_actual,
        private $carrera
    ){
        parent::__construct($cedula,$nombre,$apellido,$fecha_nacimiento,$direccion,$telefono,$gmail,$estado,$moroso);
    }

    public function datos_personales()
    {
        parent::datos_personales();
        echo '<p><strong>Semestre Actual:</strong> '. $this->semestre_actual .'</p>
              <p><strong>carrera:</strong> '.  $this->carrera.'</p>';
    }

    public static function obtener_datos_y_crear_objeto($cedula){
        require '../../modelo/conexion.php';
        // Vamos a obtener toda la informacion del estudiante mediante la cedula
        $stmt = $conexion->prepare("SELECT 
            *,
            c.nombre as carrera,
            e.nombre as nombre
        FROM estudiantes e
        INNER JOIN carreras c ON e.id_carrera = c.id
        WHERE e.cedula = ?");
    
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
                $row['semestre_actual'],
                $row['carrera']
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
            *,
            c.nombre as carrera,
            e.nombre as nombre
        FROM estudiantes e
        INNER JOIN carreras c ON e.id_carrera = c.id");
    
        // $stmt->bind_param("s", $cedula); // 's' indica que el parámetro es una cadena
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $estudiantes = []; // Arreglo para almacenar los objetos Estudiante
            while ($row = $result->fetch_assoc()) {
                $estudiante = new self(
                    $row['cedula'],
                    $row['nombre'],
                    $row['apellido'],
                    $row['fecha_nacimiento'],
                    $row['direccion'],
                    $row['telefono'],
                    $row['gmail'],
                    $row['estado'],
                    $row['moroso'],
                    $row['semestre_actual'],
                    $row['carrera']
                );
                $estudiantes[] = $estudiante; // Agregamos el objeto al arreglo
            }
            return $estudiantes;
        } else {
            // echo "No se encontraron resultados para la cédula: " . $cedula;
        }
    }
}

?>