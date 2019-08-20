<?php
session_start();
//check if user has hit the sign in button or not
if(isset($_POST['submit'])){
	$error="";
	$error1="";
	
	include 'lib/connect.php';
	//to check if the fileds are empty, if they are empty.. display an error 
	if(!empty($_POST['username']) && !empty($_POST['password'])) {
		$username=$_POST['username'];
		$password=$_POST['password'];
	
		//escape_string: takes two args; connection and string that needs to be escaped
		//filter_var: filters; filter_sanitize
		//strip_tags: used to strip out tags inside input fields, eliminates them
		//...all to secure the data
		$username=mysqli_escape_string($con,filter_var(strip_tags($_POST['username']),FILTER_SANITIZE_STRIPPED));
		$password=mysqli_escape_string($con,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));
		
		//to encrypt the password
		$hash_password=hash('sha256',$password);
		
		$sql="SELECT * FROM users WHERE UserName='$username' AND Password='$hash_password'";
		$result=mysqli_query($con,$sql);
		//storing the number of rows returned from the query
		$rows=mysqli_num_rows($result);
		//returning associated array of the resulted query
		$array=mysqli_fetch_assoc($result);
		
		//to see if user has activated their account before allowing them to log in
		if($rows>0){
			//if not active display error
			if($array['Active']==0){
				$error1="Acivate your account before logging in!";
			}
			//if account is activated display success message
			else{
				//$sucess="Login Successful!";
				$_SESSION['username']=$username;
				header("Location:profilewithfeatures.php");
				
			}
		}
	}
	
	else{
		$error="Enter a valid username and password combination to continue!";
	}
}

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" style="text/css" href="css/rpagestyle.css"/>
<title>Login</title>
<body background="images/loginpage.jpg">
	<a href="register.php"><button class="loginbutton" type="submit">Back to SignUp</button></a>
	<br></br>
	<a href="index.php"><button class="loginbutton" type="submit">Back to Home</button></a>
	<br></br>
	<br></br>
	<div id="section">
		<h1>SignIn for ALL FEATURES</h1>
		<form name="loginform" onSubmit="return validateForm();" method="post" action="login.php">
			<input type="text" value="" name ="username" placeholder="username" required = "required"/>
			<input type="password" value="" name ="password" placeholder="password" required = "required"/>
			<input type="checkbox" name ="rememberme"/>
			<span class="checkboxtext">Remember Me!</span><br>
			<button type="submit" name="submit">SignIn</button><br></br>
			<a style="display:block;color=white;margin-top:10px;" href="forgotpassword.php">Forgot Password?</a>
			<span style="color:white;position:relative;top:20px;">
				<!--diaplsy messages to users if they entered invalid details-->
				<?php
					if(isset($error)){
						echo $error;
					}
					if(isset($error1)){
						echo $error1;
					}
				?>
			
			</span>
		</form>
		
		<!--Check if username field is empty if so pop up alert message
		https://stackoverflow.com/questions/23134756/simple-javascript-login-form-validation/23135360-->
		<script>
			function validateForm() 
			{
				var un = document.loginform.usr.value;
				//var pw = document.loginform.pword.value;
				var username = "username"; 
				//var password = "password";
				if (un == username) {
					return 'login.php';
				}
				else {
					alert ("Login was unsuccessful, please check your username and password");
					return false;
				}
			}
		</script>
	</div>
</body>
</html>