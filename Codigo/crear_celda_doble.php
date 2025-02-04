<?php

    $pdf->SetFillColor(210,57,57);
    $pdf->SetFont('Arial','B',12);
    $pdf->Cell(0, 1, '', 0, 1); // Agrega otra línea en blanco
    $pdf->Cell($w*0.4, 7, iconv('UTF-8', 'ISO-8859-1', $titulo_one),1,0,'C',1);
    $pdf->SetFillColor(255,255,255);
    $pdf->Cell($w*0.6, 7, iconv('UTF-8', 'ISO-8859-1', $value_two),1,1,'C',1);
?>