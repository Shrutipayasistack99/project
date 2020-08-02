<?php
   require('config.php');
   //echo $_GET['id'];

?>
<!DOCTYPE html>
<html>
<head>
	<title>Buyer Information</title>

  <link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

</head>
<style type="text/css">
  footer{
    position: absolute;
    bottom: 0;
    width: 100%;
  }
</style>
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
          <li class="nav-item"><?php echo $id = (isset($_SESSION['email']) ? $_SESSION['email'] : ''); ?>

           <a class="nav-link" href="change_password.php"><strong>Change Password</strong></a>
         </li>
           <li class="nav-item" >
             <a class="nav-link" href="logout.php"><strong>Logout</strong></a>
           </li>

        </ul>
      </div>
    </nav>
<div class="container">
  <h2>Product Sold</h2>
  <form class="form-horizontal" action="set_buyer.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-3" for="advt_id">Advertisement ID</label>
      <div class="col-sm-9">
        <input type="number" class="form-control" id="advt_id" placeholder="Advertisement ID" name="advt_id" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-3" for="product_name">Buyer Registered Email Id:</label>
      <div class="col-sm-9">
        <input type="email" class="form-control" id="buyer_email" placeholder="Email Id" name="buyer_email" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-3 col-sm-9">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
</form>
</div>
<footer class="container-fluid bg-4 text-center">
  <p>@ 2019 Copyright: <a href="home.php">www.adstok.com </a>| Designed by Shruti Payasi</p>
</footer>

<?php

if(isset($_POST['submit'])){
	$user_id = $_SESSION['email'];
	$advt_id = mysqli_escape_string($db,$_POST['advt_id']);
	$buyer_id = mysqli_escape_string($db,$_POST['buyer_email']);
	//check if buyer id is not same to the id which is logged in
	if($user_id == $buyer_id){
		echo "<script type='text/javascript'>alert('Buyer ID cannot be same as Logged in ID')</script>";
	}
    //$advt_id = $_SESSION['ad_id'];
    $advt_id_num = (int)$advt_id;
    //echo gettype($advt_id_num);

    $query = "UPDATE Advertisement SET buyer_id = '$buyer_id' WHERE advt_id = '$advt_id_num' and owner_id = '$user_id'";
    $result = mysqli_query($db,$query);

    if($result){
       echo "<script type='text/javascript'>alert('Updated Succesfully')</script>";
    }
    else{
    	echo "<script type='text/javascript'>alert('Failed! Try again')</script>";
    }
}

?>
