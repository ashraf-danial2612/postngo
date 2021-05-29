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
  <title>sign up</title>
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
            <h2 class="title">Tracking </h2>
            <div style="clear: both;">&nbsp;</div>
          </div>

          <form style="width:700px; margin-left: 100px;margin-bottom: 50px; " >
            <label>Please enter tracking number</label><br>
            <br>
            <label>No Tracking :</label>
              <input type="text" placeholder="MY16584252" size="30"  id="ref" name="ref">

              <div class="button" onclick="tracking_function();return false;" type="submit" value="submit" style="vertical-align: baseline; margin-left: 50px;" >Submit</div>
          </form>
          <div id="tracking_result" style="display:none;">
            <div style="display:inline-flex">
      			<h3>Reference Code</h3>
            <h3>Recipient Name</h3>
            <h3>Payment </h3>
            <h3>Status</h3>
            <h3>Date & Time</h3>
          </div>
          <br>
          <hr style="width:63%; float:left; margin-left:45px; color:#3B3B3B">
          <br>
          <div style="display:inline-flex">
            	<p id="result_cons_reference_code"></p>
              <p id="result_cons_fname" style="padding-left:33px"></p>
              <p id="result_cons_pay_method" style="padding-left:70px"></p>
              <p id="result_cons_status"></p>
              <p id="result_cons_datetime"></p>
          </div>
                </div>



              </div>
              </div>
              </div>


        </div>
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
    			function tracking_function() {
    				var ref = document.getElementById("ref").value;
    				alert(ref);

    				$.ajax({
    					type: "POST",
    					url: "ajax_tracking.php",
    					data: {
    					'ref' : ref},
    					dataType: "json",
    					success: function(data){
    						var result_cons_reference_code = data.tracking_result1;
    						var result_cons_fname = data.tracking_result2;
    						var result_cons_pay_method = data.tracking_result3;
    						var result_cons_status = data.tracking_result4;
    						var result_cons_datetime = data.tracking_result5;

    						document.getElementById("result_cons_reference_code").innerHTML = result_cons_reference_code;
    						document.getElementById("result_cons_fname").innerHTML = result_cons_fname;
    						document.getElementById("result_cons_pay_method").innerHTML = result_cons_pay_method;
    						document.getElementById("result_cons_status").innerHTML = result_cons_status;
    						document.getElementById("result_cons_datetime").innerHTML = result_cons_datetime;

    						document.getElementById("tracking_result").style.display = "block";
    					}
    				});
    				return false;
    			}
    		</script>
  </body>
</html>
