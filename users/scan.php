<!DOCTYPE html>
<html>
	<head>
		<title>Instascan</title>
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>	
	</head>
	<body>
		<input type="submit" onclick="scan_function();return false;" value="Scan Here">
		
		<div id="camera" style="display:none;">
			<video id="preview"></video>
		</div>
		
		<div id="qr_result" style="display:none;">
			<h2 id="check_ref"></h2>
			
			<h2>Sender Details</h2>
			<p id="result_cust_fname"></p>
			<p id="result_cust_lname"></p>
			<p id="result_cust_address"></p>
			<p id="result_cust_postcode"></p>
			<p id="result_cust_state"></p>
			<p id="result_cust_phone"></p>
			
			<h2>Recipient Details</h2>
			<p id="result_cons_name"></p>
			<p id="result_cons_address"></p>
			<p id="result_cons_postcode"></p>
			<p id="result_cons_state"></p>
			<p id="result_cons_phone"></p>
			
			<h2>Payment Method</h2>
			<p id="result_cons_pay_method"></p>
			
			<form>
				<input type="text" id="submit_ref" name="submit_ref">
				<input type="submit" onclick="print_consignment();return false;" value="Submit">
			</form>

		</div>
		
		<script>
			function scan_function() {
				document.getElementById("camera").style.display = "block";
			}
			
			let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
			}
			);
			scanner.addListener('scan', function(content) {
				var check_ref = content;
				
				alert(check_ref);
				$.ajax({
					type: "POST",
					url: "ajax_check_consignment.php",
					data: {
					'check_ref' : check_ref},
					dataType: "json",
					success: function(data){						
						var result_cust_fname = data.cust_result1;
						var result_cust_lname = data.cust_result2;
						var result_cust_address = data.cust_result3;
						var result_cust_postcode = data.cust_result4;
						var result_cust_state = data.cust_result5;
						var result_cust_phone = data.cust_result6;
						
						var result_cons_name = data.cons_result1;
						var result_cons_address = data.cons_result2;
						var result_cons_postcode = data.cons_result3;
						var result_cons_state = data.cons_result4;
						var result_cons_phone = data.cons_result5;
						var result_cons_pay_method = data.cons_result6;
						
						document.getElementById("check_ref").innerHTML = check_ref;
						document.getElementById("submit_ref").value = check_ref;
						
						document.getElementById("result_cust_fname").innerHTML = result_cust_fname;
						document.getElementById("result_cust_lname").innerHTML = result_cust_lname;
						document.getElementById("result_cust_address").innerHTML = result_cust_address;
						document.getElementById("result_cust_postcode").innerHTML = result_cust_postcode;
						document.getElementById("result_cust_state").innerHTML = result_cust_state;
						document.getElementById("result_cust_phone").innerHTML = result_cust_phone;
						
						document.getElementById("result_cons_name").innerHTML = result_cons_name;
						document.getElementById("result_cons_address").innerHTML = result_cons_address;
						document.getElementById("result_cons_postcode").innerHTML = result_cons_postcode;
						document.getElementById("result_cons_state").innerHTML = result_cons_state;
						document.getElementById("result_cons_phone").innerHTML = result_cons_phone;
						document.getElementById("result_cons_pay_method").innerHTML = result_cons_pay_method;
						
						document.getElementById("qr_result").style.display = "block";
						document.getElementById("camera").style.display = "none";
					}
				});
				return false;
			});
			Instascan.Camera.getCameras().then(cameras => 
			{
				if(cameras.length > 0){
					scanner.start(cameras[0]);
					} else {
					console.error("Camera not exist");
				}
			});
			
			function print_consignment() {
				var submit_ref = document.getElementById("submit_ref").value;
				location.href = "consignment_details.php?id="+submit_ref;
			}
		</script>
		
	</body>
</html>