<?php
	require_once "connect.php";
	
	$add_book = mysqli_real_escape_string($conn, $_POST['add_book']);
	
	$qry = mysqli_query($conn, "SELECT * FROM book_address WHERE book_id = '".$add_book."'");
	$result = mysqli_fetch_assoc($qry);
	if ($result > 0) 
    {
		//echo $result["outlet_contact"];
		$data = array(
		
				"result" 			=> $result["book_name"],
				"result2" 			=> $result["book_phone"],
				"result3" 			=> $result["book_address"],
				"result4" 			=> $result["book_postcode"],
				"result5" 			=> $result["book_state"]
			);
	}
	else{
		echo "fail";
	}
	
	echo json_encode($data);
?>
