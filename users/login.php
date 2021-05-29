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
			<label>Email:</label>
			<input type="text" id="email" name="email"><br><br>
			<label>Password:</label>
			<input type="text" id="password" name="password"><br><br>
			<input type="submit" onclick="login_function();return false;" value="Submit">
		</form>
		
		<script>
			function login_function() {
				var email = document.getElementById("email").value;
				var password = document.getElementById("password").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_login.php",
					data: {
						'email' : email,
						'password' : password},
					dataType: "text",
					success: function(data){
						if(data == 'success'){
							alert("login success");
							location.href = "consignment.php";
							}else if(data == 'fail'){
							alert("fail");
						}						
					}
				});
				return false;
			}
		</script>
	</body>
</html>