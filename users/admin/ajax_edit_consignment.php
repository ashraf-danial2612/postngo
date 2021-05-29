<?php
	require_once "../connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$status = mysqli_real_escape_string($conn, $_POST['status']);
	$t_reference = mysqli_real_escape_string($conn, $_POST['t_reference']);
	$t_fname = mysqli_real_escape_string($conn, $_POST['t_fname']);
	$created_date = date('Y-m-d H:i:s');
	
	
	$query = "UPDATE consignment SET cons_status = '".$status."' WHERE cons_id = '".$id."'";
	
	$result = mysqli_query($conn, $query);
	if($result)
	{
		mysqli_query($conn,"INSERT INTO tracking (tracking_reference_code, tracking_fname, tracking_status, tracking_datetime) VALUES ('".$t_reference."', '".$t_fname."', '".$status."', '".$created_date."')");
		echo "success";
	}
	else
	{
		echo "fail";
	}
?>