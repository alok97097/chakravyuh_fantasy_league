<?php
/*$connection=mysqli_connect("204.11.58.166:3306","imtg-chakravyuh","Kumar@143","chakravyuh");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($connection,"chakravyuh");

// get the q parameter from URL
$playerid = $_GET["player"];
echo $playerid."         ";
$playerid2 = $_GET["player2"];
echo $playerid."         ";


$pricesql = "select LIKES,DISLIKES from player where SNO='$playerid'";
$current_price = mysqli_query($connection,$pricesql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
$price=mysqli_fetch_array($current_price,MYSQLI_ASSOC);


$remainingteam=$price['LIKES']+1;



$updatesql = "UPDATE player SET LIKES='$remainingteam' where SNO='$playerid'";
mysqli_query($connection,$updatesql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
echo "    1";
$pricesql2 = "select LIKES,DISLIKES from player where SNO='$playerid2'";
$current_price2 = mysqli_query($connection,$pricesql2) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
$price2=mysqli_fetch_array($current_price2,MYSQLI_ASSOC);


$remainingteam2=$price2['DISLIKES']-1;



$updatesql2 = "UPDATE player SET DISLIKES='$remainingteam2' where SNO='$playerid2'";
mysqli_query($connection,$updatesql2) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
echo "    1";
*/
?>