<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	
	$query = "INSERT INTO book_address (cust_id, book_fname, book_lname, book_phone, book_address, book_postcode, book_state) 
		VALUES ('".$id."', '".$fname."', '".$lname."', '".$phone."', '".$address."', '".$postcode."', '".$state."')";
	
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