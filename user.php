<!DOCTYPE html>
<?php
	// session start
	session_start();
	if(!isset($_SESSION["username"])){
	include"index.php";
	exit();
	}
	$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");

	$username=$_SESSION["username"];	

	$veiw="SELECT * FROM user WHERE user_name='$username'";
	$query=mysql_query($veiw);
	$row=mysql_fetch_array($query);
	$fname=$row["first_name"];
	$lname=$row["last_name"];
	$email=$row["email"];
	$telnum=$row["tel_num"];
	$address=$row["address"];
	$pic=$row["photo"];

?>
<html lang="en">


<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    

    <!-- Bootstrap Core CSS -->
    <link href="cxx/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="cxx/blog-post.css" rel="stylesheet">
        <link rel="shortcut icon" href="images/ico/logo.png" alt="Sri Lanka Association for Advancement of Science">
     <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">
	<title> <?php echo $fname ." ".$lname; ?></title>
  

</head> 

<body>
 
<!-- include header-->

<?php include"includes/header.php"; ?> 

	<div class="col-md-4">

        <!-- User Name -->
        <h1><?php echo $username ?></h1>          
		<hr>

		<!-- Preview Image -->
        <center><img width="75%" height="100%" class="img-responsive" src=<?php echo"$pic" ?> alt="<sUnable to load the photo"></center>
		<hr>
                
		<!-- Personal Details -->
        <div class="well">
            <h3>Personal Details</h3>
            <div class="row">
                <div class="col-lg-6">
                    <ul class="list-unstyled">
                        <li><font size="+1"><?php echo "First Name : ".$fname ?></font></li><br>
                        <li><font size="+1"><?php echo "Last Name : ".$lname ?></font></li><br>
                        <li><font size="+1"> <?php echo "E-mail : ".$email ?></font></li><br>
                        <li><font size="+1"><?php echo"Tel No : ".$telnum ?></font></li><br>
                        <li><font size="+1"><?php echo"Address :<br> ".$address?></font></li><br>
                    </ul>
                </div>
            </div>
        </div>
    </div>
				
				
    <div class="col-md-8">  
		<!-- Navigation Bar-->
        <div class="well">
			<div class="col-md-2">
				<h5><a href="index.php"><b>Home</b></a></h5>
            </div>
			
			<div class="col-md-2">
				<h5><a href="user_edit.php"><b>Update Profile</b></a></h5>
            </div>
			
            <div class="col-md-3">
				<h5><a href="forum.php"><b>Publish a Post</b></a></h5>
            </div>
			
            <div class="col-md-2">
				<h5><a href="#"><b>Settings</b></a></h5>
            </div>
			
            <div class="col-md-2">
				<h5><a href="logot.php"><b>Log Out</b></a></h5>
			</div>
        </div>          
		<!-- End Navigation Bar-->
		<!-- content-->
		<div class="well">         
			<h2>
				<a href="#">Skills and Experience</a>
			</h2>
			<p>			</p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>

		<div class="well">         
			<h2>
				<a href="#">Projects</a>
			</h2>
            <p>        </p>        
			<a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>

		<div class="well">         
			<h2>
                    <a href="#">Files</a>
			</h2>
			<p>       </p>
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>

		<div class="well">         
			<h2>
                <a href="#">SLAAS News</a>
            </h2>
			<p>      </p>	
            <a class="btn btn-primary" href="#">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
		</div>
	</div>
	<!-- include footer-->
	<?php include"includes/footer.php"; ?> 
	
	<?php 	if(isset($_POST["savechange"])){
		$finame=$_POST["f_name"];
		$laname=$_POST["l_name"];
		$e_mail=$_POST["e_mail"];
		$pno=$_POST["telno"];
		$add=$_POST["addr"];
	
		echo $finame;
		echo $laname;
		$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
		mysql_select_db("slaas") or die("Database not found");
	
		$sql="UPDATE user SET first_name='$finame',last_name='$laname',email='$e_mail',tel_num='$pno',address='$add'
			 WHERE user_name='$username'";
		$result=mysql_query($sql);
 
		if($result){
			echo "Successful";
			}

		else {
			echo "ERROR";
			}
		mysql_close($link);
		}	
	?>
	<!-- /.container -->

    <!-- jQuery Version 1.11.0 -->
    <script src="file:///C|/wamp/www/SLAAS/blog-post/js/jquery-1.11.0.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="file:///C|/wamp/www/SLAAS/blog-post/js/bootstrap.min.js"></script>

</body>

</html>
