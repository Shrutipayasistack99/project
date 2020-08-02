<?php
  require("config.php");
?>
<!DOCTYPE html>
<html>
<head>
	<title>AdSTOK</title>
	<link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
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
            <a class="nav-link" href="about_us.php"><strong>About</strong></a>
          </li>
          <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#" ><?php echo $id = (isset($_SESSION['email']) ? $_SESSION['email'] : ''); ?><span class="caret"></span></a>
         <ul class="dropdown-menu">
           <li><a href="change_password.php">Change Password</a></li>
           <li><a href="logout.php">Logout</a></li>
         </ul>
         </li>
        </ul>
      </div>
    </nav>
<div class="topnav">
  <a href="laptop.php">Laptop</a>
  <a href="mobile.php">Mobile phone</a>
  <a href="books.php">Books</a>
  <div class="topnav-right">
</div>
</div>
</body>
