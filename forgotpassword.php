<?php
//to check if submit button has been clicked then excute the following
if(isset($_POST['submit']))
{
	include ('lib/connect.php');
	if(isset($_POST['email'])){
		$email=$_POST['email'];
		$email=mysqli_escape_string($con,filter_var(strip_tags($_POST['email']),FILTER_VALIDATE_EMAIL));
		$code=rand(9999,9999999);
		//concatenate random code onto email
		$password_code=$email . $code;
		$hash_password=hash('sha256',$password_code);
		$sql="SELECT Email FROM users WHERE Email='$email'";
		$result=mysqli_query($con,$sql);
		//to check if email is in the databse, not valid: display this error
		if(mysqli_num_rows($result)<0){
			$error="Email is not valid!";
		}
		else{
			//file downloaded off PHPMailer on GitHub: for use of activation email functionality
			require 'scripts/PHPMailerAutoload.php';

			$mail = new PHPMailer;

				$mail->isSMTP();
				$mail->Host       = 'smtp.gmail.com'; 
				$mail->SMTPAuth   = true;                         
				
				//include ('personalinformation.php');  
				$mail->Username   = 'khurram.f1997@gmail.com';                     // SMTP username
				$mail->Password   = 'kFarooq2k18';  
				
				$mail->SMTPSecure = 'tls';                               
				$mail->Port       = 587;                                   

				$mail->addAddress($email);

				$mail->isHTML(true);                                  
				$mail->Subject = 'Password request';
				$mail->Body    = "Enter the following password to access your account ----------------<br><br><br><br>
				
				Password:$password_code <br><br>
				
				Click to LOGIN to your acocunt -------------------<br><br><br><br>
				
				http://localhost/webdev/travelagency2/login.php";
			//sends email to user and updates password
			if($mail->send()) {
				$sql="UPDATE users SET Password='$password_code' WHERE Email='$email'";
				$result=mysqli_query($con,$sql);
				if($result){
					$success="Password has been sent to your email, associated with your accocunt";
				}
			}	
		}
	}
	else{
		echo "Enter a valid email, please!";
	}
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/rpagestyle.css"/>
<title>Forgot Password</title>
</head>
<body background="images/forgotpassword.jpg">
	<a href="login.php"><button class="loginbutton" type="submit">Back to SignIn</button></a>
	<br></br>
	<br></br>
	<br></br>
	<div id="section">
		<h1>Forgot Password: Enter email associated with account for password retrieval!</h1>
		<form method="post" action="forgotpassword.php">
			<input type="email" name="email" placeholder="email"/>
			<button type="submit" name="submit">Submit</button><br><br>
			<span style="color:white;"><?php if(isset($error)) {echo $error;} ?></span>
			<span style="color:white;"><?php if(isset($success)) {echo $success;} ?></span>
		</form>
	</div>
</body>
</html>