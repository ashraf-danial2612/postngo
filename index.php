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
<html lang="en">
	<head>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<meta http-equiv="content-type" content="text/html; charset=utf-8" />
		<title>Post 'N Go</title>
		<link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'type="text/css" />
		<link href="style.css" rel="stylesheet" type="text/css" media="screen" />
	</head>
	<body>
		<?php
			if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
			?>
			<div id="menu-wrapper">
				<div id="menu">
					<div id="image" style="width:1100px;">
						<img src="assets/image/post.png" style="height:71px; width:auto">
						<ul>
							<li class="current_page_item"><a href="index.php">Home</a></li>
							<li><a href="sendparcel1.php">Send Parcel</a></li>
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
						<li class="current_page_item"><a href="index.php">Home</a></li>
						<li><a href="sendparcel1.php">Send Parcel</a></li>
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

	<div id="wrapper">
	<!-- end #header -->
	<div id="page">
		<div id="page-bgtop">
			<div id="page-bgbtm">
				<div id="content">
					<div class="post">
						<div style="clear: both;">&nbsp;</div>
						<h2 class="title">How To Use Post 'n Go</h2>
						<div style="clear: both;">&nbsp;</div>
						<div class="entry">
							<img src="assets/image/register.png" style="height:35%; width:70%; margin-left:10%;">
						</div>
					</div>

					<div class="post">
						<div class="entry">
							<img src="assets/image/consignment.png" style="height:35%; width:82%; margin-left:6%;">
						</div>
					</div>

					<div class="post">
						<div class="entry">
							<img src="assets/image/qrcode.png" style="height:35%; width:94%; margin-left:5%;">
						</div>
					</div>

					<div class="post">
						<div class="entry">
							<img src="assets/image/scanqr.jpg" style="height:31%; width:89%; margin-left:5%;">
						</div>
					</div>

					<div class="post">
						<div class="entry">
							<img src="assets/image/print.png" style="height:35%; width:78%; margin-left:7%;">
						</div>
					</div>
				</div>

				<!-- end #content -->
			</div>
		</div>
	</div>

	<div id="feedback">
		<h2 class="cust">Customer Feedback</h2>

		<div class="tab-col">
			<div class="column" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="username">
					<p style="float : left; color: #FF5300">By Faridah85 </p>
					<p style="float : right; color: #ACACAC"> Sep 11, 2020 </p>
				</div>
				<div class="user">
					<p style="width : fit-content; margin-left : 14px; color: #ACACAC">User </p>
				</div>
				<div style="clear: both;">&nbsp;</div>
				<h3 style="width : fit-content; margin-left : 14px; color: #222222; font-family: revert">The system is easy to use</h3>
				<div style="clear: both;">&nbsp;</div>
				<p style="width : fit-content; margin-left : 14px"> The instruction for new user is very helpful for new user in using this system </p>
			</div>




			<div class="column" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="username">
					<p style="float : left; color: #FF5300">By Putra77 </p>
					<p style="float : right; color: #ACACAC"> Sep 11, 2020 </p>
				</div>
				<div class="user">
					<p style="width : fit-content; margin-left : 14px; color: #ACACAC">User </p>
				</div>
				<div style="clear: both;">&nbsp;</div>
				<h3 style="width : fit-content; margin-left : 14px; color: #222222;">User friendly and interactive</h3>
				<div style="clear: both;">&nbsp;</div>
				<p style="width : fit-content; margin-left : 14px; "> the interface is very attractive and new features help fasten the process  </p>
			</div>

			<div class="column" style="box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.2), 0 6px 20px 0 rgba(0, 0, 0, 0.19);">
				<div class="username">
					<p style="float : left; color: #FF5300">By Acap46 </p>
					<p style="float : right; color: #ACACAC"> Sep 11, 2020 </p>
				</div>
				<div class="user">
					<p style="width : fit-content; margin-left : 14px; color: #ACACAC">User </p>
				</div>
				<div style="clear: both;">&nbsp;</div>
				<h3 style="width : fit-content; margin-left : 14px">Time consuming</h3>
				<div style="clear: both;">&nbsp;</div>
				<p style="width : fit-content; margin-left : 14px"> no need to queue all the way long. only show the qr code and the process is done !
					really fast ! </p>
				</div>

			</div>
		</div>
		<!-- end #page -->
	</div>

	<div id="footer">
		<div class="logo">
			<img src="assets/image/logo.png" style="height:220px; width:23%; float: left">

			<div class="link" >
				<p style="margin-right:30px; color: #999999">Pages</p><br>
				<a href="index.php" style="color: #999999">Home</a><br><br>
				<a href="sendparcel1.php" style="color: #999999">Send Parcel</a><br><br>
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

	</div>
	<!-- end #footer -->
	</body>
	</html>
