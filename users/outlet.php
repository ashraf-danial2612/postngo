<!DOCTYPE html>
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<h2>Outlet Locater</h2>
		
		<form>
			<?php
				require_once "connect.php";
				
				$qry = mysqli_query($conn, "SELECT * FROM book_address WHERE cust_id = 1");
				while($result_qry = mysqli_fetch_array($qry))
				{?>
				<label>Select Address Book:</label>
				<select id="add_book" onchange="selectbook()">
					<option>--Please Select--</option>
					<option value="<?php echo $result_qry["book_id"]; ?>"><?php echo $result_qry["book_name"]; ?></option>
				</select><br><br>
				<?php 
				} 
			?>
			<label>Recipient Name:</label>
			<input type="text" id="r_name" name="r_name"><br><br>
			<label>No. Phone:</label>
			<input type="text" id="r_phone" name="r_phone"><br><br>
			<label>Address:</label>
			<input type="text" id="r_address" name="r_address"><br><br>
			<label>Postcode:</label>
			<input type="text" id="r_postcode" name="r_postcode"><br><br>
			<label>State:</label>
			<input type="text" id="r_state" name="r_state"><br><br>
			<label>Payment Method:</label>
			<select name="p_method" id="p_method">
				<option>--Please Select--</option>
				<option value="Sender">Sender</option>
				<option value="Recipient">Recipient</option>
			</select><br><br>
			<input type="submit" onclick="new_consignment();return false;" value="Submit">
		</form>
		
		<script>
			function selectbook(){
				var add_book = document.getElementById("add_book").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_outlet.php",
					data: {
					'add_book' : add_book},
					dataType: "json",
					success: function(data){
						var r_name = data.result;
						var r_phone = data.result2;
						var r_address = data.result3;
						var r_postcode = data.result4;
						var r_state = data.result5;
						document.getElementById("r_name").value = r_name;
						document.getElementById("r_phone").value = r_phone;
						document.getElementById("r_address").value = r_address;
						document.getElementById("r_postcode").value = r_postcode;
						document.getElementById("r_state").value = r_state;
					}
				});
				return false;
			}
		</script>
	</body>
</html>
