<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$r_fname = mysqli_real_escape_string($conn, $_POST['r_fname']);
	$r_lname = mysqli_real_escape_string($conn, $_POST['r_lname']);
	$r_phone = mysqli_real_escape_string($conn, $_POST['r_phone']);
	$r_address = mysqli_real_escape_string($conn, $_POST['r_address']);
	$r_postcode = mysqli_real_escape_string($conn, $_POST['r_postcode']);
	$r_state = mysqli_real_escape_string($conn, $_POST['r_state']);
	$p_method = mysqli_real_escape_string($conn, $_POST['p_method']);
	
	$status = "Pending";
	$created_date = date('Y-m-d H:i:s');
	
	$number = "MY".rand(10,99);
	$t=time();
	$random = $number.''.$t;
	
	$query = "INSERT INTO consignment (cust_id, cons_fname, cons_lname, cons_phone, cons_address, cons_postcode, cons_state, cons_pay_method, cons_status, cons_reference_code, cons_datetime) 
	VALUES ('".$id."', '".$r_fname."', '".$r_lname."', '".$r_phone."', '".$r_address."', '".$r_postcode."', '".$r_state."', '".$p_method."', '".$status."', '".$random."', '".$created_date."')";
	
	$result = mysqli_query($conn, $query);
	if($result)
	{
		mysqli_query($conn,"INSERT INTO tracking (tracking_reference_code, tracking_fname, tracking_status, tracking_datetime) VALUES ('".$random."', '".$r_fname."', '".$status."', '".$created_date."')");
		
		include('library/phpqrcode/qrlib.php'); 
		$codesDir = "codes/";	
		$formData = $random;
		$codeFile = $formData.'.png';
		// generating QR code
		QRcode::png($formData, $codesDir.$codeFile, 'H', 6); 
		// display generated QR code
		//echo '<img class="img-thumbnail" src="'.$codesDir.$codeFile.'" />';
		$data = array(
		"result" 			=> $codesDir,
		"result1" 			=> $codeFile
		);
	}
	else
	{
		echo "fail";
	}
	echo json_encode($data);
?>