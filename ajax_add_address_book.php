<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$name = mysqli_real_escape_string($conn, $_POST['name']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	
	$query = "INSERT INTO book_address (cust_id, book_name, book_phone, book_address, book_postcode) 
		VALUES ('".$id."', '".$name."', '".$phone."', '".$address."', '".$postcode."')";
	
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