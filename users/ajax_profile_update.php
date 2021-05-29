<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	
	$query = "UPDATE customers SET cust_fname = '".$fname."', cust_lname = '".$lname."', cust_email = '".$email."', cust_phone = '".$phone."',  cust_address = '".$address."', cust_postcode = '".$postcode."', cust_state = '".$state."' WHERE cust_id = '".$id."'";
	
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