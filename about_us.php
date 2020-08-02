<?php
require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>About Us</title>
	<link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/hanken" type="text/css"/>
</head>
<body>
	<nav class="navbar navbar-expand-lg navbar-light bg-light">
			<a class="navbar-header" href="home.php">AdSTOK</a>
			<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarNavDropdown">
				<ul class="navbar-nav">
					<li class="nav-item active">
						<a class="nav-link" href="home.php"><strong>Home</strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="my_products.php"><strong>My Products</strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="bought_products.php"><strong>Bought Products</strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="message.php"><strong>Messages</strong></a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="about_us.php"><strong>About Us</strong></a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $id = (isset($_SESSION['email']) ? $_SESSION['email'] : ''); ?><span class="caret"></span></a>
						<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
							<a class="dropdown-item" href="change_password.php">Change Password</a>
							<a class="dropdown-item" href="logout.php">Logout</a>

						</div>
					</li>
				</ul>
			</div>
		</nav>

  <h1 style="text-align: center;background-color:#D1E8E2;font-family: 'HankenBook';font-weight: normal;font-style: normal;padding: 50px 0px 50px 10px; width: 100%;">About Us</h1>
  <!--<div class="container">-->
  	<div style="background-color: #FFCB9A;  width: 100%;">
  		<p style="color: white;padding: 50px 0px 50px 0px;font-size: 25px;text-align: center;">AdStoK.com is a free local classifieds site. Sell anything from  mobiles, laptops and Books. Submit ads for free . If you want to buy something - here you will find interesting items, cheaper than in the store. Start buying and selling in the most easy way on AdStocK.com.</p>
  		<center><h2 style="padding: 50px 0px 50px 0px;color: white;">Connect Us</h2></center>
  	            <div style="padding-bottom: 30px;">
  	            <center><a href="https://www.facebook.com "><i id="social-fb" class="fa fa-facebook-square fa-3x social"></i></a>
	            <a href="https://twitter.com"><i id="social-tw" class="fa fa-twitter-square fa-3x social"></i></a>
	            <a href="https://plus.google.com"><i id="social-gp" class="fa fa-google-plus-square fa-3x social"></i></a>
	            <a href="https://www.envelopes.com/"><i id="social-em" class="fa fa-envelope-square fa-3x social"></i></a>
	            </center>
	            </div>
  	</div>
  <!--</div>-->
</body>
</html>
