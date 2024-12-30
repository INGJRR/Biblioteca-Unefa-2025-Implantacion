<?php
header('Content-Type: text/html; charset=utf-8');
require(ROOT_DIR . '/fpdf/fpdf.php');
date_default_timezone_set('America/Caracas');


class PDF extends FPDF
{
    // Cabecera de página
    function Header()
    {
        // Logo
        $this->Image(ROOT_DIR . '/imagenes/unefa-logo-3FC9336783-seeklogo.com.png', 10, 8, 33); // Reemplaza 'logo_unefa.png' con la ruta a tu imagen

        // tutulo
        $this->SetFont('Arial', 'B', 15);
        $this->Cell(0, 10, '', 0, 1, 'C');
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'República Bolivariana de Venezuela'), 0, 1, 'C');
        $this->Cell(0, 10, 'Ministerio del Poder Popular para la Defensa', 0, 1, 'C');
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Viceministerio de Educación para la Defensa'), 0, 1, 'C');
        $this->Cell(0, 10, iconv('UTF-8', 'ISO-8859-1', 'Universidad Nacional Experimental Politécnica'), 0, 1, 'C');
        $this->Cell(0, 10, 'de la Fuerza Armada Nacional Bolivariana', 0, 1, 'C');

        $this->Image(ROOT_DIR . '/imagenes/unefa-logo-3FC9336783-seeklogo.com.png', 170, 8, 33); // Reemplaza 'logo_unefa.png' con la ruta a tu imagen
    }

    function Footer(){
        $this->SetFont('helvetica', 'B', 8);
        $this->SetY(-15);
        $this->Cell(95, 5, iconv('UTF-8', 'ISO-8859-1','Página ') . $this->PageNo() . ' / {nb}', 0, 0, 'L');
        $this->Cell(95, 5, date('d/m/Y | g:i:a'), 00, 1, 'R');
        $this->Line(10, 287, 200, 287);
        $this->Cell(0, 5, iconv('UTF-8', 'ISO-8859-1',"Biblioteca Luis Beltran Prieto Figueroa © Todos los derechos reservados."), 0, 0, "C");
    }
}
