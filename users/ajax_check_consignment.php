<?php
	require_once "connect.php";
	
	$check_ref = mysqli_real_escape_string($conn, $_POST['check_ref']);
	
	$qry = mysqli_query($conn, "SELECT c.*, a.* FROM consignment c, customers a WHERE c.cons_reference_code = '".$check_ref."' AND c.cust_id = a.cust_id");
	$result = mysqli_fetch_assoc($qry);
	if ($result > 0) 
    {
		//echo $result["outlet_contact"];
		$data = array(
				"cust_result1" 			=> $result["cust_fname"],
				"cust_result2" 			=> $result["cust_lname"],
				"cust_result3" 			=> $result["cust_address"],
				"cust_result4" 			=> $result["cust_postcode"],
				"cust_result5" 			=> $result["cust_state"],
				"cust_result6" 			=> $result["cust_phone"],
				
				"cons_result1" 			=> $result["cons_fname"],
				"cons_result2" 			=> $result["cons_address"],
				"cons_result3" 			=> $result["cons_postcode"],
				"cons_result4" 			=> $result["cons_state"],
				"cons_result5" 			=> $result["cons_phone"],
				"cons_result6" 			=> $result["cons_pay_method"]
			);
	}
	else{
		echo "fail";
	}
	
	echo json_encode($data);
?>
