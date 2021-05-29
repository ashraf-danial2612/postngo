<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$fname = mysqli_real_escape_string($conn, $_POST['fname']);
	$lname = mysqli_real_escape_string($conn, $_POST['lname']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);
	$address = mysqli_real_escape_string($conn, $_POST['address']);
	$postcode = mysqli_real_escape_string($conn, $_POST['postcode']);
	$state = mysqli_real_escape_string($conn, $_POST['state']);
	
	$query = "UPDATE book_address SET book_fname = '".$fname."', book_lname = '".$lname."', book_phone = '".$phone."',  book_address = '".$address."', book_postcode = '".$postcode."', book_state = '".$state."' WHERE book_id = '".$id."'";
	
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