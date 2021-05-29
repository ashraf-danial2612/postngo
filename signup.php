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
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>sign up</title>
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

		<!-- content -->
		<div id="wrapper">
			<!-- end #header -->
			<div id="page">
				<div id="page-bgtop">
					<div id="page-bgbtm">
						<div id="content">
							<div class="post">
								<div style="clear: both;">&nbsp;</div>
								<h2 class="title">Sign Up</h2>
								<div style="clear: both;">&nbsp;</div>

							</div>

							<form class="form">
								<div style="float : left">
									<p>First Name :</p>
									<input type="text" id="fname" placeholder="Enter First Name" size="30">
								</div>
								<div style="float : left; margin-left :100px">
									<p>Last Name</p>
									<input type="text" id="lname" placeholder="Enter Last Name" size="30">
								</div>
								<div style="clear: both;">&nbsp;</div>

								<div style="float : left">
									<p>Email Address</p>
									<input type="text" id="email" placeholder="Enter Email Address" size="80">
								</div>
								<div style="clear: both;">&nbsp;</div>

								<div style="float : left ; ">
									<p>No. Phone</p>
									<input type="text" id="phone" placeholder="Your No. Phone" size="80">
								</div>
								<div style="clear: both;">&nbsp;</div>

								<div style="float : left">
									<p>Address</p>
									<input type="text" id="address" placeholder="Enter Address" size="80">
								</div>
								<div style="clear: both;">&nbsp;</div>

								<div style="float : left;">
									<p>State</p>
									<input type="text" id="state" placeholder="Enter Postcode" size="30">
								</div>

								<div style="float : left; margin-left :100px">
									<p>Postcode</p>
									<input type="text" id="postcd" placeholder="Enter Postcode" size="30">
								</div>
								<div style="clear: both;">&nbsp;</div>

								<div style="float : left">
									<p>Password</p>
									<input type="password" id="password" placeholder="Enter Password" size="30">
								</div>
								<div style="clear: both;">&nbsp;</div>
								<div style="float : left">
									<p>Confirm Password</p>
									<input type="password" id="conf_password" placeholder="Confirm password" size="30">
									<div class="button" type="submit" onclick="register_function();return false;" value="Submit" style="margin-left: 250px">Submit</div>
								</div>

							</form>

						</div>

						<!-- end #content -->
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
			function register_function() {
				var fname = document.getElementById("fname").value;
				var lname = document.getElementById("lname").value;
				var email = document.getElementById("email").value;
				var phone = document.getElementById("phone").value;
				var address = document.getElementById("address").value;
				var state = document.getElementById("state").value;
				var postcd = document.getElementById("postcd").value;
				var password = document.getElementById("password").value;
				var conf_password = document.getElementById("conf_password").value;

				if(fname.length < 1 || lname.length < 1 || email.length < 1 || phone.length < 1 || address.length < 1 || state.length < 1 || postcd.length < 1 || password.length < 1 || conf_password.length < 1)
				{
					Swal.fire({
						icon: 'error',
						title: 'Oops...',
						text: 'Something went wrong!',
						footer: '<a href>Why do I have this issue?</a>'
					})
				}
				else
				{
					Swal.fire({
						title: 'Are you sure?',
						text: 'Are you sure want to submit?',
						icon: 'warning',
						confirmButtonText: 'Submit',
						}).then((result) => {
						if (result.isConfirmed){
							$.ajax({
								type: "POST",
								url: "ajax_sign.php",
								data: {
									'fname' : fname,
									'lname' : lname,
									'email' : email,
									'phone' : phone,
									'address' : address,
									'postcd' : postcd,
									'state' : state,
								'password' : password},
								dataType: "text",
								success: function(data){
									if(data == 'success'){
										Swal.fire(
										'Well done!',
										'Successfully register!',
										'success'
										).then(function() {
											window.location = "login.php";
										});
										}else if(data == 'fail'){
										alert("account exist");
									}
								}
							});
							return false;
						}
					})
				}
			}
		</script>
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/sweetalert2.all.min.js"></script>
		</body>
</html>
