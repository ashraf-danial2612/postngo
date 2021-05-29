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
			Post 'n Go - Address Book
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
							<a class="navbar-brand" href="#pablo">Consignment</a>
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
									<div class="row">
										<div class="col-sm-3">
											<h4 class="card-title">List of Address Book</h4>
										</div>
										<div class="col-sm-3">
											<button type="submit" class="btn" style="background-color:#3b5998; color:#fff" onclick="window.location.href='add_address_book.php';">Add New</button>
										</div>
									</div>
								</div>
								<div class="card-body">
									
									<div class="toolbar">
										<!--        Here you can write extra buttons/actions for the toolbar              -->
									</div>
									<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th class="text-center">Name</th>
												<th class="text-center">No. Phone</th>
												<th class="text-center">Address</th>
												<th class="disabled-sorting text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$result_address_book = mysqli_query($conn, "SELECT * FROM book_address WHERE cust_id = '".$id."'");
												$no = 1;
												while ($row = mysqli_fetch_assoc($result_address_book)) {
												?>
												<tr>
													<td class="text-center"><?php echo $row['book_fname']." ".$row['book_lname']; ?></td>
													<td class="text-center"><?php echo $row['book_phone']; ?></td>
													<td class="text-center"><?php echo $row['book_address'].", ".$row['book_postcode'].", ".$row['book_state']; ?></td>
													<td class="text-center">
														<a href="edit_address_book.php?id=<?php echo $row['book_id']; ?>" class="btn btn-round btn-info btn-icon btn-sm like"><i class="now-ui-icons files_paper"></i></a>
														<a href="#" class="btn btn-round btn-danger btn-icon btn-sm remove" onclick="delete_addressbook(this, '<?php echo $row['book_id']; ?>');return false;"><i class="fas fa-times"></i></a>
													</td>
												</tr>
												<?php 
												}
											?>	
										</tbody>
									</table>
								</div><!-- end content-->
							</div><!--  end card  -->
						</div> <!-- end col-md-12 -->
					</div> <!-- end row -->
				</div>
				<footer class="footer" >				
					<div class=" container-fluid ">
						<nav>
							<ul>
								<li>
									<a href="https://www.creative-tim.com">
										Creative Tim
									</a>
								</li>
								<li>
									<a href="http://presentation.creative-tim.com">
										About Us
									</a>
								</li>
								<li>
									<a href="http://blog.creative-tim.com">
										Blog
									</a>
								</li>
							</ul>
						</nav>
						<div class="copyright" id="copyright">
							&copy; <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
							, <a href="" target="_blank">Post 'N Go</a> System. Develop by <a href="https://www.creative-tim.com" target="_blank">Ashraf Danial</a> and <a href="https://www.creative-tim.com" target="_blank">Faizuddin Putra</a>.
						</div>
					</div>															
				</footer>								
			</div>			
		</div>
		<script src="assets/js/core/jquery.min.js"></script>
		<script src="assets/js/core/popper.min.js"></script>
		<script src="assets/js/core/bootstrap.min.js"></script>
		<script src="assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
		<script src="assets/js/plugins/jquery.dataTables.min.js"></script>
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
		<script>
			$(document).ready(function() {
				$('#datatable').DataTable({
					"pagingType": "full_numbers",
					"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
					responsive: true,
					language: {
						search: "_INPUT_",
						searchPlaceholder: "Search records",
					}					
				});			
				var table = $('#datatable').DataTable();
			});
			
			function delete_addressbook(value,bookid){
				var id = bookid;

				Swal.fire({
					title: 'Are you sure?',
					text: "You won't be able to revert this!",
					icon: 'warning',
					showCancelButton: true,
					confirmButtonColor: '#3085d6',
					cancelButtonColor: '#d33',
					confirmButtonText: 'Yes, delete it!'
					}).then((result) => {
					if (result.isConfirmed){
						$.ajax({
							type: "POST",
							url: "ajax_delete_address_book.php",
							data: {
							'id' : id},
							dataType: "text",
							success: function(data){
								if(data == 'success'){
									Swal.fire(
									'Deleted!',
									'The address book has been deleted.',
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
		</script>
		
	</body>
	
</html>
