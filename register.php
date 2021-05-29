<?php
	// Initialize the session
	session_start();
	
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: welcome.php");
		exit;
	}
?>

<!DOCTYPE html>
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<h2>Login Form</h2>
		
		<form>
			<label>First Name:</label>
			<input type="text" id="fname" name="fname"><br><br>
			<label>Last Name:</label>
			<input type="text" id="lname" name="lname"><br><br>
			<label>Email Address:</label>
			<input type="text" id="email" name="email"><br><br>
			<label>No. Phone:</label>
			<input type="text" id="phone" name="phone"><br><br>
			<label>Address:</label>
			<input type="text" id="address" name="address"><br><br>
			<label>Password:</label>
			<input type="text" id="password" name="password"><br><br>
			<label>Confirm Password:</label>
			<input type="text" id="conf_password" name="conf_password"><br><br>
			<input type="submit" onclick="register_function();return false;" value="Submit">
		</form>
		
		<script>
			function register_function() {
				var fname = document.getElementById("fname").value;
				var lname = document.getElementById("lname").value;
				var email = document.getElementById("email").value;
				var phone = document.getElementById("phone").value;
				var address = document.getElementById("address").value;
				var password = document.getElementById("password").value;
				var conf_password = document.getElementById("conf_password").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_register.php",
					data: {
						'fname' : fname,
						'lname' : lname,
						'email' : email,
						'phone' : phone,
						'address' : address,
						'password' : password},
					dataType: "text",
					success: function(data){
						if(data == 'success'){
							alert("account success");
							location.href = "login.php";
							}else if(data == 'fail'){
							alert("account exist");
						}						
					}
				});
				return false;
			}
		</script>
	</body>
</html>