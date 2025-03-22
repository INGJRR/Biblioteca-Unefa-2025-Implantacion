<?php
    require_once '../ruta.php';
    require_once ROOT_DIR . '/controlador/clases/fpdf.php';
    require ROOT_DIR . '/modelo/conexion.php';
    require_once ROOT_DIR . '/funciones/cantidad_registros_tabla.php';
    
    //cerramos la conexion para liberar recursos 
    

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
    $pdf->cell($w, 10, 'Reporte de los morosos', 0, 1, 'C');

    $pdf->SetTextColor(0, 0, 0); // Color azul

    $pdf->mostrar_cabecera = false;
    
    $pdf->cell($w, 10, 'Estudiantes', 0, 1, 'C');

    $sql = "SELECT * FROM estudiantes WHERE moroso = 1";
    $result = $conexion->query($sql);

    $estudiantes = array(); // Inicializa un array vacío para guardar los estudiantes
    
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $estudiantes[] = $row;
    }
    } else {
        // echo "No se encontraron estudiantes morosos.";
    }
    
    if (count($estudiantes) > 0) {
        // echo "Se encontraron " . count($estudiantes) . " estudiantes morosos.<br>";
        // Puedes realizar otras acciones con el array de estudiantes aquí
        $contador = 1;
        $totalElementos = count($estudiantes);
        foreach ($estudiantes as $estudiante) {
            require ROOT_DIR . '/componentes/estudiantePdf.php';
            $pdf->cell($w, 10, 'Lista de documentos', 0, 1, 'C');

            $cedula = $estudiante["cedula"];

            $sql = "SELECT * FROM Prestamos WHERE estado = 'Prestado' AND cedula_persona = '$cedula'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Guarda cada préstamo en el array
                    require ROOT_DIR . '/componentes/prestamoPdf.php';
                    $pdf->Cell(0, 5, '', 0, 1); // Agrega otra línea en blanco    

                }
            }

            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
      } else {
        // echo "No hay estudiantes morosos para mostrar.";
      }




    $pdf->AddPage();

    $pdf->SetTextColor(0, 0, 0); // Color 
    
    $pdf->cell($w, 10, 'Docentes', 0, 1, 'C');

    $sql = "SELECT * FROM profesores WHERE moroso = 1";
    $result = $conexion->query($sql);

    $profesores = array(); // Inicializa un array vacío para guardar los estudiantes
    
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $profesores[] = $row;
    }
    } else {
        // echo "No se encontraron estudiantes morosos.";
    }
    
    if (count($profesores) > 0) {
        // echo "Se encontraron " . count($estudiantes) . " estudiantes morosos.<br>";
        // Puedes realizar otras acciones con el array de estudiantes aquí
        $contador = 1;
        $totalElementos = count($profesores);
        foreach ($profesores as $personal_unefa) {
            require ROOT_DIR . '/componentes/personal_unefaPdf.php';
            $pdf->cell($w, 10, 'Lista de documentos', 0, 1, 'C');

            $cedula = $personal_unefa["cedula"];

            $sql = "SELECT * FROM Prestamos WHERE estado = 'Prestado' AND cedula_persona = '$cedula'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Guarda cada préstamo en el array
                    require ROOT_DIR . '/componentes/prestamoPdf.php';
                    $pdf->Cell(0, 5, '', 0, 1); // Agrega otra línea en blanco    

                }
            }

            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
      } else {
        // echo "No hay estudiantes morosos para mostrar.";
      }

    $pdf->AddPage();

    $pdf->SetTextColor(0, 0, 0); // Color 
    
    $pdf->cell($w, 10, 'Personal administrativo', 0, 1, 'C');

    $sql = "SELECT * FROM obreros WHERE moroso = 1";
    $result = $conexion->query($sql);

    $obreros = array(); // Inicializa un array vacío para guardar los estudiantes
    
    if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        $obreros[] = $row;
    }
    } else {
        // echo "No se encontraron estudiantes morosos.";
    }
    
    if (count($obreros) > 0) {
        // echo "Se encontraron " . count($estudiantes) . " estudiantes morosos.<br>";
        // Puedes realizar otras acciones con el array de estudiantes aquí
        $contador = 1;
        $totalElementos = count($obreros);
        foreach ($obreros as $personal_unefa) {
            require ROOT_DIR . '/componentes/personal_unefaPdf.php';
            $pdf->cell($w, 10, 'Lista de documentos', 0, 1, 'C');

            $cedula = $personal_unefa["cedula"];

            $sql = "SELECT * FROM Prestamos WHERE estado = 'Prestado' AND cedula_persona = '$cedula'";
            $result = $conexion->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                    // Guarda cada préstamo en el array
                    require ROOT_DIR . '/componentes/prestamoPdf.php';
                    $pdf->Cell(0, 5, '', 0, 1); // Agrega otra línea en blanco    

                }
            }

            if ($contador != $totalElementos) {
                $pdf->Cell(0, 10, '', 0, 1); // Agrega otra línea en blanco    
            }
            $contador++;
        }
      } else {
        // echo "No hay estudiantes morosos para mostrar.";
      }
    $pdf->Output();
?>