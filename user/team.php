<?php
error_reporting(0);
include('session.php');
$display="";
$error="";
$cat="name ";
$order="ASC";
$connection=mysqli_connect("204.11.58.166:3306","imtg-chakravyuh","Kumar@143","chakravyuh");
// Check connection
if (mysqli_connect_errno())
  {
  echo "Failed to connect to MySQL: " . mysqli_connect_error();
  }

// ...some PHP code for database "my_db"...

// Change database to "test"
mysqli_select_db($connection,"chakravyuh");
if($_GET["sort"]==1)
{
	$cat="name ";
	$order="ASC";
}
else if($_GET["sort"]==2)
{
	$cat="name ";
	$order="DESC";
}
else if($_GET["sort"]==3)
{
	$cat="price ";
	$order="ASC";
}
else if($_GET["sort"]==4)
{
	$cat="price ";
	$order="DESC";
}
else if($_GET["sort"]==5)
{
	$cat="SEX ";
	$order="ASC";
}
else if($_GET["sort"]==6)
{
	$cat="SEX ";
	$order="DESC";
}
// ...some PHP code for database "test"...
$getflag = "SELECT teamsubmitflag,teamname FROM user where SNO='$login_id'";
$flagresult=mysqli_query($connection,$getflag) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
if($flagrow=mysqli_fetch_array($flagresult,MYSQLI_ASSOC)){
	$username=$flagrow['teamname'];
	if($flagrow['teamsubmitflag']==1)
	{
		header('Location: finalteam.php'); 
	}
}

$array = array_fill(1, 180, 0);
$sql="SELECT pl.SNO sno from player pl join relation rl on pl.SNO=rl.player_sno_fk where rl.user_sno_fk='$login_id' order by pl.price";
$result=mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
while($row=mysqli_fetch_array($result,MYSQLI_ASSOC))
{
	$array[$row['sno']]=1;
}
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
				 $('[data-toggle="tooltip"]').tooltip();
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

	function loadDoc(userid,playerid,playerprice) {
		var xmlhttp = new XMLHttpRequest();
        var buttonid="button"+playerid;
		//console.log(parseInt(document.getElementById("amount").innerHTML));
		//console.log(parseInt(playerprice));
		if(parseInt(document.getElementById("amount").innerHTML)-parseInt(playerprice)<0)
		{
			swal("","Insufficient amount to add this player", "error");
		}
		else{
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(buttonid).innerHTML = "Added";
                document.getElementById(buttonid).disabled = true;
                document.getElementById("amount").innerHTML=parseInt(document.getElementById("amount").innerHTML)-parseInt(playerprice);
                document.getElementById("total").innerHTML=parseInt(document.getElementById("total").innerHTML)+1;
                var playerhtmlid="player"+playerid;
                var player=document.getElementById(playerhtmlid);
                document.getElementById("team").appendChild(player);
                location.reload();
            }
        };
        xmlhttp.open("GET", "addrelation.php?user=" + userid+"&player="+playerid, true);
        xmlhttp.send();
		}
	}

	function removeDoc(userid,playerid,playerprice) {
		var xmlhttp = new XMLHttpRequest();
        var rbuttonid="rbutton"+playerid;
        xmlhttp.onreadystatechange = function() {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById(rbuttonid).innerHTML = "Removed";
                document.getElementById(rbuttonid).disabled = true;
                document.getElementById("amount").innerHTML=parseInt(document.getElementById("amount").innerHTML)+parseInt(playerprice);
                document.getElementById("total").innerHTML=parseInt(document.getElementById("total").innerHTML)-1;
                
                var playerhtmlid="player"+playerid;
                var player=document.getElementById(playerhtmlid);
                document.getElementById("player").appendChild(player);
                location.reload();
            }
        };
        xmlhttp.open("GET", "removerelation.php?user=" + userid+"&player="+playerid, true);
        xmlhttp.send();
        
	}

	function verify(userid){
		var total=document.getElementById("total").innerHTML;
		var male=document.getElementById("male").innerHTML;
		var amount=document.getElementById("amount").innerHTML;
		//console.log(total);
		if(amount<0)
		{
			swal("","Insufficient amount to make this team", "error");
		}
		else if(total>25 || total<25)
		{
			swal("","A Team should have 25 Players!", "error");
		}
		else if(male>20)
		{
			swal("","A Team should have less than or equal to 20 male players!", "error");
		}
		else {
		swal({
				title: "Are you sure?",
				text: "Once submitted, you will not be able to change the team!",
				type: "warning",
				showCancelButton: true,
				confirmButtonClass: "btn-danger",
				confirmButtonText: "Submit",
				cancelButtonText: "Cancel",
				closeOnConfirm: false,
				closeOnCancel: false
			  },
			  function(isConfirm) {
				if (isConfirm) {
				  swal("Submitted", "You are all set for the big day 😊 May the force be with you!", "success");
					console.log("confirm");
				    var xmlhttp = new XMLHttpRequest();
					xmlhttp.onreadystatechange = function() {
						if (this.readyState == 4 && this.status == 200) {
							location.reload();	
						}
					};
					xmlhttp.open("GET", "submitteam.php?user=" + userid, true);
					xmlhttp.send();	
				} else {
				  swal("Cancelled", "Submit your team before the deadline to be eligible for the exciting prizes.", "error");
				}
			  });
		}
	}
		
</script>
<style type="text/css">
	.fa{color: #111;}
	.fa:hover, .fa:focus {color: #9c27b0}
	#rule{cursor: pointer;}
	#myModal{background: rgba(0, 0, 0, 0.61);}
	.modal-backdrop{display:none;}
	.modal-header{text-align: center !important;}
	.modal-title{font-weight: 400;}
	.btn-danger{padding:5px 15px}
	.jumbotron p{text-align: center;}
	.developed{
        font-size: 15px;
        color: #333;
        font-weight: 500;
        padding-left: 3px;
    }	
	@media only screen and (max-width: 668px) {
    	.nav-tabs>li {
        	font-size: smaller;
    	}
		.col-xs-6{
			padding-left: 5px;
			padding-right: 5px;
		}
		.amount{display:block !important;}
		.pd10{padding:10px 15px !important;}
	}
	.amount{
		background: #0c94da;
		text-align: center;
		color: #fff;
		display:none;
	}
	.sub-rule{color: red;font-weight: 450;}
	.amount h3{font-weight: 500;}
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
					<a id="rule" data-toggle="modal" data-target="#myModal">Rules</a>
				</li>
	    		<li>
					<a href="#">
						<?php echo "Hi! ".$username; ?>
					</a>
				</li>
				<li>
					<a href="#" >
						<?php 
							$amountsql = "select amount,male,team from user where SNO='$login_id'";
							$current_amount = mysqli_query($connection,$amountsql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
							$amount=mysqli_fetch_array($current_amount,MYSQLI_ASSOC);
							$amountleft=$amount['amount'];
						echo "<ol  style=\"padding:0px\">₹ ".$amount['amount']."</ol>"; 
						echo "<ol id='amount' style=\"display:none\">".$amount['amount']."</ol>";
						echo "<div id='male' style=\"display:none\" >".$amount['male']."</div>"; 
						echo "<div id='total' style=\"display:none\">".$amount['team']."</div>"; 

						?>
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
						<p>
							<!-- <?php //echo "<div id='amountshow' style=\"float:left\">₹ ".$amount['amount']."</div>"; ?>  -->
							Note- Click on the player to know more about the sport he/she plays.
						</p>
						<p class="sub-rule">Team once submitted cannot be edited again.</p>
					</div>
				</div>
				<div class="container amount"> 
					  <h3>Amount Left = ₹ <?php print $amount['amount'] ?></h3>
				</div>
	    		<div id="team" class="container-fluid">
	 	    		<?php
	    			
	    			$sql = "SELECT * from player order by ".$cat.$order;
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                    	if($array[$player['SNO']]=='1')
                    	echo "<div id='player".$player['SNO']."' class='player col-md-2 col-sm-3 col-xs-6'>
				    			<div class='card card-nav-tabs' data-toggle=\"tooltip\" data-placement=\"top\" title=\"".$player['category']."\">
									<div class='header header-info'>
										<div class='nav-tabs-wrapper'>
											<ul class='nav nav-tabs' data-tabs='tabs'>
												<li id='name'>".$player['NAME']."</li><br />
												<li  >₹ ".$player['price']."</li>
											</ul>
										</div>
									</div>
									<div class='content'>
										<div class='tab-content text-center'>
										<img class='img-responsive' src='".$player['IMAGE']."'>
										</div>
									</div>
									<div class='pull-right'>
										<button onclick='removeDoc(".$login_id.",".$player['SNO'].",".$player['price'].")' id='rbutton".$player['SNO']."' class='btn btn-primary btn-sm' >Remove Me</button>										
									</div>
								</div>
				    		</div>";
			        }                    
	    		?>
	        </div>
	    </div>
		
	</div>

	<div class="main main-raised" style="margin: 0;border-radius: 0;background-color: #813772;">
		<div class="section section-basic" >
			<div class="row">
				<div class="col-md-3 col-sm-4 col-md-offset-9 col-sm-offset-8 col-xs-offset-2 col-xs-8 dropdown">
					<a href="#" class="btn btn-success dropdown-toggle pd10" data-toggle="dropdown">
						Sort
						<b class="caret"></b>
					</a>
					<ul class="dropdown-menu">
						<li><a href="team.php?sort=1">Name ↑</a></li>
						<li><a href="team.php?sort=2">Name ↓</a></li>
						<li><a href="team.php?sort=3">Price ↑</a></li>
						<li><a href="team.php?sort=4">Price ↓</a></li>
						<li><a href="team.php?sort=5">Women</a></li>
						<li><a href="team.php?sort=6">Men</a></li>
					</ul>
					<button onclick='verify(<?php echo $login_id; ?>)' class="btn btn-success pd10" style="background: #ec1616;">Submit</button>
				</div>
			</div>
	    	<div id="player" class="container-fluid">
	    		<div class="row text-right" style="padding-right: 40px;">
	    			
	    		</div>
	    		
	    		<?php
	    			
	    			$sql = "SELECT * from player order by ".$cat.$order;
                    $result = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    while($player=mysqli_fetch_array($result,MYSQLI_ASSOC))
                    {
                    	if($array[$player['SNO']]=='0')
                    	echo "<div  id='player".$player['SNO']."' class='player col-md-2 col-sm-3 col-xs-6'>
				    			<div class='card card-nav-tabs' data-toggle=\"tooltip\" data-placement=\"top\" title=\"".$player['category']."\">
									<div class='header header-info'>
										<div class='nav-tabs-wrapper'>
											<ul class='nav nav-tabs' data-tabs='tabs'>
												<li>".$player['NAME']."</li><br/>
												<li  >₹ ".$player['price']."</li>
											</ul>
										</div>
									</div>
									<div class='content'>
										<div class='tab-content text-center'>
										<img class='img-responsive' src='".$player['IMAGE']."'>
										</div>
									</div>
									<div class='pull-right'>
										<button onclick='loadDoc(".$login_id.",".$player['SNO'].",".$player['price'].")' id='button".$player['SNO']."' class='btn btn-primary btn-sm'>Add Me</button>
									</div>
								</div>
				    		</div>";
			        }

                    
	    		?>
	    		
					<!-- Modal Core -->
				<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="myModalLabel">Rules For Creating Team</h4>
					</div>
					<div class="modal-body">
						<p>1.Budget of a team is 55 lacs</p>
						<p>2.Each team should have 25 players</p>
						<p>3.Maximum 20 boys and minimum 5 girls in a team</p>
						<p>4.Deadline for team formation: Friday, 26th January 2018 at 23:59 hrs</p>
						<p>5.Winner will be selected through an online voting process, on player-to-player basis by  the entire campus</p>
						<p>Further details will be out soon</p>
					</div>
					<div class="modal-footer">
						<button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
					</div>
					</div>
				</div>
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
								<i class="fa fa-linkedin-square"></i><span class="developed">Bittu<span>
							</a>
						</li>
					</ul>
				</nav>
        </div>
    </footer>
</div>
</body>
	<!--   Core JS Files   -->
	
	<script src="../assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="../assets/js/material.min.js"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="../assets/js/material-kit.js" type="text/javascript"></script>

</html>
