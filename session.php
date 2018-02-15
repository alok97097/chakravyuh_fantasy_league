<?php
error_reporting(0);
// Establishing Connection with Server by passing server_name, user_id and password as a parameter
$connection = mysqli_connect("204.11.58.166:3306","imtg-chakravyuh","Kumar@143","chakravyuh");
$db = mysqli_select_db( $connection,"chakravyuh");
session_start();// Starting Session
// Storing Session
$user_check=$_SESSION['login_email'];

// SQL Query To Fetch Complete Information Of User
$ses_sql=mysqli_query($connection,"select name,sno from user where email='$user_check'");

$row = mysqli_fetch_array($ses_sql,MYSQLI_ASSOC);

$login_session =$row['name'];
$login_id=$row['sno'];
//echo $login_session."fuclk";
if(isset($login_session)){
mysqli_close($connection); // Closing Connection
header('Location: user/team.php'); // Redirecting To Home Page
}
?>