<?php
	require_once "connect.php";
	
	// Initialize the session
	session_start();
	
	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
		header("location: login.php");
		exit;
	}
	
	$id = $_SESSION["cust_id"];
	$qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_id = '".$id."'");
	$result = mysqli_fetch_assoc($qry);
?>

<!DOCTYPE html>
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<p>Hello boss <?php echo $result["cust_fname"]; ?></p>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="edit_profile.php">Edit Profile</a></li>
			<li><a href="address_book.php">Address Book</a></li>
			<li><a href="consignment.php">Consignment</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		
		<h2>Consignment Form</h2>
		
		<form>
			<?php
				$qry_book = mysqli_query($conn, "SELECT * FROM book_address WHERE cust_id = '".$id."'");
				while($result_qry_book = mysqli_fetch_array($qry_book))
				{?>
				<label>Select Address Book:</label>
				<select id="add_book" onchange="selectbook()">
					<option>--Please Select--</option>
					<option value="<?php echo $result_qry_book["book_id"]; ?>"><?php echo $result_qry_book["book_name"]; ?></option>
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
			<input type="text" id="id" name="id" value="<?php echo $id; ?>">
			<input type="submit" onclick="new_consignment();return false;" value="Submit">
		</form>
		
		<div class="col-md-6">
			<div class="showQRCode"></div>
		</div>
		
		<script>
			function selectbook(){
				var add_book = document.getElementById("add_book").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_check_addressbook.php",
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
			
			function new_consignment(){
				alert("a");
				var id = document.getElementById("id").value;
				var r_name = document.getElementById("r_name").value;
				var r_phone = document.getElementById("r_phone").value;
				var r_address = document.getElementById("r_address").value;
				var r_postcode = document.getElementById("r_postcode").value;
				var r_state = document.getElementById("r_state").value;
				var p_method = document.getElementById("p_method").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_add_consignment.php",
					data: {
						'id' : id,
						'r_name' : r_name,
						'r_phone' : r_phone,
						'r_address' : r_address,
						'r_postcode' : r_postcode,
						'r_state' : r_state,
					'p_method' : p_method},
					dataType: "text",
					success: function(response){
						alert("yes");
						$(".showQRCode").html(response);  
					}
				});
				return false;
			}
		</script>
	</body>
</html>