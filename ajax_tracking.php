<?php
	require_once "connect.php";

	$ref = mysqli_real_escape_string($conn, $_POST['ref']);

	$qry = mysqli_query($conn, "SELECT * FROM consignment WHERE cons_reference_code = '".$ref."'");
	$result = mysqli_fetch_assoc($qry);
	if ($result > 0)
    {
		$data = array(
				"tracking_result1" 			=> $result["cons_reference_code"],
				"tracking_result2" 			=> $result["cons_fname"],
				"tracking_result4" 			=> $result["cons_status"],
				"tracking_result5" 			=> $result["cons_datetime"]
			);
	}
	else{
		echo "fail";
	}

	echo json_encode($data);
?>
