<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Forgot Password</title>
		<link href="page.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
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
								<h2 class="title">Forgot Password </h2>
								<div style="clear: both;">&nbsp;</div>
								
							</div>
							
							<form class="form" style="width:500px">
								<div style="float : left">
									<p>Email Address :</p>
									<input id="email" placeholder="Enter Email Address" size="30">
									<input type="button" onclick="sendEmail()" value="Send An Email" class="button">
								</div>
							</form>
							<div class="button" type="submit" style="margin-left: 400px; margin-bottom:50px">Submit</div>
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
					<a href="#" style="color: #999999">Home</a><br><br>
					<a href="#" style="color: #999999">Send Parcel</a><br><br>
					<a href="#" style="color: #999999">Tracking </a><br><br>
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
		<script src="http://code.jquery.com/jquery-3.3.1.min.js" integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8=" crossorigin="anonymous"></script>
		<script type="text/javascript">
			function sendEmail() {
				var email = $("#email");
				
				if (isNotEmpty(email)) {
					$.ajax({
						url: 'sendEmail.php',
						method: 'POST',
						dataType: 'json',
						data: {
							email: email.val()
							}, success: function (response) {
							if (response.status == "success")
                            Swal.fire(
							'Well done!',
							'Email has been sended!',
							'success'
							)
							else {
								alert('Please Try Again!');
								console.log(response);
							}
						}
					});
				}
			}
			
			function isNotEmpty(caller) {
				if (caller.val() == "") {
					caller.css('border', '1px solid red');
					return false;
				} else
                caller.css('border', '');
				
				return true;
			}
		</script>
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/sweetalert2.all.min.js"></script>
	</body>
</html>
