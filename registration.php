<?php
include("conn.php");
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
</head>
<body>
    <h5 style="text-align: center;color:red">User Registration Form</h5>
<form method="post" action="" style="text-align: left;padding:10px">

  USER NAME
  <br>
  <input type="text" name="user" value="" placeholder="Enter your name"required>
  <br>
  EMAIL
  <br>
  <input type="email" name="email" value="" placeholder="Enter your email"required>
  <br>
  CITY
  <br>
  <input type="text" name="city" value="" placeholder="City name"required>
  <br>
  MOBILE NO
  <br>
  <input type="text" name="phone" value="" placeholder="Mobile number"required>
  <br>
  PASSWORD
  <br>
  <input type="password" name="password" value="" placeholder="Your password" required>
  <br><br>
  <input class="btn btn-primary" type="submit" name="submit" value="submit"> <a class="btn btn-success" href="login.php">Login</a>
</form>
</body>
</html>

<?php
//for submit the details
if($_POST['submit'])
{  
    $usr=$_POST['user'];
    $eml=$_POST['email'];
    $cty=$_POST['city'];
    $phn=$_POST['phone'];
    $pswd=$_POST['password'];
    $ecypaswd=password_hash($pswd,PASSWORD_DEFAULT);
    if($usr!="" && $eml!="" && $cty!="" && $phn!="" && $pswd!="")
    {
      $sql="INSERT INTO `registration`(`user`, `email`, `city`, `phone`, `password`) VALUES ('$usr','$eml','$cty','$phn','$ecypaswd')";
    }
    $result=mysqli_query($conn,$sql);
    if($result)
    {
       echo "<h6>data inserted</h6>";
       }
    else
    {
        echo "email should be unique";
    }
}
?>