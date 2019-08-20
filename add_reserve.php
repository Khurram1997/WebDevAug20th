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
				<li><a href="mybookings.php"><button class="loginbutton" type="submit">My Bookings</button></a></li>

				</ul>
			</div>	
			
			</div>
			
		</nav>
		
		<div class ="container">
		<div class ="row">
		
			<div class="col-sm-6">
				<h1>Welcome to Room Reservation</h1>
				<p class ="big-text">Make booking:</p>
				<?php 
				if(isset($_SESSION['username'])){
					echo "You can book now: {$_SESSION['username']}";
				}
				?>
			</div>
			
			<div class="col-sm-6">
				<img src="images/homepage1.jpg" class="img-responsive"></img>
			
			</div>
		</div>
		
		<strong><h3>Book now</h3></strong>
					<?php 
						require_once 'lib/connect.php';
						$query = $con->query("SELECT * FROM `room` WHERE `room_id` = '$_REQUEST[room_id]'") or die(mysql_error());
						$fetch = $query->fetch_array();
					?>
					<div style = "height:300px; width:800px;">
						<div style = "float:left;">
							<img src = "photo/<?php echo $fetch['photo']?>" height = "300px" width = "400px">
						</div>
						<div style = "float:left; margin-left:10px;">
							<h3><?php echo $fetch['room_type']?></h3>
							<h3 style = "color:#00ff00;"><?php echo "Euros. ".$fetch['price'].".00";?></h3>
						</div>
					</div>
					<br style = "clear:both;" />
					<div class = "well col-md-4">
						<form method = "POST" enctype = "multipart/form-data">
							<div class = "form-group">
								<label>Firstname</label>
								<input type = "text" class = "form-control" name = "firstname" required = "required" />
							</div>
							<div class = "form-group">
								<label>Middlename</label>
								<input type = "text" class = "form-control" name = "middlename" required = "required" />
							</div>
							<div class = "form-group">
								<label>Lastname</label>
								<input type = "text" class = "form-control" name = "lastname" required = "required" />
							</div>
							<div class = "form-group">
								<label>Address</label>
								<input type = "text" class = "form-control" name = "address" required = "required" />
							</div>
							<div class = "form-group">
								<label>Contact No</label>
								<input type = "text" class = "form-control" name = "contactno" required = "required" />
							</div>
							<div class = "form-group">
								<label>Check in</label>
								<input type = "date" class = "form-control" name = "date" required = "required" />
							</div>
							<br />
							<div class = "form-group">
								<button class = "btn btn-info form-control" name = "add_guest"><i class = "glyphicon glyphicon-save"></i> Submit</button>
							</div>
						</form>
					</div>
					<div class = "col-md-4"></div>
					<?php require_once 'add_query_reserve.php'?>
		
	</div>
	
	
	
	</header>

</body>
</html>