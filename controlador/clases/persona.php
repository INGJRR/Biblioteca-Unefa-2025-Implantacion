<?php
class Persona{
    public function __construct(
        private $cedula, 
        private $nombre, 
        private $apellido,
        private $fecha_nacimiento,
        private $direccion,
        private $telefono,
        private $email,
        private $estado,
        private $moroso
    ) {
    }
    
    public function get_data(){
        return get_object_vars($this);
    }

    public function datos_personales(){
        echo '<p><strong>Nombre:</strong> '. $this->nombre .'</p>
                <p><strong>Apellido:</strong> '.  $this->apellido.'</p>
                <p><strong>Cédula:</strong> '. $this->cedula.'</p>
                <p><strong>Fecha de Nacimiento:</strong> '.   $this->fecha_nacimiento.'</p>
                <p><strong>Dirección:</strong> '.  $this->direccion.'</p>
                <p><strong>Teléfono:</strong> '. $this->telefono.'</p>
                <p><strong>Email:</strong> '. $this->email.'</p>
                <p><strong>Estado:</strong> '. (( $this->estado == 1) ? 'Activo' : 'Inactivo') .'</p>
                <p><strong>Moroso:</strong> '. (( $this->moroso == 1) ? 'SI' : 'NO') .'</p>';
    }

}
?>