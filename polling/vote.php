<?php
/*$display="";
$error="";
$connection=mysqli_connect("204.11.58.166:3306","alok","Kumar@143","testing");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($connection,"testing");


$leaderName="";
$leadersql = "SELECT * from player order by LIKES DESC";
//$leaderresult = mysqli_query($connection,$leadersql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
while($leaderplayer=mysqli_fetch_array($leaderresult,MYSQLI_ASSOC))
{
    $leaderName.=$leaderplayer['NAME']." with price ";
   	$leaderName.=$leaderplayer['price'].$leaderplayer['LIKES']. " Upvotes.";
}

$maxelementquery = "select max(sno) max from player";
$resultmax = mysqli_query($connection,$maxelementquery) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
$row=mysqli_fetch_array($resultmax,MYSQLI_ASSOC);                    

$mid=mt_rand(1,$row['max']-1);
$first=mt_rand(1,$mid);
$second=mt_rand($mid+1,$row['max']);


$firstsql = "SELECT * from player where sno='$first'";
$firstresult = mysqli_query($connection,$firstsql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
while($firstplayer=mysqli_fetch_array($firstresult,MYSQLI_ASSOC))
{
    $firstName=$firstplayer['NAME'];
    $firstCost=$firstplayer['price'];
    $firstImage=$firstplayer['IMAGE'];
	$firstCategory=$firstplayer['category'];
}
$secondsql = "SELECT * from player where sno='$second'";
$secondresult = mysqli_query($connection,$secondsql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
while($secondplayer=mysqli_fetch_array($secondresult,MYSQLI_ASSOC))
{
    $secondName=$secondplayer['NAME'];
    $secondCost=$secondplayer['price'];
    $secondImage=$secondplayer['IMAGE'];
	$secondCategory=$secondplayer['category'];
}

*/
?>


<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/chakravyuh.png">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Voting | Chakravyuh</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

    <!--     Fonts and icons     -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
    <!-- CSS Just for demo purpose, don't include it in your project -->
    <link href="../assets/css/demo.css" rel="stylesheet" />
    <script>
     $(document).ready(function(){
         var val;
          $(".button-click").click(function () {
            val = 1;
        });
          var window_size = window.matchMedia('(max-width: 767px)');
          if (window.matchMedia('(max-width: 767px)').matches)
            {  
          $(window).scroll(function () {
                if ($(this).scrollTop() >= 500 && val === 1) {    
                   
                    $('.button-click').show(); 
                    $('#navbar-collapse').css({"position":"absolute","top":"unset","transition":"all 1s ease"});                         
            } 
                    else if ($(this).scrollTop() < 500 && val === 1) {
                        
                        $('.button-click').hide();
                        $('#navbar-collapse').css({"position":"fixed","top":"0%","transition":"all 1s ease"});  
                }
                if ($(window).scrollTop() == 0 && val === 1) {
                 
                    $('.button-click').show(); 
                    $('#navbar-collapse').css({"position":"absolute","top":"unset","transition":"all .8s ease"});

                }
        });
            }
            
     });
    </script>
    <script type="text/javascript">
        function firstFunction(playerid,playerid2) {
        	console.log(playerid);
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.onreadystatechange = function() {
                if (this.readyState == 4 && this.status == 200) {
                    //document.getElementById(rbuttonid).innerHTML = "Removed";
                    //document.getElementById(rbuttonid).disabled = true;
                    //document.getElementById("amount").innerHTML=parseInt(document.getElementById("amount").innerHTML)+parseInt(playerprice);
                }
            };
            xmlhttp.open("GET", "addvote.php?player="+playerid, true);
            xmlhttp.send();
            location.reload();
        }
    </script>
    <style>
    .banner-title{text-align: center;}
    .banner-title h1{font-weight: 400;text-transform: uppercase;color: #fff}
	.btn-custom{
            border: none;
            background: #f0f0f0;
      } 
    .fa{color: #111;}
    .fa:hover, .fa:focus {color: #9c27b0}
	.developed{
        font-size: 15px;
        color: #333;
        font-weight: 500;
        padding-left: 3px;
    }
		.banner-title.brand{
			margin-top:10vh !important;
		}
		.index-page .brand h1{
		font-size: 3.8em;
		}	
    @media only screen and (max-width: 668px){
            .col-xs-6 {
                padding-left: 5px;
                padding-right: 5px;
            }
            .nav-tabs>li {
                font-size: smaller;
            }
			.index-page .brand h1 {
				font-size: 1.8em;
				font-weight: 500;
			}
        }	
    </style>
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-fixed-top navbar-primary">
    <div class="container">
        <div class="navbar-header">
            <a href="../index.php">
                <div class="logo-container">
                    <div class="logo">
                        <img src="../assets/img/chakravyuh.png" alt="Logo">
                    </div>
                    <div class="brand logo-text">
                        hakravyuh
                    </div>
                </div>
            </a>
             <div class="navbar-header">
                <button class="navbar-toggle button-click collapsed" type="button" data-toggle="collapse" data-target="#navigation-index">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
        </div>
		<div class="collapse navbar-collapse" id="navigation-index">
	    	<ul class="nav navbar-nav navbar-right text-center">
				<li>
					<a id="rule" data-toggle="modal" data-target="#myModal">Rules</a>
				</li>
				<li>
					<a href="../user/login.php">
						Login
					</a>
				</li>

	    	</ul>
	    </div>
    </div>
</nav>

<!-- End Navbar -->


<div class="wrapper">
    <div class="header header-filter" style="background-image: url('../assets/img/vote.jpeg');height:100vh;">
        <div class="container">
                <div class="col-md-12 col-sm-12 col-xs-12 banner-title">
                        <div class="brand">
                            <h1>Voting Process is Completed</h1>
							<h1>Thank You For Your Participation</h1>
							<h1>Total Hits = 125266</h1>	
                        </div>
                    </div> 
		</div>
		<div class="container-fluid" style="z-index: 2;position: relative;background:#fff">
                <div class="text-center col-sm-12 col-xs-12"><h3  style="color:#111;font-weight:bold;">Sponsored by</h3></div>
                <div class="col-sm-3 col-sm-offset-3 col-xs-6" >
                    <img src="../assets/img/fastrack_rgb.png" class="img-responsive">
                </div>
                <div class="col-sm-3 col-xs-6">
                    <img src="../assets/img/esn.png" class="img-responsive">
                </div>
                  
             <div class="row margin-top">
                
                <div  class="player col-md-4 col-sm-5 col-sm-offset-1 col-md-offset-2 col-xs-6" style="max-height: 450px !important;max-width: 360px">
                    <div class="card card-nav-tabs" data-toggle="tooltip" data-placement="top" title="<?php //echo $firstCategory; ?>">
                        <div class="header header-info">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li><?php //echo $firstName; ?></li><br/>
                                    <li><?php //echo "₹ ".$firstCost; ?></li><br>
                                </ul>
                            </div>
                        </div>
                        <button onclick="firstFunction(<?php // echo $first;?>)" class="btn-custom">
                        <div class="content">
                            <div class="tab-content text-center">
                                <img class="img-responsive" <?php //echo "src='".$firstImage."'";?> />
                            </div>
                        </div></button>
                        <div class="text-center">
                            <button class="btn btn-primary btn-round" onclick='firstFunction(<?php //echo $first;?>)'>
                                <i class="material-icons">thumb_up</i> Like
                            </button>
                        </div>
                    </div>
                </div>

                <div  class="player col-md-4 col-sm-5 col-xs-6">
                    <div class="card card-nav-tabs" data-toggle="tooltip" data-placement="top" title="<?php echo $secondCategory; ?>">
                        <div class="header header-info">
                            <div class="nav-tabs-wrapper">
                                <ul class="nav nav-tabs" data-tabs="tabs">
                                    <li><?php ////echo $secondName; ?></li><br/>
                                    <li><?php //echo "₹ ".$secondCost; ?></li><br>
                                </ul>
                            </div>
                        </div>
                        <button onclick="firstFunction(<?php //echo $second;?>)" class="btn-custom">
                        <div class="content">
                            <div class="tab-content text-center">
                                <img class="img-responsive" <?php // echo "src='".$secondImage."'";?> />
                            </div>
                        </div></button>
                        <div class="text-center">
                            <button class="btn btn-primary btn-round" onclick='firstFunction(<?php //echo $second;?>)'>
                                <i class="material-icons">thumb_up</i> Like
                            </button>

                        </div>
                    </div>
                </div>
            </div>

        </div>
        
    </div>
    
</div>
<div class="section section-basic" style="background:#efeeee">
    <div class="container-fluid">    
    <div id="player">
	<h2>Current Top 10 Players</h2>
    <?php
		$count=0;
        $sql = "SELECT * from player order by LIKES desc LIMIT 10";
        $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
        while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
        {
			$count=$count+1;
            echo "<div  id='player".$player['SNO']."' class='player col-md-3 col-sm-3 col-xs-6'>
                    <div class='card card-nav-tabs'>
                        <div class='header header-info'>
                            <div class='nav-tabs-wrapper'>
                                <ul class='nav nav-tabs' data-tabs='tabs'>
                                    <li>".$player['NAME']."</li><br/>
                                    <li class='pull-right'>Rank: ".$count."</li> 
                                </ul>
                            </div>
                        </div>
                        <div class='content'>
                            <div class='tab-content text-center'>
                            <img class='img-responsive' src='".$player['IMAGE']."'>
                            </div>
                        </div>
                    </div>
                </div>";
        }
    ?>
    </div>
		<div id="table" class="table-responsive" style="clear:both"> 
                <h2>Current Top 10 Teams</h2>
                <table class="table ">
                <thead>
                    <tr>
                        <th>Rank</th>
                        <th>Team Name</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                   $count=1;
                    $sql = "SELECT u.NAME,u.EMAIL,u.CONTACT,u.amount,u.teamsubmitflag,u.teamname,sum(pl.LIKES) as LIKES,sum(pl.DISLIKES) as DISLIKE,SUM(pl.LIKES+(pl.DISLIKES*1)) AS score,count(pl.likes) as player from user u join relation on u.SNO=user_sno_fk join player pl on player_sno_fk=pl.SNO  group by u.NAME,u.EMAIL,u.CONTACT,u.amount,u.teamsubmitflag,u.teamname order by score DESC LIMIT 10";
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                        if($player['teamsubmitflag']==1)
                            {
                                $status='Team Submitted Successfully';
                            }
                            else
                             $status='Team Saved in Draft';
                        $score=0;   
                        echo "
                                <tr>
                                    <td>".$count."</td>
                                    <td>".$player['NAME']."</td>
									<td>".$player['score']."</td>
									
                                </tr>    
                            ";
                       $count=$count+1;
                    }
                ?>
                </tbody>
                </table>
            </div>
    </div>
</div>
</div>	
	<!-- Modal Core -->
            <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Rules For Creating Team</h4>
					</div>
					<div class="modal-body">
						<p>1.Voting to start at 12:00 am 27/01/2018 and will continue for the next 5 days</p>
						<p>2.Everybody will be able to participate in the voting process,including registered players and team owners</p>
						<p>3.The voter will have to choose the most valuable player out of the 2 players on screen during the voting</p>
						<p>4.Every upvote for a player will add to the total points of the team he/she is in. The other player among the two involved in the voting process will automatically receive a downvote and points will subsequently be deducted from the team he/she is in
</p>
						<p>5.Finally, the team owner with maximum points will be declared the Champion of CFL</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
				</div>
<footer class="footer">
    <div class="container">
        <nav class="pull-left">
            <ul>
                <li>
                    <a href="http://imtg-chakravyuh.com/" target="_blank">
                        About Us
                    </a>
                </li>
                <li>
                    <a rel="tooltip" title="Follow us on Twitter" data-placement="top" href="https://twitter.com/imtg_sportscom" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-twitter"></i>
                    </a>
                </li>
                <li>
                    <a rel="tooltip" title="Like us on Facebook" data-placement="top" href="https://www.facebook.com/Chakravyuh.imtg/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-facebook-square"></i>
                    </a>
                </li>
                <li>
                    <a rel="tooltip" title="Follow us on Instagram" data-placement="top" href="https://www.instagram.com/chakravyuh_imtg_/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-instagram"></i>
                    </a>
                </li>

            </ul>
        </nav>
		<nav class="pull-right">
            <ul>
                <li>
                    <a href="#">
                        Developed by
                    </a>
                </li>
               <li>
                    <a rel="tooltip" title="Contact us on LinkedIn" data-placement="top" href="https://www.linkedin.com/in/kumar-alok-01/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-linkedin-square"></i><span class="developed">Alok</span>
                    </a>
                </li>
                <li>
                    <a rel="tooltip" title="Contact us on LinkedIn" data-placement="top" href="https://www.linkedin.com/in/bittu-chauhan-896041b2/" target="_blank" class="btn btn-white btn-simple btn-just-icon">
                        <i class="fa fa-linkedin-square"></i><span class="developed">Bittu</span>
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</footer>

</body>
    <!--   Core JS Files   -->
    <script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    <script src="../assets/js/material.min.js"></script>

    <!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
    <script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

    <!--  Plugin for the Datepicker, full documentation here: http://www.eyecon.ro/bootstrap-datepicker/ -->
    <script src="../assets/js/bootstrap-datepicker.js" type="text/javascript"></script>

    <!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
    <script src="../assets/js/material-kit.js" type="text/javascript"></script>

    <script type="text/javascript">

        $().ready(function(){
            // the body of this function is in assets/material-kit.js
            materialKit.initSliders();
            window_width = $(window).width();

            if (window_width >= 992){
                big_image = $('.wrapper > .header');

                $(window).on('scroll', materialKitDemo.checkScrollForParallax);
            }

        });
    </script>
</html>
