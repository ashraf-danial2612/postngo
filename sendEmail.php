<?php
    use PHPMailer\PHPMailer\PHPMailer;
	require_once "connect.php";
	
	if (isset($_POST['email'])) {
		$email = mysqli_real_escape_string($conn, $_POST['email']);
		$time = time();
        $hash = md5( rand(0,1000) );
		
		$qry = mysqli_query($conn, "SELECT * FROM customers WHERE cust_email = '".$email."'");
		$result = mysqli_fetch_assoc($qry);
		if ($result > 0)
		{
			mysqli_query($conn,"UPDATE customers SET forget_password_time = '$time', email_verification = '$hash' WHERE cust_email = '$email'");
			$name = $result["cust_fname"];
			$body = "<div>
			<br>
			<img src='assets/image/post.png' style='margin-top: 5px; width:250px; height: 50px;'><br><br>
			
			<p style='font-weight: bold;'>
			Dear <b>". $name."</b>,</p>
			We received a password recovery request on Post 'N Go.
			
			<br><br>
			Please click the link below to reset your password:</p>
			<p style='font-weight:bold; color: blue;'>
			<a href=http://localhost/fypfrontend/reset_password.php?email=".$email."&hash=".$hash.">Reset Password!</a></p>
			<p>Please reset your password <b>within 15 minutes</b> to avoid link expiration.
			<br><br>
			Best Regards,<br>
			Post 'N Go Team</p> </div>";
			
			require_once "PHPMailer/PHPMailer.php";
			require_once "PHPMailer/SMTP.php";
			require_once "PHPMailer/Exception.php";
			
			$mail = new PHPMailer();
			
			//SMTP Settings
			$mail->isSMTP();
			$mail->Host = "smtp.gmail.com";
			$mail->SMTPAuth = true;
			$mail->Username = "96acapgamer@gmail.com";
			$mail->Password = 'ashrafacap';
			$mail->Port = 465; //587
			$mail->SMTPSecure = "ssl"; //tls
			
			//Email Settings
			$mail->SetFrom("postngo@gmail.com", "postngo@gmail.com");
			$mail->addAddress($email);
			$mail->Subject = "Post 'N Go - Forgot Password Recovery"; 
			$mail->MsgHTML($body);
			$mail->isHTML(true);
			
			if ($mail->send()) {
				$status = "success";
				$response = "Email is sent!";
				} else {
				$status = "failed";
				$response = "Something is wrong: <br><br>" . $mail->ErrorInfo;
			}
		}
		else{
			$status = "failed";
			$response = "Email not existed";
		}
	}
	
	exit(json_encode(array("status" => $status, "response" => $response)));
?>
