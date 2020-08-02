<?php
require("config.php");
?>
<!DOCTYPE html>
<html>
<title>AdSTOK</title>
<link rel="stylesheet" type="text/css" href="css/home.css">
<link rel="stylesheet" type="text/css" href="css/footer.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<link href="//maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">
<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-MfvZlkHCEqatNoGiOXveE8FIwMzZg4W85qfrfIFBfYc= sha512-dTfge/zgoMYpP7QbHy4gWMEGsbsdZeCXz7irItjcC3sPUFtf0kuFbDz/ixG7ArTxmDjLXDmezHubeNikyKGVyQ==" crossorigin="anonymous">
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/pecita" type="text/css"/>
<link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/hobby-of-night" type="text/css"/>
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
             <a class="nav-link" href="about_us.php"><strong>About</strong></a>
           </li>
           <li class="nav-item"><?php echo $_SESSION['email']; ?>

            <a class="nav-link" href="change_password.php"><strong>Change Password</strong></a>
          </li>
            <li class="nav-item" >
              <a class="nav-link" href="logout.php"><strong>Logout</strong></a>
            </li>

         </ul>
       </div>

     </nav>
     <center>
         <div class="text-center">
             <h5 class="tp1">Buy Sell And Find Just about anything!!!</h5>
              <h6 class="tp1">Are You Ready To Explore?</h6>
                        <div class="button">
             	<a href="advertise.php" class="btn-one button_n">Advertise</a>
             	<a href="purchase.php" class="btn-two button_n">Purchase</a>
             </div>
         </div>
         </center>
         </header>
         <div class="row">
  <div class="column">
    <img src="../dbms/images/books.jfif" alt="Book" style="width:100%">
  </div>
  <div class="column">
    <img src="../dbms/images/laptop.jpg" alt="Laptop" style="width:100%">
  </div>
  <div class="column">
    <img src="../dbms/images/mobi.jpg" alt="Mobile" style="width:100%">
  </div>
</div>


     <footer class="container-fluid bg-4 text-center">
       <p>@ 2019 Copyright: <a href="home.php">www.adstok.com </a>| Designed by Shruti Payasi</p>
     </footer>
