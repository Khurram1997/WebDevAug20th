<!DOCTYPE html>
<html lang="en">
<head>
<link rel="stylesheet" type="text/css" href="css/rpagestyle.css"/>
<title>Change Password</title>
</head>
<body>
	
	<!--<a href="login.php"><button class="loginbutton" type="submit">Back to SignIn</button></a>-->
	<a href="profilewithfeatures.php"><button class="loginbutton" type="submit">Back to Profile</button></a>
	<div id="section">
		<form action="changepassword.php" method="post">
		<h1>Change Password!!!</h1>
			<table>
				<tr>
					<th>
						Username:
					</th>
					<td>
						<input type="text" name="txtusername" placeholder="USERNAME" class="form-control">
					</td>
				</tr>
				<tr>
					<th>
						New Password
					</th>
					<td>
						<input type="password" name="txtnewpass" placeholder="NEW PASSWORD" class="form-control">
					</td>
				</tr>
				<tr>
					<th>
						Re-enter Password
					</th>
					<td>
						<input type="password" name="txtconfpass" placeholder="RE-ENTER PASSWORD" class="form-control">
					</td>
				</tr>
				<tr>
					<td>
						<input type="submit" value="Submit" name="btnchange" class="btn btn-danger"></input>
					</td>
					<td>
						<!--to go back to profile page-->
					</td>
				</tr>
			</table>
		</form>
		<?php
		
		include_once 'lib/connect.php';
		
		$btnchange= filter_input(INPUT_POST, "btnchange");
		if(isset($btnchange))
		{
			//https://www.php.net/manual/en/function.filter-input.php
			$username=filter_input(INPUT_POST, "txtusername");
			$newpass=filter_input(INPUT_POST, "txtnewpass");
			$confpass=filter_input(INPUT_POST, "txtconfpass");
			
			//encrypt the new password
			$hashed_password = password_hash($newpass, PASSWORD_DEFAULT);
		
			$query="SELECT username FROM users WHERE UserName='$username'";
			$run=mysqli_query($con,$query);
			$rows=mysqli_fetch_array($run);
			
			if($rows["username"]==$username)
			{
				if($newpass==$confpass)
				{
					//updating databse with new new password using username
					$update_query="UPDATE users SET Password='$hashed_password' WHERE UserName='$username'";
					$update_run=mysqli_query($con, $update_query);
					
					if($update_query)
					{
						echo "<script>alert('Password Changed Successfully')</script>";
					}
					else{
							echo "<script>alert('Password Change Failed!')</script>";
						}
				}
				else{
						echo "<script>alert('Password does not match, try again!')</script>";
					}
			}
		}
		?>
	</div>
</body>
</html>