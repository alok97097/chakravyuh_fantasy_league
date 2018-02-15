<?php
error_reporting(0);
include('session.php');
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
mysqli_select_db($connection,"testing");

// ...some PHP code for database "test"...
$getflag = "SELECT teamsubmitflag,teamname FROM user where SNO='$login_id'";
$flagresult=mysqli_query($connection,$getflag) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
if($flagrow=mysqli_fetch_array($flagresult,MYSQLI_ASSOC)){
	$username=$flagrow['teamname'];
	if($flagrow['teamsubmitflag']==0)
	{
		header('Location: team.php'); 
	}
}

$array = array_fill(1, 180, 0);
$sql="SELECT pl.SNO sno from player pl join relation rl on pl.SNO=rl.player_sno_fk where rl.user_sno_fk='$login_id' order by pl.price";
$result=mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$array[$row['sno']]=1;
}
/*foreach ( $array as $var) {
	echo $var;
}*/



    

?>

<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/chakravyuh.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Team | Chakravyuh</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" />
	<!-- CSS Files -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="../assets/css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="../assets/css/demo.css" rel="stylesheet" />
	<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
	<script src="../assets/js/jquery.min.js" type="text/javascript"></script>
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
<style type="text/css">
	.fa{color: #111;}
	.fa:hover, .fa:focus {color: #9c27b0}
	@media only screen and (max-width: 668px) {
    	.nav-tabs>li {
        	font-size: smaller;
    	}
		.col-xs-6{
			padding-left: 5px;
			padding-right: 5px;
		}
		.pd10{padding:10px 15px !important;}
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
		        </button><!--//nav-toggle-->
   		 	</div>
	    </div>
		

	    <div class="collapse navbar-collapse" id="navigation-index">

	    	<ul class="nav navbar-nav navbar-right text-center">
	    		<li>
					<a href="profile.php">
						<?php echo "Hi! ".$username; ?>
					</a>
				</li>
				<li>
					<a href="profile.php" >
						<?php 
							$amountsql = "select amount,male,team from user where SNO='$login_id'";
							$current_amount = mysqli_query($connection,$amountsql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
							$amount=mysqli_fetch_array($current_amount,MYSQLI_ASSOC);

						echo "<div id='amount'>".$amount['amount']."</div>"; 


						?>
					</a>
				</li>
				<li>
					<a href="../polling/vote.php">
						Voting
					</a>
				</li>
	    		<li>
					<a href="logout.php">
						logout
					</a>
				</li>
	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="main" style="margin-top:4%;">
			<div class="section section-basic" style="padding-top: 70px;">
	    		
	 			<div class="container">
  					<div class="jumbotron">
 					  <solid><center> <?php echo "<H2>Team ".$login_session."</H2>" ?> </center></solid>
						<center><p><?php
							$cumscore=0;
	    			$cat="price ";
	    			$order="ASC";
	    			$sql = "SELECT * from player order by ".$cat.$order;
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
						$score=$player['LIKES']+$player['DISLIKES'];
						
                    	if($array[$player['SNO']]=='1')
                    	$cumscore=$cumscore+$score;
							
			        }
					echo "Total Score=".$cumscore;
                    
							?></p></center>
					</div>
				</div>
	    		<div id="team" class="container-fluid">

	    		<?php
	    			$cat="price ";
	    			$order="ASC";
	    			$sql = "SELECT * from player order by ".$cat.$order;
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
						$score=$player['LIKES']+$player['DISLIKES'];
                    	if($array[$player['SNO']]=='1')
                    	echo "<div id='player".$player['SNO']."' class='player col-md-2 col-sm-3 col-xs-6'>
				    			<div class='card card-nav-tabs'>
									<div class='header header-info'>
										<div class='nav-tabs-wrapper'>
											<ul class='nav nav-tabs' data-tabs='tabs'>
												<li id='name'>".$player['NAME']."</li><br/>
												<li class='pull-right' >Score= ".$score."</li>
											</ul>
										</div>
									</div>
									<div class='content'>
										<div class='tab-content text-center'>
										<img class='img-responsive' src='../polling/".$player['IMAGE']."'>
										</div>
									</div>
									<div class='pull-right'>
										<button class='btn btn-primary btn-sm' >Added</button>

									</div>
								</div>
				    		</div>";
			        }

                    
	    		?>
	    		
	        
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
        </div>
    </footer>
</div>

<!-- Sart Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	<div class="modal-dialog">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">
					<i class="material-icons">clear</i>
				</button>
				<h4 class="modal-title">Modal title</h4>
			</div>
			<div class="modal-body">
				<p>Far far away
				</p>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default btn-simple">Nice Button</button>
				<button type="button" class="btn btn-danger btn-simple" data-dismiss="modal">Close</button>
			</div>
		</div>
	</div>
</div>
<!--  End Modal -->
</body>
	<!--   Core JS Files   -->
	
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>
	
	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="../assets/js/nouislider.min.js" type="text/javascript"></script>

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
