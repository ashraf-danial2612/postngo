<?php 
	//include("fpdf/fpdf.php");
	include("pdf_barcode.php");
	require_once "connect.php";
	
	$id = $_GET['id'];
	$qry = mysqli_query($conn, "SELECT c.*, a.* FROM consignment c, customers a WHERE c.cons_reference_code = '".$id."' AND c.cust_id = a.cust_id");
	$result = mysqli_fetch_assoc($qry);
	
	
	$pdf= new PDF_Code39('P','mm',array(105,148));
	//$pdf= new PDF_Code39('P','mm','A6');
	$pdf->SetMargins(15,10,15);
	$pdf->AddPage();
	$pdf->Image('images/logo.png',30,-5,40,40,"png");
	
	$pdf->Line(10,50,190-95,50); 
	$pdf->Line(10,89,190-95,89); 
	$pdf->Ln(43);
	
	$pdf->Code39(13,26,'MY83775161669',1,15);
	$pdf->SetFont('Arial','B',10);
	//$pdf->Cell(0, 10, "Some text", 0, true, 'R');
	$pdf->Cell(0,5,'Sender Details',0,1,'C');
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',8);
	//$pdf->Cell(50,5,$result["cust_fname"]." ".$result["cust_lname"],0,0);
	//$pdf->Cell(20,5,'Pay Method:',0,1);	
	$pdf->MultiCell(40, 5,$result["cust_fname"]." ".$result["cust_lname"], 0, 'L', 0, 0, '', '', true);
	$pdf->MultiCell(40, 5,$result["cust_address"], 0, 'L', 0, 0, '', '', true);
	$pdf->MultiCell(40, 5,$result["cust_postcode"].", ".$result["cust_state"], 0, 'L', 0, 0, '', '', true);
	$pdf->MultiCell(40, 5,"No. Phone: ".$result["cust_phone"], 0, 'L', 0, 0, '', '', true);
	
	if($result["cons_pay_method"] == "Sender"){
		$pdf->Ln(-25);
		$pdf->Cell(50);
		$pdf->Write(5,date('d/m/Y'));
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'Payment Method:');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'Sender');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'Price: RM6.50');
	} 
	else{
		$pdf->Ln(-20);
		$pdf->Cell(50);
		$pdf->Write(5,"");
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'');
	}
	
	$pdf->Ln(16);
	$pdf->SetFont('Arial','B',10);
	//$pdf->Cell(0, 10, "Some text", 0, true, 'R');
	$pdf->Cell(0,5,'Recipient Details',0,1,'C');
	$pdf->Ln(3);

	$pdf->SetFont('Arial','',8);
	//$pdf->Cell(50,5,$result["cust_fname"]." ".$result["cust_lname"],0,0);
	//$pdf->Cell(20,5,'Pay Method:',0,1);	
	$pdf->MultiCell(40, 5,$result["cons_fname"]." ".$result["cons_lname"], 0, 'L', 0, 0, '', '', true);
	$pdf->MultiCell(40, 5,$result["cons_address"], 0, 'L', 0, 0, '', '', true);
	$pdf->MultiCell(40, 5,"No. Phone: ".$result["cons_phone"], 0, 'L', 0, 0, '', '', true);
	
	if($result["cons_pay_method"] == "Recipient"){
		$pdf->Ln(-20);
		$pdf->Cell(50);
		$pdf->Write(5,"Date: ".date('d/m/y'));
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'Payment Method:');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'Recipient');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'Price: RM6.50');
	}
	else {
		$pdf->Ln(-20);
		$pdf->Cell(50);
		$pdf->Write(5,'');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'');
		$pdf->Ln(5);
		$pdf->Cell(50);
		$pdf->Write(5,'');
	}
	
	//$pdf->Cell(50,5,$pdf->Image($qrcode, $pdf->GetX(), $pdf->GetY(), 20),0,0);

	$pdf->Output();
	
?>