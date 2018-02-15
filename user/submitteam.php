<?php
error_reporting(0);
$connection=mysqli_connect("204.11.58.166:3306","imtg-chakravyuh","Kumar@143","chakravyuh");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($connection,"chakravyuh");

// get the q parameter from URL
$userid = $_REQUEST["user"];

$flag=1;

$updatesql = "UPDATE user SET teamsubmitflag='$flag' where SNO='$userid'";
mysqli_query($connection,$updatesql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
echo "    1";

?>