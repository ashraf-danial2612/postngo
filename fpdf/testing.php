<?php
	
include("../connect.php");
include("../fpdf/fpdf.php");  
is_admin_login();

$sel_country = "SELECT * from tbl_client WHERE client_id=1";
$country = mysql_query($sel_country);
$row = mysql_fetch_array($country)	
	
echo "I/We, ".$row['client_name']." (NRIC No. 910808-06- 5361) of E-2- 10, Pangsapuri Sri
?>