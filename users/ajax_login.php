<?php
	require_once "connect.php";
	
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$password = mysqli_real_escape_string($conn, $_POST['password']);
	
	$qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_email = '".$email."' AND cust_password = '".$password."'");
	$result = mysqli_fetch_assoc($qry);
	if ($result > 0) 
    {
		session_start();
		$_SESSION["loggedin"] = true;
        $_SESSION["cust_id"] = $result["cust_id"];
		echo "success";
	}
	else{
		echo "fail";
	}
?>