<?php

    require_once '../ruta.php';
    require_once ROOT_DIR . '/controlador/clases/fpdf.php';
    require ROOT_DIR . '/modelo/conexion.php';
    require_once ROOT_DIR . '/controlador/getInfo/carreras.php';
    require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';

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
    $pdf->cell($w, 10, 'Reporte de los estudiantes', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco

    $texto_largo = "La biblioteca ha experimentado un crecimiento constante en los últimos años, lo que se refleja en el aumento del número de usuarios registrados. Este informe presenta un análisis detallado de la composición de nuestra comunidad estudiantil, con el objetivo de identificar las tendencias emergentes y evaluar el impacto de las iniciativas implementadas para mejorar los servicios bibliotecarios. Al comprender mejor las necesidades y expectativas de nuestros usuarios, podemos adaptar nuestras estrategias y garantizar que la biblioteca siga siendo un espacio de aprendizaje y descubrimiento relevante para las futuras generaciones.";

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
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Carreras'),1,1,'C',1);
    $pdf->SetFont('Arial','',12);

    //abrimos una conexion para obtener la cantidad de cada carrera 
    $total = 0;
    require ROOT_DIR . '/modelo/conexion.php';

    foreach($carreras as $carrera){
        $num = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM estudiantes where id_carrera = ' . $carrera["id"] , $conexion);
        $total += $num;
        $pdf->Cell($w*0.2, 10, $num ,1,0,'C');
        $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1',$carrera["nombre"]),1,1,'C');
    }

    $pdf->SetFont('Arial','B',13);
    $pdf->Cell($w*0.2, 10, $total ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Total de estudiantes'),1,1,'C');
    //cerramos la conexion para liberar recursos 
    $conexion->close();

    $pdf->Output();
?>