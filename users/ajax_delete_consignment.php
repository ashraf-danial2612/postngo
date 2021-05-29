<?php
	require_once "connect.php";
	
	$id = mysqli_real_escape_string($conn, $_POST['id']);
	$query = "DELETE FROM consignment WHERE cons_id = '".$id."'";
	
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