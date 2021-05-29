<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
</head>
<body>
	<p>Hello boss <?php echo $_SESSION["cust_id"]; ?></p>
    <ul>
		<li><a href="home.php">Home</a></li>
		<li><a href="edit_profile.php">Edit Profile</a></li>
		<li><a href="address_book.php">Address Book</a></li>
		<li><a href="consignment.php">Consignment</a></li>
		<li><a href="logout.php">Logout</a></li>
	</ul>
</body>
</html>