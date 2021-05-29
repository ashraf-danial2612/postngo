<?php
	require_once "../connect.php";
	
	/*$id = $_SESSION["cust_id"];
		$qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_id = '".$id."'");
	$result = mysqli_fetch_assoc($qry);*/
?>

<!DOCTYPE html>
<html lang="en">
	
	<head>
		<meta charset="utf-8" />
		<link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
		<link rel="icon" type="image/png" href="../assets/img/favicon.png">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<title>
			Post 'n Go - Consignment
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
						<li class="active">
							<a href="consignment.php">
								<i class="now-ui-icons files_single-copy-04"></i>
								<p>Consignment</p>
							</a>
						</li>
						<li>
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
									<h4 class="card-title">List of Customer Consignment</h4>
								</div>
								<div class="card-body">
									
									<div class="toolbar">
										<!--        Here you can write extra buttons/actions for the toolbar              -->
									</div>
									<table id="datatable" class="table table-striped table-bordered" cellspacing="0" width="100%">
										<thead>
											<tr>
												<th class="text-center">No. Reference</th>
												<th class="text-center">Sender Name</th>
												<th class="text-center">Recipient Name</th>
												<th class="text-center">Recipient Address</th>
												<th class="text-center">Date & Time</th>
												<th class="text-center">Status</th>
												<th class="disabled-sorting text-center">Actions</th>
											</tr>
										</thead>
										<tbody>
											<?php
												$result_consignment = mysqli_query($conn, "SELECT a.*, b.* FROM consignment a, customers b WHERE (a.cons_status = 'Pending' OR 'To Ship' OR a.cons_status = 'To Receive' OR a.cons_status = 'Completed' OR a.cons_status = 'Cancelled') AND a.cust_id = b.cust_id");
												$no = 1;
												while ($row = mysqli_fetch_assoc($result_consignment)) {
													$datetime = date('d/m/Y H:i:s',strtotime($row['cons_datetime']));
												?>
												<tr>
													<td class="text-center"><?php echo $row['cons_reference_code']; ?></td>
													<td class="text-center"><?php echo $row['cust_fname']." ".$row['cust_lname']; ?></td>
													<td class="text-center"><?php echo $row['cons_fname']." ".$row['cons_lname']; ?></td>
													<td class="text-center"><?php echo $row['cons_address'].", ".$row['cons_postcode'].", ".$row['cons_state']; ?></td>
													<td class="text-center"><?php echo $datetime ?></td>
													<td class="text-center"><?php echo $row['cons_status']; ?></td>
													<td class="text-center">
														<a href="edit_consignment.php?id=<?php echo $row['cons_id']; ?>" class="btn btn-round btn-info btn-icon btn-sm like"><i class="now-ui-icons files_paper"></i></a>
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
						<div class="copyright" id="copyright">
							&copy; <script>document.getElementById('copyright').appendChild(document.createTextNode(new Date().getFullYear()))</script>
							, <a href="" target="_blank">Post 'N Go</a> System. Develop by <a href="https://www.creative-tim.com" target="_blank">Ashraf Danial</a> and <a href="https://www.creative-tim.com" target="_blank">Faizuddin Putra</a>.
						</div>
					</div>															
				</footer>								
			</div>			
		</div>
		<script src="../assets/js/core/jquery.min.js"></script>
		<script src="../assets/js/core/popper.min.js"></script>
		<script src="../assets/js/core/bootstrap.min.js"></script>
		<script src="../assets/js/plugins/perfect-scrollbar.jquery.min.js"></script>
		<script src="../assets/js/plugins/jquery.dataTables.min.js"></script>
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
		</script>
		
	</body>
	
</html>
