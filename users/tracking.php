
<!DOCTYPE html>
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<h2>Tracking Form</h2>
		
		<form>
			<label>Reference Code:</label>
			<input type="text" id="ref" name="ref"><br><br>
			<input type="submit" onclick="tracking_function();return false;" value="Submit">
		</form>
		
		<div id="tracking_result" style="display:none;">
			<h2>Reference Code Result:</h2>
			<p id="result_cons_reference_code"></p>
			
			<h2>Recipient Name:</h2>
			<p id="result_cons_fname"></p>
			
			<h2>Payment Method:</h2>
			<p id="result_cons_pay_method"></p>
			
			<h2>Status:</h2>
			<p id="result_cons_status"></p>
			
			<h2>Date & Time:</h2>
			<p id="result_cons_datetime"></p>
		</div>
		
		<script>
			function tracking_function() {
				var ref = document.getElementById("ref").value;
				alert(ref);
				
				$.ajax({
					type: "POST",
					url: "ajax_tracking.php",
					data: {
					'ref' : ref},
					dataType: "json",
					success: function(data){						
						var result_cons_reference_code = data.tracking_result1;
						var result_cons_fname = data.tracking_result2;
						var result_cons_pay_method = data.tracking_result3;
						var result_cons_status = data.tracking_result4;
						var result_cons_datetime = data.tracking_result5;
						
						document.getElementById("result_cons_reference_code").innerHTML = result_cons_reference_code;
						document.getElementById("result_cons_fname").innerHTML = result_cons_fname;
						document.getElementById("result_cons_pay_method").innerHTML = result_cons_pay_method;
						document.getElementById("result_cons_status").innerHTML = result_cons_status;
						document.getElementById("result_cons_datetime").innerHTML = result_cons_datetime;
						
						document.getElementById("tracking_result").style.display = "block";
					}
				});
				return false;
			}
		</script>
	</body>
</html>