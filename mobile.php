<?php
  require('config.php');
?>
<!DOCTYPE html>
<html>
<head>
	<title>Website Title</title>
	<link rel="stylesheet" type="text/css" href="css/advertise.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
</head>
<style type="text/css">
  .color-white{
    color: white;
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
        </li>
        <li class="nav-item"><?php echo $id = (isset($_SESSION['email']) ? $_SESSION['email'] : ''); ?>
         <a class="nav-link" href="change_password.php"><strong>Change Password</strong></a>
       </li>
         <li class="nav-item" >
           <a class="nav-link" href="logout.php"><strong>Logout</strong></a>
         </li>
            </div>
          </li>
        </ul>
      </div>
    </nav>
<div class="topnav">
  <a href="laptop.php">Laptop</a>
  <a href="mobile.php" class="active">Mobile phone</a>
  <a href="books.php" >Books</a>
  <div class="topnav-right">
</div>
</div>
	<div class="container">
  <h2 class="color-white">Post an Advertisement</h2>
  <form class="form-horizontal" action="mobile.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="product_name">Product Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="product_name" placeholder="Product Name" name="product_name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="manufacturer">Manufacturer</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="manufacturer" placeholder="Manufacturer" name="manufacturer" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="model_name">Model Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="model_name" placeholder="Model Name" name="model_name" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="yop">Year of Purchase</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="yop" placeholder="Year of Purchase" name="yop" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="description">Ad description</label>
      <div class="col-sm-10">
        <textarea class="form-control" id="description" placeholder="Ad description" name="description"></textarea>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="expected_price">Expected Price</label>
      <div class="col-sm-10">
        <input type="number" class="form-control" id="expected_price" placeholder="Expected Price" name="expected_price" required>
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-offset-2 col-sm-10">
        <button type="submit" name="submit" id="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>

<?php
    $today =  date("Y-m-d");
    $expiry = Date("Y-m-d",strtotime("+10 days"));
    $owner_email = $_SESSION['email'];

    if(isset($_POST['submit'])){
      $productName = mysqli_escape_string($db,$_POST['product_name']);
      $manufacturer = mysqli_escape_string($db,$_POST['manufacturer']);
      $modelName = mysqli_escape_string($db,$_POST['model_name']);
      $yearOfPurchase = mysqli_escape_string($db,$_POST['yop']);
      $description = mysqli_escape_string($db,$_POST['description']);
      $expectedPrice = mysqli_escape_string($db,$_POST['expected_price']);
      $mobile = "Mobile";
      $query1 = "INSERT INTO Advertisement (item_name,item_type,date_of_init,date_of_exp,owner_id) VALUES ('$productName','$mobile','$today','$expiry','$owner_email')";
      $result1 = mysqli_query($db,$query1);
      if($result1){
            $query2 = "SELECT advt_id FROM Advertisement where item_name = '$productName' and owner_id = '$owner_email'";
            $result2 = mysqli_query($db,$query2);

            $row = mysqli_fetch_assoc($result2);
            $temp =  $row["advt_id"];
            $query3 = "INSERT INTO Mobile (product_id,manufacturer,model_name,year_of_purchase,ad_description,expected_price)
             VALUES ('$temp','$manufacturer','$modelName','$yearOfPurchase','$description',$expectedPrice)";
           $result3 = mysqli_query($db,$query3);
            if($result3){
                  echo "<script type='text/javascript'>alert('Successfully Advertised')</script>";
            }
            else{
                  echo "<script type='text/javascript'>alert('Failed! Please try again')</script>";
            }

      }else{
        echo "<script type='text/javascript'>alert('Failed! Please try again')</script>";
      }

    }


?>
