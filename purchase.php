<?php
   require('config.php');
?>


<!DOCTYPE html>
<html>
<head>
	<title>Purchase</title>

	    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="css/footer.css">
        <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <link rel="stylesheet" media="screen" href="https://fontlibrary.org/face/redkost-comic" type="text/css"/>
		<link rel="stylesheet" type="text/css" href="css/advertise.css">
		<link rel="stylesheet" type="text/css" href="css/purchase.css">
</head>
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
          <li class="nav-item"><?php echo $id = (isset($_SESSION['email']) ? $_SESSION['email'] : ''); ?>

           <a class="nav-link" href="change_password.php"><strong>Change Password</strong></a>
         </li>
           <li class="nav-item" >
             <a class="nav-link" href="logout.php">Logout</a>
           </li>
         </ul>
         </li>
        </ul>
      </div>

    </nav>
<!-- Side navigation -->
<div class="topnav">

  <!-- Left-aligned links (default) -->
  <a href="laptop_purchase.php" class="active">Laptop</a>
  <a href="mobile_purchase.php">Mobile phone</a>
  <a href="book_purchase.php">Books</a>
  <!-- Right-aligned links -->
  <div class="topnav-right">

  </div>

</div>
<?php
$query = "SELECT * FROM Advertisement where buyer_id is null ";
$result = mysqli_query($db,$query);
while ($row = mysqli_fetch_assoc($result)) {

    $id = $row["advt_id"];
    $email_id = $row["owner_id"];
    if ($row["item_type"]==="Laptop") {
    	$query2 = "SELECT * FROM Laptop WHERE product_id = '$id'";
    	$result2 = mysqli_query($db,$query2);
    	$row2 = mysqli_fetch_assoc($result2);
      $query3 = "SELECT * FROM Users WHERE email_id = '$email_id'";
    	$result3 = mysqli_query($db,$query3);
    	$row3 = mysqli_fetch_assoc($result3);
       ?>
    	<div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="images/laptop_hp.jpg">
                        </div>

                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                <b><?php echo $row["item_name"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-header">
                            	<p>Manufacturer: <b><?php echo $row2["manufacturer"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Model Name: <b><?php echo $row2["model_name"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Year Of Purchase: <b><?php echo $row2["year_of_purchase"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Battery Status: <b><?php echo $row2["battery_status"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-desc">
                                <p> Ad Description: <?php echo $row2["ad_description"]; ?> </p>
                                <hr>
                            </div>
                            <div class="lib-row lib-price">
                            	<p>Expected Price: Rs <b><?php echo $row2["expected_price"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Contact Details: <b><?php echo $row3["User_name"]." ".$row3["Mobile_no"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Email ID: <b><?php echo $row["owner_id"];?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
</div>
<?php
    }
    else if($row["item_type"]==="Mobile"){
        $query2 = "SELECT * FROM Mobile WHERE product_id = '$id'";
    	$result2 = mysqli_query($db,$query2);
    	$row2 = mysqli_fetch_assoc($result2);


    	$query3 = "SELECT * FROM Users WHERE email_id = '$email_id'";
    	$result3 = mysqli_query($db,$query3);
    	$row3 = mysqli_fetch_assoc($result3);

    	?>
        <div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="images/mobile.jpg">
                        </div>

                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                               <b> <?php echo $row["item_name"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-header">
                            	<p>Manufacturer: <b><?php echo $row2["manufacturer"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Model Name: <b><?php echo $row2["model_name"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Year Of Purchase: <b><?php echo $row2["year_of_purchase"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-desc">
                                <p> Ad Description: <?php echo $row2["ad_description"]; ?> </p>
                                <hr>
                            </div>
                            <div class="lib-row lib-price">
                            	<p>Expected Price: Rs <b><?php echo $row2["expected_price"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Contact Details: <b><?php echo $row3["User_name"]." ".$row3["Mobile_no"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Email ID: <b><?php echo $row["owner_id"];?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
</div>
<?php
    }
    else if($row["item_type"]==="Book"){
        $query2 = "SELECT * FROM Book WHERE product_id = '$id'";
    	$result2 = mysqli_query($db,$query2);
    	$row2 = mysqli_fetch_assoc($result2);


    	$query3 = "SELECT * FROM Users WHERE email_id = '$email_id'";
    	$result3 = mysqli_query($db,$query3);
    	$row3 = mysqli_fetch_assoc($result3);


        $i=0;
        $query4 = "SELECT * FROM Author WHERE product_id = '$id'";
        $result4 = mysqli_query($db,$query4);
        while($row4 = mysqli_fetch_assoc($result4)){
             if($i==0){
                  $author1 = $row4["author_name"];
                  $i++;
             }
             else if($i==1){
             	  $author2 = $row4["author_name"];
             	  $i++;
             }
             else if($i==2){
             	  $author3 = $row4["author_name"];
             	  $i++;
             }
        }
        /*$row4 = mysqli_fetch_assoc($result4);
        $author = $row4["author_name"];
    	*/?>
    <div class="container">
            <div class="row row-margin-bottom">
            <div class="col-md-9 no-padding lib-item" data-category="view">
                <div class="lib-panel">
                    <div class="row box-shadow">
                        <div class="col-md-6">
                            <img class="lib-img-show" src="images/book.jpg">
                        </div>

                        <div class="col-md-6">
                            <div class="lib-row lib-header">
                                <b><?php echo $row["item_name"]; ?></b>
                                <div class="lib-header-seperator"></div>
                            </div>
                            <div class="lib-row lib-header">
                            	<p>Name of Book: <b><?php echo $row2["name_of_book"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Author Name: <b><?php echo $author1." ".$author2." ".$author3; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Condition: <b><?php echo $row2["condition_book"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-desc">
                                <p> Ad Description: <?php echo $row2["ad_description"]; ?> </p>
                                <hr>
                            </div>
                            <div class="lib-row lib-price">
                            	<p>Expected Price: Rs <b><?php echo $row2["expected_price"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Contact Details: <b><?php echo $row3["User_name"]." ".$row3["Mobile_no"]; ?></b></p>
                            </div>
                            <div class="lib-row lib-data">
                            	<p>Email ID: <b><?php echo $row["owner_id"];?></b></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-1"></div>

        </div>
</div>

 <?php
    }
  ?>



  <?php $row["item_name"];?>
  <?php echo $row["item_name"]; ?>


<?php
}

?>
