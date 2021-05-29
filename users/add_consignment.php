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
	
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>
			Post 'n Go - Consignment
		</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="assets/demo/demo.css" rel="stylesheet" />
		
		<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
		
	</head>
	
	<body class="user-profile">
		<div class="wrapper ">
			<div class="sidebar" data-color="orange">
				<!--
					Tip 1: You can change the color of the sidebar using: data-color="blue | green | orange | red | yellow"
				-->
				<div class="logo">
					<a href="http://www.creative-tim.com" class="simple-text logo-mini">
						<img src="images/logo-mini.png" alt="alternatetext">
					</a>
					<a href="http://www.creative-tim.com" class="simple-text logo-normal">
						Post 'N Go
					</a>
				</div>
				<div class="sidebar-wrapper" id="sidebar-wrapper">
					<ul class="nav">
						<li>
							<a href="../index.php">
								<i class="now-ui-icons shopping_delivery-fast"></i>
								<p>Home</p>
							</a>
						</li>
						<li>
							<a href="profile.php">
								<i class="now-ui-icons business_badge"></i>
								<p>Profile</p>
							</a>
						</li>
						<li>
							<a href="address_book.php">
								<i class="now-ui-icons location_map-big"></i>
								<p>Address Book</p>
							</a>
						</li>
						<li class="active">
							<a href="consignment.php">
								<i class="now-ui-icons files_single-copy-04"></i>
								<p>Consignment</p>
							</a>
						</li>
						<li>
							<a href="logout.php">
								<i class="now-ui-icons sport_user-run"></i>
								<p>Logout</p>
							</a>
						</li>
					</ul>
				</div>
			</div>
			<div class="main-panel" id="main-panel">
				<!-- Navbar -->
				<nav class="navbar navbar-expand-lg navbar-transparent  bg-primary  navbar-absolute">
					<div class="container-fluid">
						<div class="navbar-wrapper">
							<div class="navbar-toggle">
								<button type="button" class="navbar-toggler">
									<span class="navbar-toggler-bar bar1"></span>
									<span class="navbar-toggler-bar bar2"></span>
									<span class="navbar-toggler-bar bar3"></span>
								</button>
							</div>
							<a class="navbar-brand" href="#pablo">Add New Consignment</a>
						</div>
						<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navigation" aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
							<span class="navbar-toggler-bar navbar-kebab"></span>
							<span class="navbar-toggler-bar navbar-kebab"></span>
							<span class="navbar-toggler-bar navbar-kebab"></span>
						</button>
						<div class="collapse navbar-collapse justify-content-end" id="navigation">
							<ul class="navbar-nav">
								<li class="nav-item dropdown">
									<a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
										<i class="now-ui-icons users_single-02"></i>
										<p>
											<span class="d-md-block"><?php echo $result['cust_fname'];?></span>
										</p>
									</a>
									<div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink">
										<a class="dropdown-item" href="#">Action</a>
										<a class="dropdown-item" href="#">Another action</a>
										<a class="dropdown-item" href="#">Something else here</a>
									</div>
								</li>
							</ul>
						</div>
					</div>
				</nav>
				<!-- End Navbar -->
				<div class="panel-header panel-header-sm">
				</div>
				<div class="content">
					<div class="row">
						<div class="col-md-12">
							<div class="card">
								<div class="card-header">
									<h5 class="title">New Consignment</h5>
									<p>Please fill the form.</p>
								</div>
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>Select Address Book</label>
													<select class="form-control" id="add_book" onchange="selectbook()">
														<option>--Please Select--</option>
														<?php
															$qry_book = mysqli_query($conn, "SELECT * FROM book_address WHERE cust_id = '".$id."'");
															while($result_qry_book = mysqli_fetch_array($qry_book))
															{?>
															<option value="<?php echo $result_qry_book["book_id"]; ?>"><?php echo $result_qry_book["book_fname"]." ".$result_qry_book["book_lname"]; ?></option>
															<?php 
															} 
														?>
													</select>
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Payment Method</label>
													<select class="form-control" id="p_method">
														<option value="">--Please Select--</option>
														<option value="Sender">Sender</option>
														<option value="Recipient">Recipient</option>
													</select>
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6">
												<div class="form-group">
													<label>First Name</label>
													<input type="text" class="form-control" id="r_fname" placeholder="Enter First Name">
												</div>
											</div>
											<div class="col-md-6">
												<div class="form-group">
													<label>Last Name</label>
													<input type="text" class="form-control" id="r_lname" placeholder="Enter Last Name">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>No. Phone</label>
													<input type="text" class="form-control" id="r_phone" placeholder="Username">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control" id="r_address" placeholder="Home Address">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pr-1">
												<div class="form-group">
													<label>Postal Code</label>
													<input type="text" class="form-control" id="r_postcode" onchange="selectstate()" placeholder="ZIP Code">
												</div>
											</div>
											<div class="col-md-6 pl-1">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" id="r_state" disabled>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type="hidden" id="id" value="<?php echo $result['cust_id']; ?>">
											<button type="submit" class="btn btn-primary" onclick="new_consignment();return false;">Submit</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>
				</div>
				<footer class="footer">
					<div class=" container-fluid ">
						<div class="copyright" id="copyright">
							&copy; <script>
								document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))
							</script>
							, <a href="" target="_blank">Post 'N Go</a> System. Develop by <a href="https://www.creative-tim.com" target="_blank">Ashraf Danial</a> and <a href="https://www.creative-tim.com" target="_blank">Faizuddin Putra</a>.
						</div>
					</div>
				</footer>
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
								var r_fname = data.result;
								var r_lname = data.result1;
								var r_phone = data.result2;
								var r_address = data.result3;
								var r_postcode = data.result4;
								var r_state = data.result5;
								document.getElementById("r_fname").value = r_fname;
								document.getElementById("r_lname").value = r_lname;
								document.getElementById("r_phone").value = r_phone;
								document.getElementById("r_address").value = r_address;
								document.getElementById("r_postcode").value = r_postcode;
								document.getElementById("r_state").value = r_state;
							}
						});
						return false;
					}
					
					function selectstate(){
						var r_postcode = document.getElementById("r_postcode").value;
						if(r_postcode == "56000"){
							document.getElementById("r_state").value = "Kuala Lumpur";
						}
						else{
							document.getElementById("r_state").value = "Selangor";
						}
					}
					
					function new_consignment(){
						var id = document.getElementById("id").value;
						var r_fname = document.getElementById("r_fname").value;
						var r_lname = document.getElementById("r_lname").value;
						var r_phone = document.getElementById("r_phone").value;
						var r_address = document.getElementById("r_address").value;
						var r_postcode = document.getElementById("r_postcode").value;
						var r_state = document.getElementById("r_state").value;
						var p_method = document.getElementById("p_method").value;
						
						if(r_fname.length < 1 || r_lname.length < 1 || r_phone.length < 1 || r_address.length < 1 || r_postcode.length < 1 || r_state.length < 1 || p_method.length < 1){
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'All field is required!'
							})
						}
						else{
							Swal.fire({
								title: 'Are you sure?',
								text: "Are you sure want to add the consignment?",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Yes, add it!'
								}).then((result) => {
								if (result.isConfirmed){
									$.ajax({
										type: "POST",
										url: "ajax_add_consignment.php",
										data: {
											'id' : id,
											'r_fname' : r_fname,
											'r_lname' : r_lname,
											'r_phone' : r_phone,
											'r_address' : r_address,
											'r_postcode' : r_postcode,
											'r_state' : r_state,
										'p_method' : p_method},
										dataType: "json",
										success: function(data){
											//$(".showQRCode").html(response);
											Swal.fire({
												icon: 'success',
												title: 'Correct!',
												html: '<img class="img-thumbnail" src="'+data.result+data.result1+'"/><br><br><a href="download.php?f='+data.result+data.result1+'">Download QR Code</a>',
												showCloseButton: true,
												}).then(function() {
												window.location = "consignment.php";
											});							
										}
									});
								}
							})
						}
					}
				</script>
			</div>
		</div>
		<!--   Core JS Files   -->
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/core/popper.min.js"></script>
		<script src="assets/js/core/bootstrap.min.js"></script>
		<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
		<!--  Google Maps Plugin    -->
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
		<!-- Chart JS -->
		<script src="assets/js/plugins/chartjs.min.js"></script>
		<!--  Notifications Plugin    -->
		<script src="assets/js/plugins/bootstrap-notify.js"></script>
		<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
		<script src="assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
		<script src="assets/demo/demo.js"></script>
		<script src="assets/assets/sweetalert2.all.min.js"></script>
	</body>	
</html>													