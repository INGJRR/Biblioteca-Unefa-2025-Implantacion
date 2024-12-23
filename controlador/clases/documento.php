<?php
class Documento{
    public function __construct(
        private $cota, 
        private $titulo,
        private $autor,
        private $fecha_presentacion,
        private $fecha_registro,
        private $cantidad
    ) {
    }
    
    public function get_data(){
        return get_object_vars($this);
    }

    public function get_datos(){
        echo '<p><strong>Cota:</strong> '. $this->cota .'</p>
                <p><strong>Titulo:</strong> '.  $this->titulo.'</p>
                <p><strong>Autor:</strong> '.  $this->autor.'</p>
                <p><strong>fecha_presentacion:</strong> '. $this->fecha_presentacion.'</p>
                <p><strong>Fecha de registro:</strong> '.   $this->fecha_registro.'</p>
                <p><strong>Cantidad:</strong> '.   $this->cantidad.'</p>';
    }
}
?>