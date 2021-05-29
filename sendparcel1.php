<?php
	error_reporting(0);
	require_once "connect.php";

	// Initialize the session
	session_start();

	// Check if the user is logged in, if not then redirect him to login page
	if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
		//header("location: index.php");
		//exit;
	}

	$id = $_SESSION["cust_id"];
	$qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_id = '".$id."'");
	$result = mysqli_fetch_assoc($qry);
?>



<!DOCTYPE html>
<html lang="en" dir="ltr">
	<head>
		<meta charset="utf-8">
		<title>Send Parcel</title>
		<link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'type="text/css" />
		<link href="page.css" rel="stylesheet" type="text/css" media="screen" />
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
		<script type="text/javascript" src="https://rawgit.com/schmich/instascan-builds/master/instascan.min.js"></script>
	</head>
	<?php
		if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
		?>
		<div id="menu-wrapper">
			<div id="menu">
				<div id="image" style="width:1100px;">
					<img src="assets/image/post.png" style="height:71px; width:auto">
					<ul>
						<li ><a href="index.php">Home</a></li>
						<li class="current_page_item"><a href="sendparcel1.php">Send Parcel</a></li>
						<li><a href="track.php">Tracking </a></li>
						<li><a href="map.php">Outlet Locater</a></li>
						<li><a href="Signup.php" style=" background-color: red; color:white; border-radius:12px; "> Sign up</a></li>
						<li><a href="login.php" style=" background-color: red; color:white; border-radius:12px;"> Login </a></li>
					</ul>
				</div>
			</div>
			<!-- end #menu -->
		</div>
		<?php
			} else{
		?>
		<div id="menu-wrapper">
		<div id="menu">
			<div id="image" style="width:900px; height: inherit">
				<img src="assets/image/post.png" style="height:71px; width:auto">
				<ul>
					<li><a href="index.php">Home</a></li>
					<li class="current_page_item"><a href="sendparcel1.php">Send Parcel</a></li>
					<li><a href="track.php">Tracking </a></li>
					<li><a href="map.php">Outlet Locater</a></li>
				</ul>
				<div class="dropdown" style="float:right; ">
					<button class="dropbtn">Hi <?php echo $result['cust_fname'];?></button>
					<div class="dropdown-content">
						<a href="users/profile.php">User profile</a>
						<a href="logout.php">Logout</a>
					</div>
				</div>
			</div>
		</div>
		<!-- end #menu -->
	</div>
		<?php
		}
	?>
		<!-- end #menu -->
		<div id="wrapper">
			<!-- end #header -->
			<div id="page">
				<div id="page-bgtop">
					<div id="page-bgbtm">
						<div id="content">
							<div class="post">
								<div style="clear: both;">&nbsp;</div>
								<h2 class="title">Send Parcel </h2>
								<div style="clear: both;">&nbsp;</div>
							</div>
							<div class="mid">
								<div id="qr_class" class="current_page_item" style="float:left; margin-right : 100px">
									<a onclick="qr_section_function();return false;">Qr code </a>
								</div>
								<div id="ref_class" style="float : left">
									<a onclick="ref_section_function();return false;">No. Reference </a>
								</div>
							</div>
							<div id="qr_section">
								<div style="clear: both;">&nbsp;</div>
								<div class="qr" style="margin-left:320px" id="qr">
									<img src="assets/image/qr.png" style="height:71px">
								</div>
								<div id="camera" style="display:none;">
									<video style="position:relative;left:3%;" id="preview"></video>
								</div>
								<div style="clear: both;">&nbsp;</div>

								<input class="button" style="margin-left: 294px; margin-bottom:50px" type="submit" onclick="scan_function();return false;" value="Scan Here">
							</div>
							<div id="ref_section" style="display:none;">
								<div style="clear: both;">&nbsp;</div>
								<div style="margin-left:250px">
									<p> Please enter your reference number</p>
								</div><br>
								<div style="margin-left:300px">
									<p> No. Reference</p>
								</div>
								<form class="form_ref">
									<input type="text" id="ref_input" placeholder="Reference no" size="30" style="margin-left:180px">
								</form>
								<input class="button" style="margin-left: 294px; margin-bottom:50px" type="submit" onclick="ref_function();return false;" value="Scan Here">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<div class="logo">
				<img src="assets/image/logo.png" style="height:220px; width:23%; float: left">

				<div class="link" >
					<p style="margin-right:30px;">Pages</p><br>
					<a href="index.php" style="color: #999999">Home</a><br><br>
					<a href="sendparcel.php" style="color: #999999">Send Parcel</a><br><br>
					<a href="track.php" style="color: #999999">Tracking </a><br><br>
					<a href="map.php" style="color: #999999">Outlet Locater</a><br><br>
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
			function qr_section_function() {
				document.getElementById("qr_section").style.display = "block";
				document.getElementById("ref_section").style.display = "none";
				document.getElementById("qr_class").classList.add('current_page_item');
				document.getElementById("ref_class").classList.remove('current_page_item');
			}
			function ref_section_function() {
				document.getElementById("ref_section").style.display = "block";
				document.getElementById("qr_section").style.display = "none";
				document.getElementById("ref_class").classList.add('current_page_item');
				document.getElementById("qr_class").classList.remove('current_page_item');
			}

			function scan_function() {
				document.getElementById("camera").style.display = "block";
				document.getElementById("qr").style.display = "none";
			}

			let scanner = new Instascan.Scanner(
            {
                video: document.getElementById('preview')
			}
			);
			scanner.addListener('scan', function(content) {
				var check_ref = content;

				Swal.fire({
					title: content,
					text: 'Is this your no reference?',
					imageUrl: 'assets/image/logo2.png',
					imageWidth: 150,
					imageHeight: 150,
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes'
					}).then((result) => {
					if (result.isConfirmed){
						window.open('consignment_details.php?id='+content, '_blank');
						Swal.fire(
						'Thank you!',
						'Please print the consignment.',
						'success'
						)
						document.getElementById("camera").style.display = "none";
						document.getElementById("qr").style.display = "block";
					}
				})
			});
			Instascan.Camera.getCameras().then(cameras =>
			{
				if(cameras.length > 0){
					scanner.start(cameras[0]);
					} else {
					console.error("Camera not exist");
				}
			});

			function ref_function() {
				var ref_input = document.getElementById("ref_input").value;

				Swal.fire({
					title: ref_input,
					text: 'Is this your no reference?',
					imageUrl: 'assets/image/logo2.png',
					imageWidth: 150,
					imageHeight: 150,
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes'
					}).then((result) => {
					if (result.isConfirmed){
						window.open('consignment_details.php?id='+ref_input, '_blank');
						Swal.fire(
						'Thank you!',
						'Please print the consignment.',
						'success'
						)
					}
				})
			}
		</script>
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/sweetalert2.all.min.js"></script>
	</body>
</html>
