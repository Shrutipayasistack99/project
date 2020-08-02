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
<div class="topnav">
  <a href="laptop.php">Laptop</a>
  <a href="mobile.php" >Mobile phone</a>
  <a href="books.php" class="active">Books</a>
  <div class="topnav-right">
  </div>
</div>
	<div class="container">
  <h2 class="color-white">Post an Advertisement</h2>
  <form class="form-horizontal" action="books.php" method="post">
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="name_of_book">Name of Book</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="name_of_book" placeholder="Name of Book" name="name_of_book" required>
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="author1">Author Name</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author1" placeholder="Author Name1" name="author1" required>
      </div>
      <br>
      <br>

      <div class="col-sm-2 ">
      </div>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author2" placeholder="Author Name2" name="author2" >
      </div>

      <br>
      <br>

      <div class="col-sm-2">
      </div>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="author3" placeholder="Author Name3" name="author3" >
      </div>
    </div>
    <div class="form-group">
      <label class="control-label col-sm-2 color-white" for="condition">Condition</label>
      <div class="col-sm-10">
        <input type="text" class="form-control" id="condition" placeholder="Condition" name="condition"></input>
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
        <button type="submit" id="submit" name="submit" class="btn btn-primary">Submit</button>
      </div>
    </div>
  </form>
</div>

</body>

<?php
    $today =  date("Y-m-d");
    $expiry = Date("Y-m-d",strtotime("+10 days"));//converts english date to unix timestamp
    $owner_email = $_SESSION['email'];
    if(isset($_POST['submit'])){
      $nameOfBook = mysqli_escape_string($db,$_POST['name_of_book']);
      $author1 = mysqli_escape_string($db,$_POST['author1']);
      $author2 = mysqli_escape_string($db,$_POST['author2']);
      $author3 = mysqli_escape_string($db,$_POST['author3']);
      $condition = mysqli_escape_string($db,$_POST['condition']);
      $description = mysqli_escape_string($db,$_POST['description']);
      $expectedPrice = mysqli_escape_string($db,$_POST['expected_price']);
      $book = "Book";

      $query1 = "INSERT INTO Advertisement (item_name,item_type,date_of_init,date_of_exp,owner_id) VALUES ('$nameOfBook','$book','$today','$expiry','$owner_email')";
      $result1 = mysqli_query($db,$query1);
      if($result1){
            $query2 = "SELECT advt_id FROM Advertisement where item_name = '$nameOfBook' and owner_id = '$owner_email'";
            $result2 = mysqli_query($db,$query2);

            $row = mysqli_fetch_assoc($result2);
            $temp =  $row["advt_id"];
            $query3 = "INSERT INTO Book (product_id,name_of_book,condition_book,ad_description,expected_price)
             VALUES ('$temp','$nameOfBook','$condition','$description','$expectedPrice')";

            $result3 = mysqli_query($db,$query3);
            if($result3){
                  if($author1)
                  $query4 = "INSERT INTO Author (product_id,author_name) VALUES ('$temp','$author1')";
                  $result4 = mysqli_query($db,$query4);
                  if($author2){
                    $query5 = "INSERT INTO Author (product_id,author_name) VALUES ('$temp','$author2')";
                  $result5 = mysqli_query($db,$query5);
                  }
                  if($author3){
                    $query6 = "INSERT INTO Author (product_id,author_name) VALUES ('$temp','$author3')";
                  $result6 = mysqli_query($db,$query6);
                  }
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
