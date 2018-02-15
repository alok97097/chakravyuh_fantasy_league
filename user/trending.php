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

?>
    
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <link rel="icon" type="image/png" href="../assets/img/favicon.ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

    <title>Add Player | Chakravyuh</title>

    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" />
    <!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <script src="../assets/js/main.js" type="text/javascript"></script>

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
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li >
                    <a href="addPlayer.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <p>Add Player</p>
                    </a>
                </li>
                <li class="active">
                    <a href="trending.php">
                        <i class="fa fa-user" aria-hidden="true"></i>
                        <p>Trending Player</p>
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
                    <a class="navbar-brand" href="#">Trending Player</a>
                </div>
                <div class="collapse navbar-collapse">
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="logout.php">
                                <p>Logout</p>
                            </a>
                        </li>
                        <li class="separator hidden-lg"></li>
                    </ul>
                </div>
            </div>
        </nav>

<div class="main main-raised" style="margin: 0;border-radius: 0;">
        <div class="section section-basic" >
            
            <div id="player" class="container-fluid">
                <div class="row text-right" style="padding-right: 40px;">
                    
                </div>
                
                <?php
                    
                    $sql = "SELECT * from player order by LIKES asc";
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                       
                        echo "<div  id='player".$player['SNO']."' class='player col-md-3 col-sm-3 col-xs-5'>
                                <div class='card card-nav-tabs'>
                                    <div class='header header-info'>
                                        <div class='nav-tabs-wrapper'>
                                            <ul class='nav nav-tabs' data-tabs='tabs'>
                                                <li>".$player['NAME']."</li><br/>
                                                <li class='pull-right'>".$player['LIKES']." Upvotes</li> 
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
                
                    <!-- Modal Core -->
                
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

