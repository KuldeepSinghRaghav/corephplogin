<?php
session_start();
include("conn.php");
error_reporting(0);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>
<body>
<h5 style="text-align: center;color:red">Login Form</h5>

<form method="post" action="" style="text-align: left;padding:10px">
  Email
  <br>
  <input type="email" name="email" value="" placeholder="ENTER YOUR EMAIL"required>
  <br>
  Password
  <br>
  <input type="text" name="password" value="" placeholder="YOUR PASSWORD" required>
  <br><br>
  <input class="btn btn-success" type="submit" name="submit" value="login"> <a class="btn btn-danger" href="registration.php">SignUp</a>
</form>
</body>
</html>

<?php
// $input="raghav12";
// $input1="raghav12";
// $enc=password_hash($input1,PASSWORD_DEFAULT);
// $vrfy=password_verify($input,$enc);
// echo $vrfy;



//for checking data
if(isset($_POST['submit']))
{
$eml=$_POST['email'];
$pswd=$_POST['password'];

$eml=strip_tags(mysqli_real_escape_string($conn,trim($eml)));
$pswd=strip_tags(mysqli_real_escape_string($conn,trim($pswd)));

$query="SELECT * FROM registration WHERE email='".$eml."'";
$tbl=mysqli_query($conn,$query);
if(mysqli_num_rows($tbl)>0)
{
    $row=mysqli_fetch_array($tbl);
    $password_has=$row['password'];
    if(password_verify($pswd,$password_has))
    {
        $_SESSION['username']=$eml;
        header("location:home.php");
    }
     else
{
    echo "<br>login failed";
}


}



// $query="SELECT * FROM registration WHERE email='$eml' && password='$pswd'";
// $data=mysqli_query($conn,$query);
// $total=mysqli_num_rows($data);
// if($total==1)
// {
//     $_SESSION['username']=$eml;
//     header("location:home.php");
// }
// else
// {
//     echo "<br>login failed";
// }
}
?>