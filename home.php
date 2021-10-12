<?php
session_start();
include("conn.php");
error_reporting(0);
$userverify=$_SESSION['username'];
if($userverify==true)
{

}
else
{
    header("location:login.php");
}

$query="SELECT * FROM `registration` WHERE email='$userverify'";
$data=mysqli_query($conn,$query);
$result=mysqli_fetch_assoc($data);
// echo $result['user'];
echo "hello , welcome back ".$result['user'];
?>
<a href="logout.php"> Logout</a>

