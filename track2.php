<?php
	//echo "lol";
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
		<link href="page.css" rel="stylesheet" type="text/css" media="screen" />
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
							<li><a href="sendparcel.php">Send Parcel</a></li>
							<li><a href="track.php">Tracking </a></li>
							<li><a href="">Outlet Locater</a></li>
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
							<li><a href="sendparcel.php">Send Parcel</a></li>
							<li><a href="track.php">Tracking </a></li>
							<li><a href="">Outlet Locater</a></li>
						</ul>
						<div class="dropdown" style="float:right; ">
							<button class="dropbtn">Hi <?php echo $result['cust_fname'];?></button>
							<div class="dropdown-content">
								<a href="consignment.php">User profile</a>
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
								<h2 class="title">Tracking </h2>
								<div style="clear: both;">&nbsp;</div>
							</div>

							<form style="width:700px; margin-left: 100px;margin-bottom: 50px;" action="" method="get">
								<label>Please enter tracking number</label><br>
								<br>
								<label>No Tracking :</label>
								<input type="text" placeholder="MY16584252" size="30" id="ref" name="ref">
								<input class="button" style="vertical-align: baseline; margin-left: 50px;" type="submit" value="Submit"/>
							</form>

							<table  style="width: 70%; padding-left: 5%;" >
								<thead>
									<tr>
										<td class="text-center"><h3>Reference Code</h3></td>
										<td class="text-center"><h3>Recipient Name</h3></td>
										<td class="text-center"><h3>Status</h3></td>
										<td class="disabled-sorting text-center"><h3>Date & Time</h3></td>


									</tr>
								</thead>
								<tbody>
									<?php
										$getref = $_GET["ref"];
										$result_ref = mysqli_query($conn, "SELECT * FROM tracking WHERE tracking_reference_code = '".$getref."'");
										while ($row = mysqli_fetch_assoc($result_ref)) {
										?>
										<tr>
											<td class="text-center"><?php echo $row['tracking_reference_code']; ?></td>
											<td class="text-center"><?php echo $row['tracking_fname']; ?></td>
											<td class="text-center"><?php echo $row['tracking_status']; ?></td>
											<td class="text-center"><?php echo $row['tracking_datetime']; ?></td>
										</tr>
										<?php
										}
									?>
								</tbody>
							</table>

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
		<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	</body>
</html>
