<!DOCTYPE html>
<html>
	<head>
		<title>TravelTime</title>
		<link rel="stylesheet" type="text/css" href="css/style.css">

		<!--CDN for bootstrap functionality-->
		<!--Latest compiled and minified CSS-->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!--jQuery library-->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!--Latest compiled JavaScript-->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
		
		<!--For search table (style)-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<style>
			* {
			  box-sizing: border-box;
			}

			#myInput {
			  background-image: url('/css/searchicon.png');
			  background-position: 10px 10px;
			  background-repeat: no-repeat;
			  width: 100%;
			  font-size: 16px;
			  padding: 12px 20px 12px 40px;
			  border: 1px solid #ddd;
			  margin-bottom: 12px;
			}

			#myTable {
			  border-collapse: collapse;
			  width: 100%;
			  border: 1px solid #ddd;
			  font-size: 18px;
			}

			#myTable th, #myTable td {
			  text-align: left;
			  padding: 12px;
			}

			#myTable tr {
			  border-bottom: 1px solid #ddd;
			}

			#myTable tr.header, #myTable tr:hover {
			  background-color: #f1f1f1;
			}
		</style>
	</head>
<body>
	<!--Top of page/navigation-->
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
							<li><a href="index.php">Home</a></li>
							<li><a href="register.php">SignUp/SignIn</a></li>
						</ul>
					</div>	
				</div>
			</nav>
			<!--Search table-->
			<div class ="container">
				<div class ="row">
					<div class="col-sm-6">
						<h1>Search</h1>
						<p class ="big-text">Search a place to go to below...</p>
					</div>
					<div class="col-sm-6">
						<img src="images/homepage1.jpg" class="img-responsive"></img>
					</div>
				</div>
			</div>
			<h2 class ="big-text" align="center" >SEARCH FOR PLACES TO VISIT</h2>
		<input type="text" id="myInput" onkeyup="myFunction()" placeholder="CLICK HERE TO SEARCH!" title="Type in a name">

		<table id="myTable">
		  <tr class="header">
			<th style="width:20%;" height="50%">Destination</th>
		  </tr>
		  <tr>
			<td>Amsterdam</td>
		  </tr>
		  <tr>
			<td>Rome</td>
		  </tr>
		  <tr>
			<td>Prague</td>
		  </tr>
		  <tr>
			<td>Budapest</td>
		  </tr>
		  <tr>
			<td>New York</td>
		  </tr>
		  <tr>
			<td>London</td>
		  </tr>
		  <tr>
			<td>Tenrife</td>
		  </tr>
		  <tr>
			<td>Lanzarote</td>
		  </tr>
		</table>
	</header>
	<!--JS search table function for filtering out results
	https://www.w3schools.com/howto/howto_js_filter_table.asp-->
	<script>
		function myFunction() 
		{
		  var input, filter, table, tr, td, i, txtValue;
		  input = document.getElementById("myInput");
		  filter = input.value.toUpperCase();
		  table = document.getElementById("myTable");
		  tr = table.getElementsByTagName("tr");
		  for (i = 0; i < tr.length; i++) {
			td = tr[i].getElementsByTagName("td")[0];
			if (td) {
			  txtValue = td.textContent || td.innerText;
			  if (txtValue.toUpperCase().indexOf(filter) > -1) {
				tr[i].style.display = "";
			  } else {
				tr[i].style.display = "none";
			  }
			}       
		  }
		}
	</script>
</body>
</html>