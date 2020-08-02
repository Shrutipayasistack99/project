<?php
  require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Change Password</title>
	<link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
</head>
<style type="text/css">
  footer{
    position: absolute;
    bottom: 0;
    width: 100%;
  }
</style>
<body >

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
  <h2>Change Password</h2>
  <form class="form-horizontal" action="change_password.php" method="post">
    <br>
    <div class="form-group">
      <label class="control-label col-sm-2" for="curr_pass">Current Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="curr_pass" placeholder="Current Password" name="curr_pass" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="new_pass">New Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="new_pass" placeholder="New Password" name="new_pass" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2" for="retype_new_pass">Current Password</label>
      <div class="col-sm-10">
        <input type="password" class="form-control" id="retype_new_pass" placeholder="Retype New Password" name="retype_new_pass" required>
      </div>
    </div>
    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Change</button>
      </div>
    </div>
  </form>
</div>
<?php
   $email_id = $_SESSION['email'];
   if(isset($_POST['submit'])){
   $query1 = "SELECT * FROM Users WHERE email_id = '$email_id'";
   $result1 = mysqli_query($db,$query1);
   $row1 = mysqli_fetch_assoc($result1);
   $curr_password = mysqli_escape_string($db,$_POST['curr_pass']); //current password taken as input
   $current_pass = $row1["User_password"]; // current password of the user
   if($current_pass == $curr_password){
       $new_password = mysqli_escape_string($db,$_POST['new_pass']);
       $retype_new_password = mysqli_escape_string($db,$_POST['retype_new_pass']);
       if($new_password == $retype_new_password){
             $query2 = "UPDATE Users SET User_password = '$new_password' WHERE email_id = '$email_id'";
             $result2 = mysqli_query($db,$query2);
             if($result2){
               echo "<script type='text/javascript'>alert('Password succesfully changed')</script>";

             }
       }else{
          echo "<script type='text/javascript'>alert('New Password and Retype Password are not same!')</script>";
          exit;
       }
   }
   else{
       echo "<script type='text/javascript'>alert('Current Password you entered is Incorrect!')</script>";
   }

}
?>
