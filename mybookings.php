<?php
session_start();
?>
<html>
<head>
	<title>TravelTime</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">

	<!--following CDN for bootstrap functionality-->
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<body>
	<header class="header">
		<nav class="navabr navbar-style">
			<div class="container">
				<div class="navbar-header">
					<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#micon">
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					</button>
					
					<a href=""><img class="logo" src="images/logo.png" onclick="window.location.href = 'index.html'"></a>
				</div>
				<div class="collapse navbar-collapse" id="micon">
			
					<ul class="nav navbar-nav navbar-right">
					<!--<li><a href="">Search</a></li>-->
					<li><a href="logout.php"><button class="loginbutton" type="submit">LOGOUT</button></a>
					<li><a href="profilewithfeatures.php"><button class="loginbutton" type="submit">My Profile</button></a></li>
					<li><a href="reservation.php"><button class="loginbutton" type="submit">Make a Reservation</button></a></li>

					</ul>
				</div>	
			 
			</div>
			
		</nav>
		
		<div class ="container">
			<div class ="row">
			
				<div class="col-sm-6">
					<h1>Welcome to Bookings</h1>
					<p class ="big-text">Checkout your bookings below...</p>
					<?php 
					if(isset($_SESSION['username'])){
						echo "Hello: {$_SESSION['username']}";
					}
					?>
				</div>
				
				<div class="col-sm-6">
					<img src="images/homepage1.jpg" class="img-responsive"></img>
				
				</div>
			</div>
		</div>
		
	</header>

</body>
</html>