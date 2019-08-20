<?php
	include 'lib/connect.php';
?>
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
						<li><a href="search.php">Search</a></li>
						<li><a href="register.php">SignUp/SignIn</a></li>
					</ul>
				</div>	
			</div>
		</nav>
		<div class ="container">
			<div class ="row">
				<div class="col-sm-6">
					<h1>Welcome to TravelTime</h1>
					<p class ="big-text">A place for all your travel needs!</p>
				</div>
				<div class="col-sm-6">
					<img src="images/homepage1.jpg" class="img-responsive"></img>
				</div>
			</div>
		</div>
		<h2 class ="big-text" align="center">SEE <br>ALL <br>HOLIDAY <br>PACKAGES <br>BELOW</h2>
	</header>
	
	<br></br><br></br>
	
	<!--Holiday Packages-->
	<div class="container">
    		<div class="row">
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Amsterdam</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 200</span>
    							</div>
    						</div>
    						<p>Skip town for the weekend and learn what makes Amsterdam one of Europe's most popular destinations. Experience a city teeming with culture and charm - with its world famous art galleries, museums and unique nightlife, a city break to Amsterdam is certainly one of the most exciting trips you can take.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Rome</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 250</span>
    							</div>
    						</div>
    						<p>As the birthplace of Western civilization, Rome is renowned for its rich cultural and architectural history. The city's endless list of places to visit and sights to see, including Vatican City and the Colosseum, is trumped only by its reputation for offering some of the finest Italian cuisine.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Prague</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 350</span>
    							</div>
    						</div>
    						<p>Prague is the biggest city in the Czech Republic, and perhaps one of the most beautiful destinations in Europe.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Budapest</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 300</span>
    							</div>
    						</div>
    						<p>The heart of Europe and pearl if the Danube, extensive world heritage sites.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
				<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">New York</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 500</span>
    							</div>
    						</div>
    						<p>Famously known as the city that never sleeps, New York is a destination that’s so rich in cultural reference points and iconography, it’s difficult to know where to start when it comes to planning a trip.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">London</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 475</span>
    							</div>
    						</div>
    						<p>If you ask a Londoner what to do in London, they’ll get all excited and write you a lengthy list of all the places you should go and things you should see. And then argue about the best pubs and where to get “proper” fish and chips.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Tenerife</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 280</span>
    							</div>
    						</div>
    						<p>The largest of the seven Canary Islands,Tenerife enjoys a year round warm climate and features fabulous beaches, making it the ideal destination for a break in the sun.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Lanzarote</a></h3>
		    						<p class="">
		    							<span>Stars Razing: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 575</span>
    							</div>
    						</div>
    						<p>Located in the cluster of the Canary Islands, Spain, a holiday in Lanzarote has all the fun of a Spanish holiday but with the mystery of a desert island escape. Less than 100 miles from the coast of Africa, a holiday to Lanzarote is definitely not Lanzagrotty.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
				<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Algrave</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5 </span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 370</span>
    							</div>
    						</div>
    						<p>The Algarve translates, not very imaginatively, as ‘the west’. Surprisingly enough, it’s found on the west of Portugal where the sun shines all year round and the Atlantic Ocean laps at your toes.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Las Vegas</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 600</span>
    							</div>
    						</div>
    						<p>Visit the famous city of Vegas... whatever happens in Vegas, stays in vegas.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Dubai</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 700</span>
    							</div>
    						</div>
    						<p>This vibrant destination surrounds itself in superlatives: if it’s not the tallest, largest, longest or the fastest then Dubai doesn’t want to know.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    			<div class="col-sm col-md-6">
    				<div class="">
    					<div class="">
    						<div class="">
    							<div class="">
		    						<h3><a href="#">Marrakesh</a></h3>
		    						<p class="">
		    							<span>Stars Rating: 5</span>
		    						</p>
	    						</div>
	    						<div class=>
	    							<span class="">Euro: 800</span>
    							</div>
    						</div>
    						<p>Marrakesh, a former imperial city in western Morocco, is a major economic center and home to mosques, palaces and gardens.</p>
    						<p class=""><span>2 days 3 nights</span></p>
    						<hr>
    						<p class="">
    							<span><a href="#">Discover</a></span>
    						</p>
    					</div>
    				</div>
    			</div>
    		</div>
    </div>
	<!--End of Packages-->
</body>
</html>