<?php
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





<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 50%;
        width: 40%;
        float: right;
        margin-right: 10%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
    <link href='https://fonts.googleapis.com/css?family=Josefin Sans' rel='stylesheet'type="text/css" />
		<link href="page.css" rel="stylesheet" type="text/css" media="screen" />
			<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
  </head>

<html>
  <body>
    <?php
      if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] != true){
      ?>
      <div id="menu-wrapper">
        <div id="menu">
          <div id="image" style="width:1100px;">
            <img src="assets/image/post.png" style="height:71px; width:auto">
            <ul>
              <li><a href="index.php">Home</a></li>
              <li><a href="sendparcel.php">Send Parcel</a></li>
              <li><a href="track.php">Tracking </a></li>
              <li class="current_page_item"><a href="map.php">Outlet Locater</a></li>
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
            <li ><a href="index.php">Home</a></li>
            <li><a href="sendparcel.php">Send Parcel</a></li>
            <li><a href="track.php">Tracking </a></li>
            <li class="current_page_item"><a href="">Outlet Locater</a></li>
          </ul>
          <div class="dropdown" style="float:right; ">
            <button class="dropbtn">Hi <?php echo $result['cust_fname'];?></button>
            <div class="dropdown-content">
              <a href="users/profile.php">User profile</a>
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
  <table style="float:left; width:50%;">
    <tr>
      <th style="text-align: left; padding-left: 14%;"><h2>Post 'N Go - Headquarter</h2></th>
    </tr>
    <tr>
      <td style="padding-left: 14%;">
        Jalan Sultan Hishamuddin, City Centre,
        50480 Kuala Lumpur, Wilayah Persekutuan Kuala Lumpur</td>
    </tr>
    <tr>
      <th style="text-align: left; padding-left: 14%;">
    Business Hours</th>
    </tr>
    <tr>
      <td style=" padding-left: 14%; width: 55%;">Monday - Friday <br>
        Saturday <br>
        Sunday</td>
        <td>
          8:30AM to 5:30PM <br>
          8:30AM to 1:00PM <br>
          Closed</td>
    </tr>

    <tr>
      <th style="text-align: left; padding-left: 14%;"><h2>Post 'N Go - Gombak</h2></th>
    </tr>
    <tr>
      <td style="padding-left: 14%;">
        5, Jalan Gombak, Taman Tai Onn, 53000 Kuala Lumpur,
         Wilayah Persekutuan Kuala Lumpur</td>
    </tr>
    <tr>
      <th style="text-align: left; padding-left: 14%;">
    Business Hours</th>
    </tr>
    <tr>
      <td style=" padding-left: 14%; width: 55%;">Monday - Friday <br>
        Saturday <br>
        Sunday</td>
        <td>
          8:30AM to 5:30PM <br>
          8:30AM to 1:00PM <br>
          Closed</td>
    </tr>

      <th style="text-align: left; padding-left: 14%;"><h2>Post 'N Go - Cheras</h2></th>
    </tr>
    <tr>
      <td style="padding-left: 14%;">
      25 & 27, Jalan 4/96a, Taman Cheras Makmur, 56100 Kuala Lumpur,
       Wilayah Persekutuan Kuala Lumpur</td>
    </tr>
    <tr>
      <th style="text-align: left; padding-left: 14%;">
    Business Hours</th>
    </tr>
    <tr>
      <td style=" padding-left: 14%; width: 55%;">Monday - Friday <br>
        Saturday <br>
        Sunday</td>
        <td>
          8:30AM to 5:30PM <br>
          8:30AM to 1:00PM <br>
          Closed</td>
    </tr>

  </table>

  <div id="map"></div>





    <script>
      var customLabel = {
        restaurant: {
          label: 'HQ'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(3.1390, 101.6869),
          zoom: 10
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('http://localhost:8012/fyp/xml.php', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>


    <script async
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAYK4mfqaif9rRiIce9R_itPRW-cVl1f_I&callback=initMap">
    </script>
  </body>
</html>
