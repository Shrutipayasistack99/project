<?php
  require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Title</title>
	 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/footer.css">
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
  <link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" type="text/css" href="css/purchase.css">
</head>
<style type="text/css">
  .color-white{
    color: white;
  }
  .card{
    margin: 1px;
    border: 1px;
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
<?php
    $email_id = $_SESSION['email'];
    $query = "SELECT * FROM Messages WHERE receiver_id ='$email_id'";
    $result = mysqli_query($db,$query);

    while ($row = mysqli_fetch_assoc($result)){
          $sender_id = $row["sender_id"];
          $query2 = "SELECT *FROM Users WHERE email_id = '$sender_id'";
          $result2 = mysqli_query($db,$query2);
          $row2 = mysqli_fetch_assoc($result2);
          $sender_name = $row2["User_name"];
          ?>
         <div class="container">
<div class="row row-margin-bottom">
            <div class="col-md-12 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">

                        <div class="col-md-12">
                            <div class="lib-row lib-message">
                                <b><?php echo $sender_id; ?></b>
                                <!--<div class="lib-header-seperator"></div>-->
                            </div>

                            <div class="lib-row lib-data">
                                 <?php echo $row["message"]; ?>
                            </div>
                            <div class="lib-row lib-desc" style="text-align: right;">
                                 <?php echo $row["msg_date"]." ".$row["msg_time"]; ?>

                            </div>


                        </div>
                    </div>
                </div>
            </div>
            <!--<div class="col-md-1"></div>-->
        </div>
      </div>
    <?php
    }

?>

<a href="send_message.php"><center><button style="width: 50%;" type="submit" id="sold" name="sold" class="btn btn-primary" >CLICK TO MESSAGE</button></center></a>
