<?php
	require_once "connect.php";
	// Initialize the session
	session_start();
	
	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: welcome.php");
		exit;
	}
	
	$getemail = $_GET['email'];
	$hash = $_GET['hash'];
	$qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_email = '".$getemail."'");
	$result = mysqli_fetch_assoc($qry);
	$time = time();
	$currTime = $result["forget_password_time"];
    $expireTime = $currTime+360;
	//echo $time;
	//echo $currTime;
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
	
	<head>
		<meta charset="utf-8">
		<title>login up</title>
		<link href="page.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<div id="menu-wrapper">
			<div id="menu">
				<div id="image" style="width:1100px;">
					<img src="assets/image/post.png" style="height:71px; width:auto">
					<ul>
						<li><a href="index.php">Home</a></li>
						<li><a href="sendparcel.php">Send Parcel</a></li>
						<li><a href="track.php">Tracking </a></li>
						<li><a href="">Outlet Locater</a></li>
						<li><a href="Signup.php" style=" background-color: red; color:white; border-radius:12px; "> Sign up</a></li>
						<li><a href="login.php" style=" background-color: red; color:white; border-radius:12px;"> Login </a></li>
					</ul>
					
				</div>
			</div>
		</div>
		<!-- end #menu -->
		
		<div id="wrapper">
			<!-- end #header -->
			<div id="page">
				<div id="page-bgtop">
					<div id="page-bgbtm">
						<div id="content">
							<div class="post">
								<div style="clear: both;">&nbsp;</div>
								<h2 class="title">Reset Password </h2>
								<div style="clear: both;">&nbsp;</div>
								
							</div>
							
							<?php if((time() - $currTime) > 30){ ?>
								<p> Your reset link is expired </p>
								<?php } else if($hash != $result['email_verification']){ ?>
								<p> Error reset. Please try again </p>
								<?php } else { ?>
								<form>
									<div class="form" style="width:500px">
										<div style="float : left">
											<p>New Password :</p>
											<input type="password" id="password" placeholder="Enter new password" size="30">
										</div>
									</div>
									<div class="form" style="width:500px">
										<div style="float : left">
											<p>Confirm Password</p>
											<input type="password" id="conf_password"  placeholder="Enter confirm password" size="30">
										</div>
										<input type="hidden" id="reset_email" value="<?php echo $getemail; ?>">
									</div>
									<b id="status_pass" style="margin-left:250px; color:red; display:none;">Both password are not same. Please try again.</b>
									<div class="button" type="submit" onclick="reset_password_function();return false;" value="submit" style="margin-left: 400px; margin-bottom:50px">Submit</div>
								</form>
							<?php }?>
						</div>
					</div>
				</div>
			</div>
		</div>
        <div id="footer">
			<div class="logo">
				<img src="assets/image/logo.png" style="height:220px; width:23%; float: left">
				
				<div class="link" >
					<p style="margin-right:30px; color: #999999">Pages</p><br>
					<a href="index.php" style="color: #999999">Home</a><br><br>
					<a href="sendparcel.php" style="color: #999999">Send Parcel</a><br><br>
					<a href="track.php" style="color: #999999">Tracking </a><br><br>
					<a href="#" style="color: #999999">Outlet Locater</a><br><br>
				</div>
				
				<div class="social">
					<p style="margin-right:24%; color: #999999">Social</p>
					<img src="assets/image/insta.png" style="height:30px; width:3%; margin-left: 10%"><a style="padding-left : 10px; vertical-align: super; color: #999999">@Postngo</a><br>
					<img src="assets/image/gmail.png" style="height:30px; width:3%; margin-left: 10%"><a style="padding-left : 10px; vertical-align: super; color: #999999">Postngo@gmail.com</a><br>
					<img src="assets/image/fb.png" style="height:30px; width:3%; margin-left: 10%"><a style="padding-left : 10px; vertical-align: super; color: #999999">Postngo express </a><br>
					<img src="assets/image/twitter.png" style="height:30px; width:3%; margin-left: 10%"><a style="padding-left : 10px; vertical-align: super; color: #999999">@Postngo</a><br>
					
					
				</div>
			</div>
		</div>
        <script>
			function reset_password_function() {
				var reset_email = document.getElementById("reset_email").value;
				var password = document.getElementById("password").value;
				var conf_password = document.getElementById("conf_password").value;
				
				if(password == conf_password){
					document.getElementById("status_pass").style.display = "none";
					Swal.fire({
						title: 'Are you sure?',
						text: "Are you sure want to reset password?",
						icon: 'warning',
						showCancelButton: true,
						confirmButtonColor: '#3085d6',
						cancelButtonColor: '#d33',
						confirmButtonText: 'Yes, update it!'
						}).then((result) => {
						if (result.isConfirmed){
							$.ajax({
								type: "POST",
								url: "ajax_reset_password.php",
								data: {
									'reset_email' : reset_email,
								'password' : password},
								dataType: "text",
								success: function(data){
									if(data == 'success'){
										Swal.fire(
										'Saved!',
										'Your password has been updated.',
										'success'
										).then(function() {
											window.location = "login.php";
										});	
										}else if(data == 'fail'){
										alert("fail");
									}							
								}
							});
						}
					})
					}else{
					document.getElementById("status_pass").style.display = "block";
				}
			}
		</script>
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/sweetalert2.all.min.js"></script>
	</body>
</html>
