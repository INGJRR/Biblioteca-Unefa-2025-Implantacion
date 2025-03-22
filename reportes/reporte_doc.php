<?php
     require_once '../ruta.php';
 
    //proteccion de rutas
    session_start();

    if (empty($_SESSION['cedula']) and empty($_SESSION['usuario'])) {
        header('location: ../index.php');
    };

    require_once ROOT_DIR . '/controlador/clases/fpdf.php';
    require ROOT_DIR . '/modelo/conexion.php';
    require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';

    //vamos a obtener todos los datos necesarios para realizar el informe

    $num_ti = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM trabajos_investigacion', $conexion);
    $num_li = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM libros', $conexion);
    $num_sv = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM servicio_comunitario', $conexion);
    $num_pasantias = obtener_cantidad_base_dato('SELECT COUNT(*) AS cantidad FROM pasantias', $conexion);
    $total = $num_li + $num_ti + $num_sv + $num_pasantias;

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
    $pdf->cell($w, 10, 'Reporte de los documentos', 0, 1, 'C');

    $pdf->SetFont('Arial', '', 13);
    $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco

    $texto_largo = "Nuestro repositorio documental, con un total de $total registros, es un reflejo de la actividad académica y social de nuestra institución. Esta vasta colección se compone de $num_li libros, que sirven como base para la formación de nuestros estudiantes. Asimismo, contamos con $num_ti trabajos de investigación, que contribuyen al avance del conocimiento en diversas áreas. Los $num_pasantias trabajos de pasantías y los $num_sv trabajos de servicio comunitario, por su parte, evidencian la aplicación práctica de los conocimientos adquiridos y nuestro compromiso con la sociedad. En conjunto, este patrimonio documental es una herramienta fundamental para el desarrollo de nuestra comunidad.";

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
    $pdf->Cell($w*0.2, 10, $num_sv,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Servicio comunitario'),1,1,'C');
    $pdf->Cell($w*0.2, 10, $num_pasantias,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Pasantias'),1,1,'C');
    $pdf->SetFont('Arial','B',13);
    $pdf->Cell($w*0.2, 10, $total ,1,0,'C');
    $pdf->Cell($w*0.8, 10, iconv('UTF-8', 'ISO-8859-1','Total de documentos'),1,1,'C');
    
    $pdf->mostrar_cabecera = false;
    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Información detallada de todos los libros'), 0, 1, 'C');
    
    //obtenemos los datos de los libros

    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/libro.php';
     
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = count($libros);

    foreach($libros as $libro){
        require ROOT_DIR . '/componentes/libroPdf.php';
        if ($contador != $totalElementos) {
            $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
        }
        $contador++;
    }




    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Información detallada de todos los Trabajos de investigación'), 0, 1, 'C');
    
    //obtenemos los datos de los libros

    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/ti.php';
     
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = count($tis);

    foreach($tis as $ti){
        require ROOT_DIR . '/componentes/tiPdf.php';
        if ($contador != $totalElementos) {
            $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
        }
        $contador++;
    }


    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Información detallada de todos los Trabajos de Servicio comunitario'), 0, 1, 'C');
    
    //obtenemos los datos de los libros
 
    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/sc.php';
     
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = count($servicios_comunitarios);

    foreach($servicios_comunitarios as $sc){
        require ROOT_DIR . '/componentes/scPdf.php';
        if ($contador != $totalElementos) {
            $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
        }
        $contador++;
    }

    $pdf->AddPage();

    $pdf->SetFont('Arial', 'B', 15);
    $pdf->SetTextColor(0, 0, 255); // Color azul
    $pdf->cell($w, 10,iconv('UTF-8', 'ISO-8859-1','Información detallada de todos los Trabajos de pasantía'), 0, 1, 'C');
    
    //obtenemos los datos de los libros
 
    require ROOT_DIR . '/modelo/conexion.php';
    require ROOT_DIR . '/controlador/getInfo/pasantia.php';
     
    $pdf->SetTextColor(0, 0, 0); // Color negro

    $contador = 1;
    $totalElementos = count($pasantias);

    foreach($pasantias as $pa){
        require ROOT_DIR . '/componentes/pasantiaPdf.php';
        if ($contador != $totalElementos) {
            $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
        }
        $contador++;
    }
    $pdf->Output();
?>