<?php
    require('fpdf/fpdf.php');


    $pdf = new FPDF();

    $pdf->AddPage();
    $pdf->SetFont('Arial', '', 10);
	
    $pdf->Cell(40, 10, 'Pleaseee do come back to us if you have any queries whatsoever relating to the above quotation or if you would like');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, 'to discuss further options.');
    $pdf->Ln(8);
    $pdf->Cell(40, 10, 'We look forward to hearing from you in the near future.');
    $pdf->Ln(8);
    $pdf->Cell(40, 10, 'With best wishes,');
    $pdf->Ln(4);
    $pdf->Cell(40, 10, 'Business Ltd.');
	$pdf->SetMargins(28,10,15);
	$pdf->Ln(15);
	$pdf->SetFont('times','',11);
	//$pdf->Image('codes/MY461631612003012',60,30,90,0,'PNG');
	
    $pdf->Output();
    $content = $pdf->Output('('. date("m") .'-'. date("Y") .') WQ'. rand() .'.pdf', 'F');
?>