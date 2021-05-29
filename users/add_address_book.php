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
			Post 'n Go - Profile
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
						<li class="active">
							<a href="address_book.php">
								<i class="now-ui-icons location_map-big"></i>
								<p>Address Book</p>
							</a>
						</li>
						<li>
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
							<a class="navbar-brand" href="#pablo">Address Book</a>
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
									<h5 class="title">New Address Book</h5>
									<p>Please fill the form for new recipient address book.</p>
								</div>
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-md-6 pr-1">
												<div class="form-group">
													<label>First Name</label><label id="status_fname" style="color:red; display:none;"> Field is required</label>
													<input type="text" class="form-control" id="fname" placeholder="Enter First Name">
												</div>
											</div>
											<div class="col-md-6 pl-1">
												<div class="form-group">
													<label>Last Name</label><label id="status_lname" style="color:red; display:none;"> Field is required</label>
													<input type="text" class="form-control" id="lname" placeholder="Enter Last Name">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>No. Phone</label>
													<input type="text" class="form-control" id="phone" placeholder="Username">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control" id="address" placeholder="Home Address">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pr-1">
												<div class="form-group">
													<label>Postal Code</label>
													<input type="text" class="form-control" id="postcode" onchange="selectbook()" placeholder="ZIP Code">
												</div>
											</div>
											<div class="col-md-6 pl-1">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" id="state" disabled>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type="hidden" id="id" value="<?php echo $result['cust_id']; ?>">
											<button type="submit" class="btn btn-primary" onclick="add_addressbook();return false;">Submit</button>
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
						var postcode = document.getElementById("postcode").value;
						if(postcode == "56000"){
							document.getElementById("state").value = "Kuala Lumpur";
						}
						else{
							document.getElementById("state").value = "Selangor";
						}
					}
					
					function add_addressbook(){
						var id = document.getElementById("id").value;
						var fname = document.getElementById("fname").value;
						var lname = document.getElementById("lname").value;
						var phone = document.getElementById("phone").value;
						var address = document.getElementById("address").value;
						var postcode = document.getElementById("postcode").value;
						var state = document.getElementById("state").value;
						
						if(fname.length < 1 || lname.length < 1 || phone.length < 1 || address.length < 1 || postcode.length < 1 || state.length < 1 ){
							Swal.fire({
								icon: 'error',
								title: 'Oops...',
								text: 'All field is required!'
							})
						}
						else {
							document.getElementById("status_fname").style.display = "none";
							Swal.fire({
								title: 'Are you sure?',
								text: "Are you sure want to submit the address book?",
								icon: 'warning',
								showCancelButton: true,
								confirmButtonColor: '#3085d6',
								cancelButtonColor: '#d33',
								confirmButtonText: 'Yes, submit it!'
								}).then((result) => {
								if (result.isConfirmed){
									$.ajax({
										type: "POST",
										url: "ajax_add_address_book.php",
										data: {
											'id' : id,
											'fname' : fname,
											'lname' : lname,
											'phone' : phone,
											'address' : address,
											'postcode' : postcode,
										'state' : state},
										dataType: "text",
										success: function(data){
											if(data == 'success'){
												Swal.fire(
											'Saved!',
											'Address book has been added.',
											'success'
											).then(function() {
												window.location = "address_book.php";
											});	
											}else if(data == 'fail'){
											alert("fail");
										}							
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