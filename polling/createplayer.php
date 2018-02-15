<?php
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

    if(empty($_POST['name'])||empty($_POST['age'])||empty($_POST['price'])||empty($_POST['category'])||count($_FILES) <= 0) {
        $error = "unfilled fields"; 
        }
        else
        {    
            $name=$_POST['name'];
            $age=$_POST['age'];
            $category=$_POST['category'];
            $price=$_POST['price'];
            //$password=$_POST['password'];
                
            $name = stripslashes($name);
            $age = stripslashes($age);
            $category = stripslashes($category);
            $price = stripslashes($price);
            //$password = stripslashes($password);

            $name = mysqli_real_escape_string($connection,$name);
            $age = mysqli_real_escape_string($connection,$age);
            $category = mysqli_real_escape_string($connection,$category);
            $price = mysqli_real_escape_string($connection,$price);  
            //$password = mysqli_real_escape_string($connection,$password);


            $target_dir = "uploads/";
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
                    $sql = "INSERT INTO player(name,category,age ,image,price) VALUES('$name','$category','$age', '{$target_file}','{$price}')";
                    $current_id = mysqli_query($connection,$sql) or die("<b>Error:</b> Problem on Image Insert<br/>" . mysqli_error($connection));
                    $display='Player added succesfully';
                } else {
                    $error= "Sorry, there was an error uploading your file.";
                }
            }

        }
    }     

    

?>
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" >
        <link rel="stylesheet" type="text/css"  href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.css" />
        <link rel="stylesheet" type="text/css" href="../assets/css/custom.css">
        <!-- jQuery 2.0.2 -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.8.0/jquery.min.js"></script>
        <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8.23/jquery-ui.min.js" type="text/javascript" charset="utf-8"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-sweetalert/1.0.1/sweetalert.min.js"></script>
        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
        <script src="https://cdn.jsdelivr.net/particles.js/2.0.0/particles.min.js"></script>
    </head>

    <body>

        <div class="page-signin">
            <div class="">
                <div class="loginModal container col-md-4 col-md-offset-4 col-sm-6 col-sm-offset-3 col-xs-12">
                  <section>
                            
                            <form enctype="multipart/form-data" method="post" action="#" class="form-horizontal" name="submit" id="register">

                                <p class="text-small col-sm-offset-1">
                                     Admin Panel! Add a player here
                                </p>

                                <div class="form-group" style="text-align: center">
                                    <div class="input-group col-xs-10 col-xs-offset-1">
                                        <span class="input-group-addon"  style="    background-color: #fff;"><i class="fa fa-user fa-sm" aria-hidden="true" style=""></i></span>
                                        <input  name="name" type="text" class="form-control required"  placeholder="Player Name" autocomplete="off" value="">
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <div class="input-group col-xs-10 col-xs-offset-1">
                                        <span class="input-group-addon"  style="font-size: 19px;background-color: #fff;"><i class="fa fa-mobile fa-sm" aria-hidden="true" style=""></i></span>
                                        <input class="form-control required"  name="age" type="number" value = "" placeholder="Age" />
                                    </div>
                                </div>
                                <div class="form-group" style="text-align: center">
                                    <div class="input-group col-xs-10 col-xs-offset-1 ">
                                        <span class="input-group-addon" style="    background-color: #fff;"> <i class="fa fa-envelope-o fa-sm" aria-hidden="true" style=" "></i></span>
                                        <input class="form-control required" placeholder="Category" name="category" type="text" autocomplete="off" value="" >
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
                                        <span class="input-group-addon"  style="    background-color: #fff;"><i class="fa fa-image fa-sm" aria-hidden="true" style=""></i></span>
                                        <div class="input-group col-xs-12">
                                            <input  type="file" class="form-control required" name="image" autocomplete="off" id="image" placeholder="player image goes here">
                                        </div>
                                    </div>
                                </div>

                                <input name="submit" value="1" type="hidden"/>

                                <div class="form-group col-xs-10 col-xs-offset-1" style="margin-left: 30px;">
                                    <button type="submit" class="btn btn-primary btn-lg btn-block">Sign up</button>
                                </div>
                                <div class="form-group col-xs-10 col-xs-offset-1" style="margin-left: 30px;">
                                    <span><?php echo $display.$error;?></span>
                                </div>
                            </form>
                        </section> 
                </div>
            </div>

        <div id="particles-js"></div>
        </div>

 <!--particle.js custom  start-->
<script>
$(document).ready(function() {

particlesJS("particles-js", {"particles":{"number":{"value":80,"density":{"enable":true,"value_area":800}},"color":{"value":"#ffffff"},"shape":{"type":"circle","stroke":{"width":0,"color":"#000000"},"polygon":{"nb_sides":5},"image":{"src":"img/github.svg","width":100,"height":100}},"opacity":{"value":0.5,"random":false,"anim":{"enable":false,"speed":1,"opacity_min":0.1,"sync":false}},"size":{"value":3,"random":true,"anim":{"enable":false,"speed":40,"size_min":0.1,"sync":false}},"line_linked":{"enable":true,"distance":150,"color":"#ffffff","opacity":0.4,"width":1},"move":{"enable":true,"speed":6,"direction":"none","random":false,"straight":false,"out_mode":"out","bounce":false,"attract":{"enable":false,"rotateX":600,"rotateY":1200}}},"interactivity":{"detect_on":"canvas","events":{"onhover":{"enable":true,"mode":"bubble"},"onclick":{"enable":true,"mode":"repulse"},"resize":true},"modes":{"grab":{"distance":400,"line_linked":{"opacity":1}},"bubble":{"distance":250,"size":16,"duration":2,"opacity":0.2,"speed":3},"repulse":{"distance":200,"duration":0.4},"push":{"particles_nb":4},"remove":{"particles_nb":2}}},"retina_detect":true});
});
</script>
<!--particle.js custom  end-->

        <!-- jQuery library -->
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>

        <!-- Latest compiled JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        
        <!-- mainJQ -->
        <script src="../assets/js/main.js" type="text/javascript" charset="utf-8"></script>

    </body>
</html>
