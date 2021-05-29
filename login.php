<?php
	// Initialize the session
	session_start();

	// Check if the user is already logged in, if yes then redirect him to welcome page
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
		header("location: welcome.php");
		exit;
	}
?>




<!DOCTYPE html>
<html lang="en" dir="ltr">

<head>
  <meta charset="utf-8">
  <title>login up</title>
  <link href="page.css" rel="stylesheet" type="text/css" media="screen" />
</head>
	<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<body>
  <div id="menu-wrapper">
    <div id="menu">
      	<div id="image" style="width:1100px;">
        <img src="assets/image/post.png" style="height:71px; width:auto">
        <ul>
          <li><a href="index.php">Home</a></li>
					<li><a href="sendparcel.php">Send Parcel</a></li>
					<li><a href="track.php">Tracking </a></li>
					<li><a href="">Outlet Locater</a></li>
          <li><a href="Signup.php" style=" background-color: red; color:white; border-radius:12px; "> Sign up</a></li>
          <li><a href="login.php" style=" background-color: red; color:white; border-radius:12px;"> Login </a></li>
        </ul>

  </div>
</div>
</div>
<!-- end #menu -->

<div id="wrapper">
  <!-- end #header -->
  <div id="page">
    <div id="page-bgtop">
      <div id="page-bgbtm">
        <div id="content">
          <div class="post">
            <div style="clear: both;">&nbsp;</div>
            <h2 class="title">Login </h2>
            <div style="clear: both;">&nbsp;</div>

          </div>

          <form class="form" style="width:500px">
            <div style="float : left">
              <p>Email Address :</p>
              <input type="text" id="email" placeholder="Enter Email Address" size="30">
            </div>
          </form>
          <form class="form" style="width:500px">
            <div style="float : left">
              <p>Password</p>
              <input type="password" id="password"  placeholder="Enter password" size="30">
            </div>
          </form>
          <div style="text-align:center; width: 600px">
              <a href="forgotpass.php">forgot password?</a>
          </div>
          <div class="button" type="submit" onclick="login_function();return false;" value="submit" style="margin-left: 400px; margin-bottom:50px">Submit</div>
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
				<script>
            function login_function() {
                var email = document.getElementById("email").value;
                var password = document.getElementById("password").value;

                $.ajax({
                    type: "POST",
                    url: "ajax_login.php",
                    data: {
                        'email' : email,
                    'password' : password},
                    dataType: "text",
                    success: function(data){
                        if(data == 'success'){
                            Swal.fire(
                            'Well done!',
                            'Login Success!',
                            'success'
                            ).then(function() {
                                window.location = "users/profile.php";
                            });
                        }
                        else if(data == 'success2'){
                            Swal.fire(
                            'Well done!',
                            'Login Success!',
                            'success'
                            ).then(function() {
                                window.location = "users/admin/consignment.php";
                            });
                        }
                        else if(data == 'fail'){
                            Swal.fire(
                            'Login fail',
                            'please try again',
                            'warning'
                            )
                        }
                    }
                });
                return false;
            }
        </script>
				<script src="assets/js/core/jquery.min.js"></script>
				<script src="assets/js/sweetalert2.all.min.js"></script>
  </body>
</html>
