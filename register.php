
<head>
 <meta charset="utf-8">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
 <link rel="stylesheet" type="text/css" href="css/global.css">
</head>
<body class="bg">
<div class="container-fluid bg">
	<div class="row">
		<div class="col-md-4 col-sm-4 col-xs-12"></div>
		<div class="col-md-4 col-sm-4 col-xs-12">
			<!--form start-->
<form action="register.php" method="post" class="form-container">
  <h1>Registration</h1>
  <div class="form-group">
    <label for="name">Full Name</label>
    <input type="text" class="form-control" id="name" name="name" placeholder="Full Name" required>
  </div>
  <div class="form-group">
    <label for="mob_no">Mobile Number</label>
    <input type="number" class="form-control" id="mob_no" name="mob_no" placeholder="Mobile Number" required>
  </div>
  <div class="form-group">
    <label for="user_type">User type</label>
  </div>
  <div class="form-group">
    <select class="form-control" id='user_type' name='user_type'>
      <option value="0">Select</option>
      <option value="Student">Student</option>
      <option value="Staff">Staff</option>
      <option value="Faculty">Faculty</option>
    </select>
  </div>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="email" name="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
  </div>

  <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-success btn-block">
  <br>
  <p>Click here to <a href="login.php">Login</a></p>
</form>


		</div>
        <div class="col-md-4 col-sm-4 col-xs-12"></div>
	</div>
</div>

<?php
include("config.php");
if(isset($_POST['submit'])) {
  $name =$_POST['name'];
  $mobile_no = $_POST['mob_no'];
  $user_type = $_POST['user_type'];
  $email_address =$_POST['email'];
  $password = $_POST['password'];


  $query = mysqli_query($db,"call registration('$email_address','$name','$mobile_no','$user_type','$password')");
  echo '$query';
  if($query){
    echo "<script type='text/javascript'>alert('Submitted Successfully!!!')</script>";
  }
  else{
   echo "<script type='text/javascript'>alert('Registration Failed. Please try again')</script>";
  }
}



?>

</body>
