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
	
	$query = "UPDATE consignment SET cons_fname = '".$r_fname."', cons_lname = '".$r_lname."', cons_phone = '".$r_phone."',  cons_address = '".$r_address."', cons_postcode = '".$r_postcode."', cons_state = '".$r_state."', cons_pay_method = '".$p_method."' WHERE cons_id = '".$id."'";
	
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