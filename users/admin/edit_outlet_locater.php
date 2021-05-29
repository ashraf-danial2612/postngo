<?php
	require_once "../connect.php";

	$getid = $_GET['id'];
	$qry_outlet = mysqli_query($conn, "SELECT * FROM outlet_locater WHERE outlet_id = '".$getid."'");
	$result_outlet = mysqli_fetch_assoc($qry_outlet);
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="../assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>
			Post 'n Go - Profile
		</title>
		<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
		<!--     Fonts and icons     -->
		<link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
		<!-- CSS Files -->
		<link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
		<link href="../assets/css/now-ui-dashboard.css?v=1.5.0" rel="stylesheet" />
		<!-- CSS Just for demo purpose, don't include it in your project -->
		<link href="../assets/demo/demo.css" rel="stylesheet" />
		
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
						<img src="../images/logo-mini.png" alt="alternatetext">
					</a>
					<a href="http://www.creative-tim.com" class="simple-text logo-normal">
						Post 'N Go
					</a>
				</div>
				<div class="sidebar-wrapper" id="sidebar-wrapper">
					<ul class="nav">
						<li>
							<a href="../../index.php">
								<i class="now-ui-icons shopping_delivery-fast"></i>
								<p>Home</p>
							</a>
						</li>
						<li>
							<a href="consignment.php">
								<i class="now-ui-icons files_single-copy-04"></i>
								<p>Consignment</p>
							</a>
						</li>
						<li class="active">
							<a href="outlet_locater.php">
								<i class="now-ui-icons location_map-big"></i>
								<p>Outlet Locater</p>
							</a>
						</li>
						<li>
							<a href="../logout.php">
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
							<a class="navbar-brand" href="#pablo">Add Outlet Locater</a>
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
											<span class="d-md-block">Admin</span>
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
									<h5 class="title">New Outlet Locater</h5>
									<p>Please fill the form for new outlet locater.</p>
								</div>
								<div class="card-body">
									<form>
										<div class="row">
											<div class="col-md-6 pr-1">
												<div class="form-group">
													<label>Outlet Name</label>
													<input type="text" class="form-control" id="cname" value="<?php echo $result_outlet['outlet_name']; ?>">
												</div>
											</div>
											<div class="col-md-6 pl-1">
												<div class="form-group">
													<label>Outlet Email</label>
													<input type="text" class="form-control" id="cemail" value="<?php echo $result_outlet['outlet_email']; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Contact Number</label>
													<input type="text" class="form-control" id="ccontact" value="<?php echo $result_outlet['outlet_contact']; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-12">
												<div class="form-group">
													<label>Address</label>
													<input type="text" class="form-control" id="caddress" value="<?php echo $result_outlet['outlet_address']; ?>">
												</div>
											</div>
										</div>
										<div class="row">
											<div class="col-md-6 pr-1">
												<div class="form-group">
													<label>Postal Code</label>
													<input type="text" class="form-control" id="cpostcode" onchange="selectbook()" value="<?php echo $result_outlet['outlet_postcode']; ?>">
												</div>
											</div>
											<div class="col-md-6 pl-1">
												<div class="form-group">
													<label>State</label>
													<input type="text" class="form-control" id="cstate" value="<?php echo $result_outlet['outlet_state']; ?>" disabled>
												</div>
											</div>
										</div>
										<div class="card-footer text-right">
											<input type="hidden" id="id" value="<?php echo $result_outlet['outlet_id']; ?>">
											<button type="submit" class="btn btn-primary" onclick="edit_outletlocater();return false;">Update</button>
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
						var postcode = document.getElementById("cpostcode").value;
						if(postcode == "56000"){
							document.getElementById("cstate").value = "Kuala Lumpur";
						}
						else{
							document.getElementById("cstate").value = "Selangor";
						}
					}
					
					function edit_outletlocater(){
						var id = document.getElementById("id").value;
						var cname = document.getElementById("cname").value;
						var cemail = document.getElementById("cemail").value;
						var ccontact = document.getElementById("ccontact").value;
						var caddress = document.getElementById("caddress").value;
						var cpostcode = document.getElementById("cpostcode").value;
						var cstate = document.getElementById("cstate").value;
						
						Swal.fire({
							title: 'Are you sure?',
							text: "Are you sure want to update the outlet locater?",
							icon: 'warning',
							showCancelButton: true,
							confirmButtonColor: '#3085d6',
							cancelButtonColor: '#d33',
							confirmButtonText: 'Yes, submit it!'
							}).then((result) => {
							if (result.isConfirmed){
								$.ajax({
									type: "POST",
									url: "ajax_edit_outlet_locater.php",
									data: {
										'id' : id,
										'cname' : cname,
										'cemail' : cemail,
										'ccontact' : ccontact,
										'caddress' : caddress,
										'cpostcode' : cpostcode,
									'cstate' : cstate},
									dataType: "text",
									success: function(data){
										if(data == 'success'){
											Swal.fire(
											'Saved!',
											'Outlet locater has been updated.',
											'success'
											).then(function() {
												window.location = "outlet_locater.php";
											});	
											}else if(data == 'fail'){
											alert("fail");
										}							
									}
								});
							}
						})
					}
				</script>
			</div>
		</div>
		<!--   Core JS Files   -->
		<script src="../assets/js/core/jquery.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>
		<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
		<!--  Google Maps Plugin    -->
		<script src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
		<!-- Chart JS -->
		<script src="../assets/js/plugins/chartjs.min.js"></script>
		<!--  Notifications Plugin    -->
		<script src="../assets/js/plugins/bootstrap-notify.js"></script>
		<!-- Control Center for Now Ui Dashboard: parallax effects, scripts for the example pages etc -->
		<script src="../assets/js/now-ui-dashboard.min.js?v=1.5.0" type="text/javascript"></script><!-- Now Ui Dashboard DEMO methods, don't include it in your project! -->
		<script src="../assets/demo/demo.js"></script>
		<script src="../assets/assets/sweetalert2.all.min.js"></script>
	</body>
	
</html>							