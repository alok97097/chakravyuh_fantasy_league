<?php
error_reporting(0);
include('session.php');
$connection = mysqli_connect("204.11.58.166:3306","imtg-chakravyuh","Kumar@143","chakravyuh");
$db = mysqli_select_db( $connection,"chakravyuh");
	
session_start();

if(session_destroy()) // Destroying All Sessions
{

header("Location: login.php"); // Redirecting To Home Page
}
?>