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


if(isset($_POST['submit']))
{
    if(empty($_POST['name'])||empty($_POST['sex'])||empty($_POST['price'])||count($_FILES) <= 0) {
        $error = "unfilled fields"; 
        }
        else
        {    
            $name=$_POST['name'];
            $sex=$_POST['sex'];
            $price=$_POST['price'];
                
            $name = stripslashes($name);
            $sex = stripslashes($sex);
            $price = stripslashes($price);

            $name = mysqli_real_escape_string($connection,$name);
            $sex = mysqli_real_escape_string($connection,$sex);
            $price = mysqli_real_escape_string($connection,$price);  
           

            $target_dir = "../assets/img/player/";
            $target_file = $target_dir . basename($_FILES['image']['name']);
            $uploadOk = 1;
            $imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);
            // Check if image file is a actual image or fake image
            $check = getimagesize($_FILES["image"]["tmp_name"]);
            if($check !== false) {
                $uploadOk = 1;
            } else {
                $error= "File is not an image.";
                $uploadOk = 0;
            }
            // Check if file already exists
            if (file_exists($target_file)) {
                $error= "Sorry, file already exists.";
                $uploadOk = 0;
            }
            // Check file size
            if ($_FILES["image"]["size"] > 500000000) {
                $error= "Sorry, your file is too large.";
                $uploadOk = 0;
            }
            // Allow certain file formats
            if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" && $imageFileType != "gif" ) {
                $error= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                $uploadOk = 0;
            }
            // Check if $uploadOk is set to 0 by an error
            if ($uploadOk == 0) {
                $error= "Sorry, your file was not uploaded.";
            // if everything is ok, try to upload file
            } else {  
                if (move_uploaded_file($_FILES["image"]["tmp_name"], $target_file)) {
                    $sql = "INSERT INTO player(name, image, sex, price) VALUES('$name', '{$target_file}', '$sex','{$price}')";

                    $current_id = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    $display='Player added succesfully';
                } else {
                    $error= "Sorry, there was an error uploading your file.";
                }
            }

        }
    }     

    

?>
    
<!doctype html>
<html lang="en">
<head>
	<meta charset="utf-8" />
	<link rel="icon" type="image/png" href="../assets/img/chakravyuh.png">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />

	<title>Add Player | Chakravyuh</title>

	<meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' name='viewport' />
    <meta name="viewport" content="width=device-width" />


    <!-- Bootstrap core CSS     -->
    <link href="../assets/css/bootstrap.min.css" rel="stylesheet" />

    <!--  Light Bootstrap Table core CSS    -->
    <link href="../assets/css/light-bootstrap-dashboard.css" rel="stylesheet"/>

    <!--     Fonts and icons     -->
    <link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet">
    <link href='http://fonts.googleapis.com/css?family=Roboto:400,700,300' rel='stylesheet' type='text/css'>

    <script src="../assets/js/main.js" type="text/javascript"></script>
	<style>
    .navbar, .navbar.navbar-default {
        background-color: #9c27b0;
        color: #ffffff;
    }
    .navbar-default .navbar-toggle .icon-bar{
        background-color:#fff;
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
                <li>
                    <a href="dashboard.php">
                        <i class="fa fa-dashboard"></i>
                        <p>Dashboard</p>
                    </a>
                </li>
                <li class="active">
                    <a href="addPlayer.php">
                        <i class="fa fa-plus" aria-hidden="true"></i>
                        <p>Add Playes</p>
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
                    <a class="navbar-brand" href="#" style="color:#fff">Add Player</a>
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
	                <div class="loginModal col-md-6 col-md-offset-3">
	                	<div class="card">
	                		<div class="header">
	                			<h4 class="title">Enter Player Details</h4>
	                        </div>
	                        <div class="content">
	                        	
	                        	<form enctype="multipart/form-data" method="post" action="#" class="form-horizontal" name="submit" id="register">
									<div class="form-group" style="text-align: center">
	                                    <div class="input-group col-xs-10 col-xs-offset-1">
	                                        <span class="input-group-addon"  style="    background-color: #fff;"><i class="fa fa-user fa-sm" aria-hidden="true" style=""></i></span>
	                                        <input  name="name" type="text" class="form-control required"  placeholder="Player Name" autocomplete="off" value="">
	                                    </div>
	                                </div>
	                                <div class="form-group" style="text-align: center">
	                                    <div class="input-group col-xs-10 col-xs-offset-1">
                                            <span class="input-group-addon"  style="font-size: 19px;background-color: #fff;"><i class="fa fa-male fa-sm" aria-hidden="true" style=""></i></span>
                                            <select name="sex" class="form-control">
                                                <option value="M">Male</option>
                                                <option value="F">Female</option>
                                            </select>
	                                    </div>
	                                </div>
	                                <div class="form-group" style="text-align: center">
	                                    <div class="input-group col-xs-10 col-xs-offset-1">
	                                        <span class="input-group-addon"  style="font-size: 19px;background-color: #fff;"><i class="fa fa-money fa-sm" aria-hidden="true" style=""></i></span>
	                                        <input class="form-control required"  name="price" type="number" value = "" placeholder="Price" />
	                                    </div>
	                                </div>
	                                <div class="form-group" style="text-align: center">
	                                    <div class="input-group col-xs-10 col-xs-offset-1">
	                                        <span class="input-group-addon"  style="background-color: #fff;"><i class="fa fa-image fa-sm" aria-hidden="true" style=""></i></span>
	                                            <input  type="file" class="form-control required" name="image" autocomplete="off" id="image" placeholder="player image goes here">
	                                    </div>
	                                </div>

	                                <input name="submit" value="1" type="hidden"/>
	                                <div class="form-group" style="text-align: center">
	                                	<div class="form-group col-xs-12">
	                                    	<button type="submit" class="btn btn-info btn-fill">Add Player</button>
	                               		</div>
	                                </div>	
	                                
	                                <div class="form-group col-xs-10 col-xs-offset-1" style="margin-left: 30px;color:red;margin-top: -25px;text-align: center;">
	                                    <span><?php echo $display.$error;?></span>
	                                </div>
	                            </form>
	                        </div>
	                	</div>
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

