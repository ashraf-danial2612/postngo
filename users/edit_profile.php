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
<html lang="en">
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
		
		<h2>Login Form</h2>	
		<form>
			<label>First Name:</label>
			<input type="text" id="fname" name="fname" value="<?php echo $result['cust_fname']; ?>"><br><br>
			<label>Last Name:</label>
			<input type="text" id="lname" name="lname" value="<?php echo $result['cust_lname']; ?>"><br><br>
			<label>Email Address:</label>
			<input type="text" id="email" name="email" value="<?php echo $result['cust_email']; ?>"><br><br>
			<label>No. Phone:</label>
			<input type="text" id="phone" name="phone" value="<?php echo $result['cust_phone']; ?>"><br><br>
			<label>Address:</label>
			<input type="text" id="address" name="address" value="<?php echo $result['cust_address']; ?>"><br><br>
			<input type="hidden" id="id" name="id" value="<?php echo $result['cust_id']; ?>">
			<input type="submit" onclick="profile_update_function();return false;" value="Submit">
		</form>
		
		<h2>Password Form</h2>
		<form>
			<label>Password:</label>
			<input type="text" id="password" name="password"><br><br>
			<label>Confirm Password:</label>
			<input type="text" id="conf_password" name="conf_password"><br><br>
			<input type="hidden" id="id" name="id" value="<?php echo $result['cust_id']; ?>">
			<input type="submit" onclick="password_update_function();return false;" value="Submit">
		</form>
		
		<script>
			function profile_update_function() {
				var id = document.getElementById("id").value;
				var fname = document.getElementById("fname").value;
				var lname = document.getElementById("lname").value;
				var email = document.getElementById("email").value;
				var phone = document.getElementById("phone").value;
				var address = document.getElementById("address").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_profile_update.php",
					data: {
						'id' : id,
						'fname' : fname,
						'lname' : lname,
						'email' : email,
						'phone' : phone,
						'address' : address},
					dataType: "text",
					success: function(data){
						if(data == 'success'){
							alert("success");
							location.href = "edit_profile.php";
							}else if(data == 'fail'){
							alert("fail");
						}						
					}
				});
				return false;
			}
			
			function password_update_function() {
				var id = document.getElementById("id").value;
				var password = document.getElementById("password").value;
				var conf_password = document.getElementById("conf_password").value;
				
				if(password == conf_password){
					$.ajax({
						type: "POST",
						url: "ajax_password_update.php",
						data: {
							'id' : id,
							'password' : password},
						dataType: "text",
						success: function(data){
							if(data == 'success'){
								alert("success");
								location.href = "edit_profile.php";
								}else if(data == 'fail'){
								alert("fail");
							}						
						}
					});
					return false;
				}
				else{
					alert("pass x sama");
				}
			}			
		</script>
		
	</body>
</html>