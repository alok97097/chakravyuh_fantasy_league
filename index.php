<?php
error_reporting(0);
include('session.php');
//header('Location: polling/vote.php');
?>
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="assets/img/chakravyuh.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Chakravyuh Fantasy League 2018</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />

	<!--     Fonts and icons     -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />

	<script src="assets/js/jquery.min.js" type="text/javascript"></script>
	<!-- CSS Files -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet" />
    <link href="assets/css/material-kit.css" rel="stylesheet"/>
    <link rel="stylesheet" type="text/css" href="assets/css/custom.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link href="assets/css/demo.css" rel="stylesheet" />
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
	.video-containt h5{font-weight:bold;color:#333}
	.video-footer{padding:5px 0 0 20px;position: relative;}
	.video-footer .fa-quote-left{position: absolute;left: -2px;color: #5d5f5f;font-size: 1.5em;top:0}
	.top-features-head{text-align: center;margin-bottom: 30px;}
	.top-features-head h2{font-weight: 400;color: #387396;font-size: 3em;}
	.top-features{font-size: 1.5em;position: relative;padding-left: 25px;padding-top: 20px;margin-bottom: 35px;}
	.top-features span{font-weight: 400; position: absolute;left: -10px;font-size: 2em;top: 27px;color: brown}
	.banner-title{text-align: center;}
	.banner-title h2{font-weight: 400;font-size: 4em;text-transform: uppercase;color: #fff}
	#rule{cursor: pointer;}
	.developed{
        font-size: 15px;
        color: #333;
        font-weight: 500;
        padding-left: 3px;
    }	
	@media only screen and (max-width: 767px) {
		iframe{
			width: 330px;
		}
		.banner-title h2{
			font-size: 3em;
		}
		.left-pull{
			float:left !important;
		}	
	}	
</style>
</head>

<body class="index-page">
<!-- Navbar -->
<nav class="navbar navbar-fixed-top navbar-primary">
	<div class="container">
        <div class="navbar-header">
	    	<a href="#">
	        	<div class="logo-container">
	                <div class="logo">
	                    <img src="assets/img/chakravyuh.png" alt="Logo">
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
			<!--	<li>
					<a id="rule" data-toggle="modal" data-target="#myModal">Rules</a>
				</li>-->
				<li>
					<a href="polling/vote.php">
						Voting
					</a>
				</li>
				<li>
					<a href="user/login.php">
						Login
					</a>
				</li>

	    	</ul>
	    </div>
	</div>
</nav>
<!-- End Navbar -->

<div class="wrapper">
	<div class="header header-filter" style="background-image: url('assets/img/home.jpeg');height:100vh;">
		<div class="container">
			<div class="row">
				<div class="col-md-4 col-md-offset-4 col-sm-offset-4 col-sm-4 col-xs-8 col-xs-offset-2 banner-logo">
					<div class="brand">
						<img src="assets/img/cfl.png" alt="CFL Logo" class="img-responsive">
					</div>
				</div>
				<div class="col-md-12 col-sm-12 col-xs-12 banner-title">
					<div class="">
						<h2>Chakravyuh Fantasy League</h2>
					</div>
				</div>
			</div>

		</div>
	</div>

	<div class="main main-raised" style="margin: 0;border-radius: 0;">
		<div class="section section-basic">
	    	<div class="container">
	            <div class="row" style="padding-top:3%">
					<div class="col-sm-5 col-sm-offset-1 col-xs-12">
	 					<div class="video-containt"	style="float:right;">
							<h5>CHAKRAVYUH'18</h5>	
							<div class="iframe-video" >
								<iframe width="420" height="236" src="https://www.youtube.com/embed/_0woHeVgO9I?controls=1">
								</iframe>
							</div>
							<p class="video-footer"><i class="fa fa-quote-left" aria-hidden="true"></i>Challenge.Survive.Conquer.</p>
						</div>
					</div>
					<div class="col-sm-5 col-xs-12">
						<div class="video-containt">		
							<h5>Draft Your Fantasy!</h5>
							<div class="iframe-video">
							<iframe width="420" height="236" src="https://www.youtube.com/embed/6Vq5F1XihQI?controls=1">
								</iframe>
							</div>
							<p class="video-footer"><i class="fa fa-quote-left second" aria-hidden="true"></i>Get ready with your dream team!!</p>
						</div>
					</div>
				</div>
				<div class="row" style="padding-top:3%">
					<div class="col-sm-10 col-sm-offset-1 col-xs-12">
						<div class="top-features-head">
							<h2>Steps To Top The Leaderboard</h2>
						</div>
						<div>
							<div class="col-sm-3 col-xs-12">
									<img src="assets/img/login.png" alt="Circle Image" class="img-circle img-responsive">
								<p class="top-features"><span>1</span> Login with your credentials</p>
							</div>
							<div class="col-sm-3 col-xs-12">
									<img src="assets/img/team.png" alt="Circle Image" class="img-circle img-responsive">
								<p class="top-features"><span>2</span> Create your Chakravyuh Fantasy League team</p>
							</div>
							<div class="col-sm-3 col-xs-12">
									<img src="assets/img/success.png" alt="Circle Image" class="img-circle img-responsive">
								<p class="top-features"><span>3</span> Contest to win
									Score points by voting for your players</p>
							</div>
							<div class="col-sm-3 col-xs-12">
									<img src="assets/img/reload.png" alt="Circle Image" class="img-circle img-responsive">
								<p class="top-features"><span>4</span> #Check_Repeat_Succeed</p>
							</div>
						</div>
					</div>
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
	<script src="assets/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="assets/js/material.min.js"></script>

	<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
	<script src="assets/js/nouislider.min.js" type="text/javascript"></script>

	<!-- Control Center for Material Kit: activating the ripples, parallax effects, scripts from the example pages etc -->
	<script src="assets/js/material-kit.js" type="text/javascript"></script>

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
