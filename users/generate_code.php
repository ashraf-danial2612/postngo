<?php 
	include('library/phpqrcode/qrlib.php'); 
	$codesDir = "codes/";	
	$codeFile = date('d-m-Y-h-i-s').'.png';
	$formData = $_POST['content'];
	// generating QR code
	QRcode::png($formData, $codesDir.$codeFile, 'H', 6); 
	// display generated QR code
	echo '<img class="img-thumbnail" src="'.$codesDir.$formData.'" />';

?>