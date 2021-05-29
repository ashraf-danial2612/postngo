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
<html>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
	<body>
		<p>Hello boss <?php echo $result["cust_fname"]; ?></p>
		<ul>
			<li><a href="home.php">Home</a></li>
			<li><a href="edit_profile.php">Edit Profile</a></li>
			<li><a href="address_book.php">Address Book</a></li>
			<li><a href="consignment.php">Consignment</a></li>
			<li><a href="logout.php">Logout</a></li>
		</ul>
		
		<h2>Address Book</h2>
		
		<form>
			<label>Name:</label>
			<input type="text" id="name" name="name"><br><br>
			<label>No. Phone:</label>
			<input type="text" id="phone" name="phone"><br><br>
			<label>Address:</label>
			<input type="text" id="address" name="address"><br><br>
			<label>Postcode:</label>
			<input type="text" id="postcode" name="postcode"><br><br>
			<input type="hidden" id="id" name="id" value="<?php echo $result['cust_id']; ?>">
			<input type="submit" onclick="add_addressbook();return false;" value="Submit">
		</form>
		
		<script>
			function add_addressbook() {
				var id = document.getElementById("id").value;
				var name = document.getElementById("name").value;
				var phone = document.getElementById("phone").value;
				var address = document.getElementById("address").value;
				var postcode = document.getElementById("postcode").value;
				
				$.ajax({
					type: "POST",
					url: "ajax_add_address_book.php",
					data: {
						'id' : id,
						'name' : name,
						'phone' : phone,
						'address' : address,
					'postcode' : postcode},
					dataType: "text",
					success: function(data){
						if(data == 'success'){
							alert("add success");
							location.href = "address_book.php";
							}else if(data == 'fail'){
							alert("fail");
						}						
					}
				});
				return false;
			}
		</script>
	</body>
</html>