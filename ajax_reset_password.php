<?php
	require_once "connect.php";
	
	$reset_email = mysqli_real_escape_string($conn, $_POST['reset_email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$query = "UPDATE customers SET cust_password = '".$password."' WHERE cust_email = '".$reset_email."'";
	
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