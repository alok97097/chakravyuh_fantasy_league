<?php
error_reporting(0);
//include('session.php');
$display="";
$error="";
$connection=mysqli_connect("204.11.58.166:3306","imtg-chakravyuh","Kumar@143","chakravyuh");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($connection,"chakravyuh");

// ...some PHP code for database "test"...
$sqlhits = "SELECT SUM(LIKES) as hits from player";
$resulthits = mysqli_query($connection,$sqlhits) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
$playerhits=mysqli_fetch_array($resulthits,MYSQLI_ASSOC);

?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/chakravyuh.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Dashboard | Chakravyuh</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css?v=1.4.0" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <script src="../assets/js/main.js" type="text/javascript"></script>
    <style>
        #changeDiv{ background: #fff;}
        .main-panel > .content{padding:0;}
        .card .header{padding:10px 0px;}
        @media only screen and (max-width: 668px){
            .col-xs-6 {
                padding-left: 5px;
                padding-right: 5px;
            }
            .nav-tabs>li {
                font-size: smaller;
            }
        }
        
    </style>
</head>
<body>

<div class="wrapper">
    <div class="sidebar" data-color="purple" data-image="../assets/img/sidebar-5.jpg">
        <div class="sidebar-wrapper">
            <div class="logo">
                <a href="../index.php" class="simple-text">
                    Chakravyuh
                </a>
            </div>

            <ul class="nav">
                <li class="active">
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li>
                    <a href="addPlayer.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <p>Add Player</p>
                    </a>
                </li>             
            </ul>
    	</div>
    </div>

    <div class="main-panel">
        <nav class="navbar navbar-default navbar-fixed">
            <div class="container-fluid">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navigation-example-2">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#">Dashboard</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php" style="color:#fff">
                                <p>Logout</p>
                            </a>
                        </li>
						<li class="separator hidden-lg"></li>
                    </ul>
					
                </div>
            </div>
        </nav>


        <div class="content">
            <div class="container-fluid" id="changeDiv">
				<H3><?php echo "Hits till now- ".$playerhits['hits'];?></H3>
            <div id="player">

                <?php
                    $sql = "SELECT SNO,LIKES,DISLIKES,NAME,IMAGE,LIKES+DISLIKES as score from player order by score desc";
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
						
                        echo "<div  id='player".$player['SNO']."' class='player col-md-3 col-sm-3 col-xs-6'>
                                <div class='card card-nav-tabs'>
                                    <div class='header header-info'>
                                        <div class='nav-tabs-wrapper'>
                                            <ul class='nav nav-tabs' data-tabs='tabs'>
                                                <li>".$player['NAME']."</li><br/>
                                                <li class='pull-right'>Score=".$player['score']."</li> 
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
                <h2>Teams</h2>
                <table class="table ">
                <thead>
                    <tr>
                        <th>#</th>
						<th>Name</th>
                        <th>Team Name</th>
						<th>Player selected</th>
                        <th>Email</th>
                        <th>Contact</th>
                        <th>Amount Left</th>
                        <th>Status</th>
						<th>Likes</th>
						<th>Dislikes</th>
                        <th>Score</th>
                    </tr>
                </thead>
                <tbody>
                
                <?php
                    $count=1;
                    $sql = "SELECT u.NAME,u.EMAIL,u.CONTACT,u.amount,u.teamsubmitflag,u.teamname,sum(pl.LIKES) as LIKES,sum(pl.DISLIKES) as DISLIKE,SUM(pl.LIKES+(pl.DISLIKES*1)) AS score,count(pl.likes) as player from user u join relation on u.SNO=user_sno_fk join player pl on player_sno_fk=pl.SNO  group by u.NAME,u.EMAIL,u.CONTACT,u.amount,u.teamsubmitflag,u.teamname order by score DESC";
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
									<td>".$player['teamname']."</td>
                                    <td>".$player['NAME']."</td>
									<td>".$player['player']."</td>
                                    <td>".$player['EMAIL']."</td>
                                    <td>".$player['CONTACT']."</td>
                                    <td>".$player['amount']."</td>
                                    <td>".$status."</td>
									<td>".$player['LIKES']."</td>
									<td>".$player['DISLIKE']."</td>
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
</div>



</body>
    
    <!--   Core JS Files   -->
    <script src="../assets/js/jquery.min.js" type="text/javascript"></script>
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
    
    <!-- Light Bootstrap Table Core javascript and methods for Demo purpose -->
    <script src="../assets/js/light-bootstrap-dashboard.js?v=1.4.0"></script>


</html>
