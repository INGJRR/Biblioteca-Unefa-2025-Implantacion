<?php

    require_once '../ruta.php';
    require_once ROOT_DIR . '/controlador/clases/fpdf.php';
    require ROOT_DIR . '/modelo/conexion.php';
    require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';


    $docente = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM profesores', $conexion);
    $obreros = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM obreros', $conexion);


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
    $pdf->cell($w, 10, 'Reporte del persona unefa', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco

    $texto_largo = "La colaboración entre el personal docente y obrero es fundamental para el buen funcionamiento de una biblioteca. Este informe explora las dinámicas de interacción entre estos dos grupos, identificando las áreas en las que la colaboración es más fuerte y aquellas en las que se pueden mejorar los procesos. Al fomentar una mayor colaboración y comunicación, podemos crear un ambiente de trabajo más positivo y productivo, lo que se traducirá en una mejora en la calidad de los servicios bibliotecarios.";

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
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Areas de trabajo'),1,1,'C',1);
    $pdf->SetFont('Arial','',12);
    $pdf->Cell($w*0.2, 10, $docente ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Docentes'),1,1,'C');
    $pdf->Cell($w*0.2, 10, $obreros ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Personal Administrativo'),1,1,'C');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell($w*0.2, 10, $docente + $obreros ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Total personal unefa'),1,1,'C');



    $pdf->mostrar_cabecera = false;
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Docente'), 0, 1, 'C');
    
    //obtenemos los datos

    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/profesor.php';
     
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = count($profesores);

    foreach($profesores as $personal_unefa){
        require ROOT_DIR . '/componentes/personal_unefaPdf.php';
        if ($contador != $totalElementos) {
            $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
        }
        $contador++;
    }

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Personal Administrativo'), 0, 1, 'C');
    
    //obtenemos los datos

    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/obreros.php';
     
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = count($obreros);

    foreach($obreros as $personal_unefa){
        require ROOT_DIR . '/componentes/personal_unefaPdf.php';
        if ($contador != $totalElementos) {
            $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
        }
        $contador++;
    }




    $pdf->Output();
?>