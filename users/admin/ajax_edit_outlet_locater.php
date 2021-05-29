<?php
	require_once "../connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$cname = mysqli_real_escape_string($conn, $_POST['cname']);
	$cemail = mysqli_real_escape_string($conn, $_POST['cemail']);
	$ccontact = mysqli_real_escape_string($conn, $_POST['ccontact']);
	$caddress = mysqli_real_escape_string($conn, $_POST['caddress']);
	$cpostcode = mysqli_real_escape_string($conn, $_POST['cpostcode']);
	$cstate = mysqli_real_escape_string($conn, $_POST['cstate']);
	
	$query = "UPDATE outlet_locater SET outlet_name = '".$cname."', outlet_email = '".$cemail."', outlet_contact = '".$ccontact."',  outlet_address = '".$caddress."', outlet_postcode = '".$cpostcode."', outlet_state = '".$cstate."' WHERE outlet_id = '".$id."'";
	
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