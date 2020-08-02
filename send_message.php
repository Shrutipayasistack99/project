<?php
  require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Title</title>
	<link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<style type="text/css">
  .color-white{
    color: white;
  }
</style>
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
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $_SESSION['email']; ?><span class="caret"></span></a>
            <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
              <a class="dropdown-item" href="change_password.php">Change Password</a>
              <a class="dropdown-item" href="logout.php">Logout</a>

            </div>
          </li>
        </ul>
      </div>
    </nav>
<div class="container">
  <h2>Send Messages</h2>
  <form class="form-horizontal" action="send_message.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2" for="advt_id">Email ID :</label>
      <div class="col-sm-10">
        <input type="email" class="form-control" id="email_id" placeholder="Email ID of Receiver" name="email_id" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 " for="msg">Message description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="msg" placeholder="Message description" name="msg"></textarea>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-9">
        <button type="submit" id="submit" name="submit" class="btn btn-primary">SEND</button>
      </div>
    </div>
</form>
</div>
<footer class="container-fluid bg-4 text-center">
  <p> <a href="home.php">www.adstok.com </a>| Designed by Shruti Payasi</p>
</footer>

<?php
  $email_id = $_SESSION['email'];
  if(isset($_POST['submit'])){
    $rec_email = mysqli_escape_string($db,$_POST['email_id']);
    $message = mysqli_escape_string($db,$_POST['msg'] );

    $today_date =  date("Y-m-d");
    $time = date("h:i A");
    $query = "INSERT INTO Messages (sender_id,receiver_id,message,msg_date,msg_time) VALUES ('$email_id','$rec_email','$message','$today_date','$time')";
    $result = mysqli_query($db,$query);
    if($result){
         echo "<script type='text/javascript'>alert('Message sent Successfully!')</script>";
    }
    else{
         echo "<script type='text/javascript'>alert('Error in sending message!!! Please try again.')</script>";
    }
  }
?>
