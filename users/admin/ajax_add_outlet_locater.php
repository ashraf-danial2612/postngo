<?php
	require_once "../connect.php";
	
	$cname = mysqli_real_escape_string($conn, $_POST['cname']);
	$cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
	$ccontact = mysqli_real_escape_string($conn, $_POST['ccontact']);
	$caddress = mysqli_real_escape_string($conn, $_POST['caddress']);
	$cpostcode = mysqli_real_escape_string($conn, $_POST['cpostcode']);
	$cstate = mysqli_real_escape_string($conn, $_POST['cstate']);
	
	$query = "INSERT INTO outlet_locater (outlet_name, outlet_email, outlet_contact, outlet_address, outlet_postcode, outlet_state) 
		VALUES ('".$cname."', '".$cemail."', '".$ccontact."', '".$caddress."', '".$cpostcode."', '".$cstate."')";
	
	$result = mysqli_query($conn, $query);
	if($result)
	{
		echo "success";
	}
	else
	{
		echo "fail";
	}
?>