<?php
	require_once "connect.php";

	$name = mysqli_real_escape_string($conn, $_POST['outname']);
  $address = mysqli_real_escape_string($conn, $_POST['address']);
	$phone = mysqli_real_escape_string($conn, $_POST['phone']);



	$query = "INSERT INTO outlet_locater (outlet_name, outlet_address, outlet_contact)
		VALUES ('".$name."', '".$address."', '".$phone."')";

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
