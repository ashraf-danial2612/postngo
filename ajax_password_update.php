<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$query = "UPDATE customers SET cust_password = '".$password."' WHERE cust_id = '".$id."'";
	
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