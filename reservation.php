<?php
session_start();
//error_reporting(0);
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
				<li><a href="mybookings.php"><button class="loginbutton" type="submit">My Bookings</button></a></li>

				</ul>
			</div>	
		
		</div>
		
	</nav>
	
	<div class ="container">
		<div class ="row">
		
			<div class="col-sm-6">
				<h1>Welcome to Room Reservation</h1>
				<p class ="big-text">Browse our deals below:</p>
				<!--Greeting message to the user-->
				<div class="">
					<?php 
					if(isset($_SESSION['username'])){
						echo "Hello: {$_SESSION['username']}";
					}
					?>
				</div>
			</div>
			
			<div class="col-sm-6">
				<img src="images/homepage1.jpg" class="img-responsive"></img>
			
			</div>
		</div>
		
			<strong><h3>MAKE A RESERVATION</h3></strong>
				<!--Displaying data for htel rooms reservation-->
				<?php
					require_once 'lib/connect.php';
					$query = $con->query("SELECT * FROM `room` ORDER BY `price` ASC") or die(mysql_error());
					while($fetch = $query->fetch_array()){
				?>
					<div class = "well" style = "height:300px; width:100%;">
						<div style = "float:left;">
							<!--fetching data from database and displaying a table form-->
							<img src = "images/<?php echo $fetch['photo']?>" height = "250" width = "350"/>
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3><?php echo $fetch['room_type']?></h3>
							<h4 style = "color:#00ff00;"><?php echo "Price: Euros. ".$fetch['price'].".00"?></h4>
							<br /><br /><br /><br /><br /><br />
							<a style = "margin-left:580px;" href = "add_reserve.php?room_id=<?php echo $fetch['room_id']?>" class = "btn btn-info"><i class = "glyphicon glyphicon-list"></i> Reserve</a>
						</div>
					</div>
				<?php
					}
				?>
	
	</div>
	
	</header>

</body>
</html>