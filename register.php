<?php
session_start();
	//if submit button is clicked, perform
	if(isset($_POST['submit']))
	{
		//variables for user messages
		$error="";
		$success="";
		
		include('lib/connect.php');
		//to check if any details entered are empty: display message to user
		if (empty($_POST['name']) || empty($_POST['username']) || empty($_POST['email']) || empty($_POST['password']))
		{
			$error="Please, enter all the details requested!";
		}
		
		//escape_string: takes two args; connection and string that needs to be escaped
		//filter_var: filters; filter_sanitize
		//strip_tags: used to strip out tags inside input fields, eliminates them
		//...all to secure the data 
		$name=mysqli_escape_string($con,filter_var(strip_tags($_POST['name']),FILTER_SANITIZE_STRIPPED));
		$username=mysqli_escape_string($con,filter_var(strip_tags($_POST['username']),FILTER_SANITIZE_STRIPPED));
		$password=mysqli_escape_string($con,filter_var(strip_tags($_POST['password']),FILTER_SANITIZE_STRIPPED));
		$email=mysqli_escape_string($con,filter_var(strip_tags($_POST['email']),FILTER_VALIDATE_EMAIL));

		//to encrypt the password
		$hash_password=hash('sha256',$password);
		
		//for a unique activation code
		$activation_code=hash('sha256',rand(0,1000));
		
		$sql="SELECT * FROM users WHERE UserName='$username'";
		
		$result=mysqli_query($con,$sql);
		
		//checks if the username exists: 
		//function that writes the number of rows written by the query, 
		//if it is greater than 0... know that a username is exists
		if(mysqli_num_rows($result)>0)
		{
			$error="The chosen Username alraeady exists. Please choose another Username! ";
		}
		
		$sql="SELECT * FROM users WHERE Email='$email'";
		
		$result=mysqli_query($con,$sql);
		
		//checks if the username exists: 
		//function that writes the number of rows written by the query, 
		//if it is greater than 0... know that a username is present
		if(mysqli_num_rows($result)>0)
		{
			//append onto a previous error if it exists
			$error.=" Email already exists. Please choose another valid email address!";
		}
		
		//if there are no errors perform the following functionality: input fields info into database
		if(empty($error))
		{
			$sql="INSERT INTO users (Name,UserName,Email,Activation_Code,Password) VALUES('$name','$username','$email','$activation_code','$hash_password')";
			$result=mysqli_query($con,$sql);
			if($result)
			{
				//variables to store and set activation code
				$_SESSION['name']=$name;
				$_SESSION['username']=$username;
				$_SESSION['email']=$email;
				$_SESSION['password']=$password;
				
				$_SESSION['activation_code']=$activation_code;
				
				include('activateemail.php');
				
				$success="Please, confirm your account through your email to continue to SignIn!";
			}
		}
		
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/rpagestyle.css"/>
<title>Register/Login</title>
</head>
<body background="images/registerpage.jpg">
	<a href="login.php"><button class="loginbutton" type="submit">Already Registered, Go SignIn</button></a>
	<br></br>
	<a href="index.php"><button class="loginbutton" type="submit">Back to Home</button></a>
	<br></br>
	<br></br>
	<div id="section">
		<h1>Registration</h1>
		<!--Register form-->
		<form method="post" action="register.php">
		<input type="text" name="name" placeholder="name" required = "required"/>
		<input type="text" name="username" placeholder="username" required = "required"/>
		<input type="email" name="email" placeholder="email" required = "required"/>
		<input type="password" name="password" placeholder="password" required = "required"/>
		<button type="submit" name="submit">Register</button><br><br>
		<span style="color:white;"><?php if(isset($error)) {echo $error;} ?></span>
		<span style="color:white;"><?php if(isset($success)) {echo $success;} ?></span>
		</form>
	</div>
</body>
</html>