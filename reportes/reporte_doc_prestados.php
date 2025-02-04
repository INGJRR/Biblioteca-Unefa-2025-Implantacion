<?php

    require_once '../ruta.php';
    require_once ROOT_DIR . '/controlador/clases/fpdf.php';
    require ROOT_DIR . '/modelo/conexion.php';
    require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';

    //vamos a obtener todos los datos necesarios para realizar el informe

    $num_li = obtener_cantidad_base_dato("SELECT COUNT(*) AS cantidad FROM prestamos WHERE estado = 'Prestado' AND tipo_documento = 'Libro'", $conexion);

    $num_ti = obtener_cantidad_base_dato("SELECT COUNT(*) AS cantidad FROM prestamos WHERE estado = 'Prestado' AND tipo_documento = 'Trabajo de investigacion'", $conexion);
    $num_sc = obtener_cantidad_base_dato("SELECT COUNT(*) AS cantidad FROM prestamos WHERE estado = 'Prestado' AND tipo_documento = 'Servicio comunitario'", $conexion);
    $num_pa = obtener_cantidad_base_dato("SELECT COUNT(*) AS cantidad FROM prestamos WHERE estado = 'Prestado' AND tipo_documento = 'Pasantia'", $conexion);
    $total = $num_li + $num_ti + $num_sc + $num_pa;

    //cerramos la conexion para liberar recursos 
    $conexion->close();

    // Creación del objeto de la clase PDF
    $pdf = new PDF('P', 'mm', 'A4');;
    $pdf->AliasNbPages();
    $pdf->AddPage();
    // Obtener el ancho de la página
    $w = $pdf->GetPageWidth() - 2 * 10;
    // Resto de tu código para generar el contenido del PDF
    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->Cell(0, 20, '', 0, 1); // Agrega otra línea en blanco
    $pdf->cell($w, 10, 'Reporte de los documentos prestados', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco

    $texto_largo = "";

    $texto_largo = iconv('UTF-8', 'ISO-8859-1', $texto_largo);

    $pdf->SetTextColor(0, 0, 0); // Color negro
    // Crear una celda con un ancho específico y ajustar el texto
    // Ancho: 0 (ocupa todo el ancho), altura: 5 (ajustable), texto, borde, alineación
    $pdf->MultiCell(0, 10, $texto_largo); 

    $pdf->SetFillColor(210,57,57);
    // $pdf->SetDrawColor(255, 255, 255);

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell(0, 5, '', 0, 1); // Agrega otra línea en blanco
    $pdf->Cell($w*0.2, 10, iconv('UTF-8', 'ISO-8859-1','N°'),1,0,'C',1);
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Tipo de documento'),1,1,'C',1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell($w*0.2, 10, $num_li,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Libros'),1,1,'C');
    $pdf->Cell($w*0.2, 10, $num_ti ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Trabajos de investigación'),1,1,'C');
    $pdf->Cell($w*0.2, 10, $num_sc,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Servicio comunitario'),1,1,'C');
    $pdf->Cell($w*0.2, 10, $num_pa,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Pasantias'),1,1,'C');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell($w*0.2, 10, $total ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Total de documentos'),1,1,'C');


    $pdf->mostrar_cabecera = false;
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Libros'), 0, 1, 'C');
    
    //obtenemos los datos de los libros

    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/doc_prestado.php';
    require_once ROOT_DIR . '/funciones/verificarFecha.php';
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = $num_li;
 
    foreach($doc_prestados as $doc_prestado_obj){
        if($doc_prestado_obj["tipo_documento"] == 'Libro'){
            require ROOT_DIR . '/componentes/docPrestadoPdf.php';
            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
    }

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Servicio Comunitario'), 0, 1, 'C');
    
    //obtenemos los datos de los libros

    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = $num_sc;
 
    foreach($doc_prestados as $doc_prestado_obj){
        if($doc_prestado_obj["tipo_documento"] == 'Servicio comunitario'){
            require ROOT_DIR . '/componentes/docPrestadoPdf.php';
            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
    }

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Pasantia'), 0, 1, 'C');
    
    //obtenemos los datos de los libros

    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = $num_pa;
 
    foreach($doc_prestados as $doc_prestado_obj){
        if($doc_prestado_obj["tipo_documento"] == 'Pasantia'){
            require ROOT_DIR . '/componentes/docPrestadoPdf.php';
            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
    }

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Trabajo de investigación'), 0, 1, 'C');
     
    //obtenemos los datos de los libros

    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = $num_ti;
 
    foreach($doc_prestados as $doc_prestado_obj){
        if($doc_prestado_obj["tipo_documento"] == 'Trabajo de investigacion'){
            require ROOT_DIR . '/componentes/docPrestadoPdf.php';
            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
    }



    $pdf->Output();
?>