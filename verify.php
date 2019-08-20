<!--to check if the email and the unique activation code in the sent email match the email and activation code inside the database users-->
<?php
session_start();
include ('lib/connect.php');

//If these two variables are set in the email then do the following inside
if(isset($_GET['email']) && isset($_GET['activation_code']))
{
	$success="";
	$error="";
	$error1="";
	$email=$_GET['email'];
	$activation_code=$_GET['activation_code'];
	
	//function escapes special characters in a string for use in an SQL statement
	$email=mysqli_escape_string($con,$email);
	$activation_code=mysqli_escape_string($con,$activation_code);
	
	$sql="SELECT Email,Activation_Code FROM users WHERE Email='$email' AND Activation_Code='$activation_code' AND Active=0";
	
	$result=mysqli_query($con,$sql);
	
	$rows=mysqli_num_rows($result);
	
	//if the number of rows written by the result above is grater than 0, than the email & activation code is right & 
	//the user has clicked the right url to move forward
	if($rows > 0) {
		$sql="UPDATE users SET Active=1 WHERE Email='$email' AND Activation_Code='$activation_code' AND Active=0";
		$result=mysqli_query($con,$sql);
		
		if($result) {
			$success="Account activated. Congratulations!";
		}
	}
	else{
		$error="Your account has already been";
	}

}
//if email and code is not set 
else{
	$error1="Use link given in email to activate the account to proceed";
}
?>

<!--displaying the following as a verification page after user has activated their account-->
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/rpagestyle.css">
<title>Varifying your account</title>
</head>
<body>
	<div id="section" style="color:white; margin-top:150px;">
		<?php 
			if(isset($success))
			{
				echo $success;
			}
			if(isset($error))
			{
				echo $error;
			}
			if(isset($error1))
			{
				echo $error1;
			}
		?>
	</div>
</body>