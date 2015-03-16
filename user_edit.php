<!DOCTYPE html>
<?php
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
	$pic=$row["photo"];//newly added
	$pass=$row["password"];//newly added
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
 
<?php include"includes/header.php"; ?> 
  

<div class="col-md-4">
	<!-- User Name -->
	<h1>
		<?php echo $username ?>
	</h1>
    <hr>
			
    <!-- Preview Image -->
	<center><img width="75%" height="100%" class="img-responsive" src=<?php echo"$pic" ?> alt="Unable to load Photo"></center>
	<hr>
	<form name="imageupload" action="" method="post" enctype="multipart/form-data">
		<font color="#FFF" size="+1" > Upload a profile Picture</font><input type="file" name="file" ><br/>
		<button class="btn btn-success btn-large btn-block" name="save" > Upload</button>
	</form>
               
	<!-- photo upload -->
	<?php
		if(isset($_POST["save"])){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
    
		$temp = explode(".", $_FILES["file"]["name"]);
		$fileName = reset($temp);
		$extension = end($temp);
		$maxSize = 100000000; 
    
		if ((($_FILES["file"]["type"] == "image/gif")
			  || ($_FILES["file"]["type"] == "image/jpeg")
			  || ($_FILES["file"]["type"] == "image/jpg")
			  || ($_FILES["file"]["type"] == "image/pjpeg")
			  || ($_FILES["file"]["type"] == "image/x-png")
			  || ($_FILES["file"]["type"] == "image/png"))
			  && ($_FILES["file"]["size"] < $maxSize)
			  && in_array($extension, $allowedExts)){
					if ($_FILES["file"]["error"] > 0)
						{
							echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
						} 
					else {
							$newName = $fileName."_".mt_rand(1000,9999).".".$extension;
							move_uploaded_file($_FILES["file"]["tmp_name"], "photos/".$newName);
							$newpic="photos/" . $newName;
							$chng = "UPDATE user SET photo = '".$newpic."' WHERE user_name = '$username'" ;
							$result=mysql_query($chng);		
							header("Refresh:0");
						}
				}
		else {
				echo "<font color=\"#FFF\" size=\"+1\" > Invalid upload..! </font>";
			}
		}
?>	
	<!-- end photo upload-->
</div>                           
	 
<div class="col-md-8">  
	<!-- Navigation Bar-->
    <div class="well">
        <div class="col-md-2">
			<h5>
				<a href="index.php"><b>Home</b></a>
			</h5>
		</div>
                
		<div class="col-md-2">
			<h5>
				<a href="user.php"><b>Back to Profile</b></a>
             </h5>
		</div>
                
		<div class="col-md-3">
			<h5>
				<a href="#"><b>Publish a Post</b></a>
			</h5>
		</div>
                
		<div class="col-md-2">
			<h5>
				<a href="#"><b>Settings</b></a>
			</h5>
		</div>
                   
		<div class="col-md-2">
			<h5>
                <a href="logot.php"><b>Log Out</b></a>
			</h5>
		</div>
	</div>  
	<!-- End Navigation Bar-->
	
	<div class="well">
		<h3>Personal Details</h3>
		<div class="row">
			<div class="col-lg-8">
				<!-- First Name Edit-->
				<form action="" method="post"><font size="+1"> &nbsp&nbsp First Name : <?php echo $fname ?> &nbsp&nbsp </font>
				<button class="btn btn-success btn-small pull-center" name="fedit" > Edit </button></form>
				<?php 	if(isset($_POST["fedit"])){
							echo"<form action=\"\" method=\"post\">
								&nbsp&nbsp<input type=\"text\" name=\"finame\"><br>
								&nbsp&nbsp<button class=\"btn btn-success btn-small pull-center\" name=\"fsave\" > Done </button>
								<button class=\"btn btn-success btn-small pull-center\" name=\"fcancel\" > Cancel </button></form>";
								}
						 
						if(isset($_POST["fsave"])){
							$finame=$_POST["finame"];	
							$fsql="UPDATE user SET first_name='$finame' WHERE user_name='$username'";
							$fresult=mysql_query($fsql);	
							header("Refresh:0");
							}
				?>
				<br>
				
				<!--Last Name Edit-->
				<form action="" method="post"><font size="+1"><font size="+1"> &nbsp&nbsp Last Name : <?php echo $lname ?> &nbsp&nbsp</font>	 
				<button class="btn btn-success btn-small pull-center" name="ledit" > Edit </button></form> <br>
				<?php 	if(isset($_POST["ledit"])){
							echo"<form action=\"\" method=\"post\">
								&nbsp&nbsp<input type=\"text\" size=\"40\" name=\"laname\"><br>
								&nbsp&nbsp<button class=\"btn btn-success btn-small pull-center\" name=\"lsave\" > Done </button>
								<button class=\"btn btn-success btn-small pull-center\" name=\"lcancel\" > Cancel </button></form>";
								}
						 
						if(isset($_POST["lsave"])){
							$laname=$_POST["laname"];	
							$lsql="UPDATE user SET last_name='$laname' WHERE user_name='$username'";
							$lresult=mysql_query($lsql);	
							header("Refresh:0");
							}
				?>
				<br>
				<br>
				<!--E-mail Edit-->
				<form action="" method="post"><font size="+1"> &nbsp&nbsp E-mail : <?php echo $email ?> &nbsp&nbsp </font>
				<button class="btn btn-success btn-small pull-center" name="eedit" > Edit </button></form>
				<?php  	if(isset($_POST["eedit"])){
							echo"<form action=\"\" method=\"post\">
								&nbsp&nbsp<input type=\"email\" name=\"e_mail\"><br>
								&nbsp&nbsp<button class=\"btn btn-success btn-small pull-center\" name=\"esave\" > Done </button>
								<button class=\"btn btn-success btn-small pull-center\" name=\"ecancel\" > Cancel </button></form>";
								}
						
						if(isset($_POST["esave"])){
							$e_mail=$_POST["e_mail"];	
							$esql="UPDATE user SET email='$e_mail' WHERE user_name='$username'";
							$eresult=mysql_query($esql);	
							header("Refresh:0");
							}
				?>
				<br>
				
				<!--Tel-No  Edit-->	
				<form action="" method="post"><font size="+1"> &nbsp&nbsp Tel-No : <?php echo $telnum ?> &nbsp&nbsp </font>
				<button class="btn btn-success btn-small pull-center" name="tedit" > Edit </button></form>
				<?php 	if(isset($_POST["tedit"])){
							echo"<form action=\"\" method=\"post\">
								&nbsp&nbsp<input type=\"text\" name=\"tnum\"><br>
								&nbsp&nbsp<button class=\"btn btn-success btn-small pull-center\" name=\"tsave\" > Done </button>
								<button class=\"btn btn-success btn-small pull-center\" name=\"tcancel\" > Cancel </button></form>";
								}
						 
						if(isset($_POST["tsave"])){
							$tnum=$_POST["tnum"];	
							$tsql="UPDATE user SET tel_num='$tnum' WHERE user_name='$username'";
							$tresult=mysql_query($tsql);	
							header("Refresh:0");
							}
				?>
				<br>
				
				<!--Address Edit-->
				<form action="" method="post"><font size="+1"> &nbsp&nbsp Address : <?php echo $address ?> &nbsp&nbsp </font>
				<button class="btn btn-success btn-small pull-center" name="aedit" > Edit </button></form>
				<?php 	if(isset($_POST["aedit"])){
							echo"<form action=\"\" method=\"post\">
								&nbsp&nbsp<input type=\"text\" name=\"addre\"><br>
								&nbsp&nbsp<button class=\"btn btn-success btn-small pull-center\" name=\"asave\" > Done </button>
								<button class=\"btn btn-success btn-small pull-center\" name=\"acancel\" > Cancel </button></form>";
								}
						 
						if(isset($_POST["asave"])){
							$addre=$_POST["addre"];	
							$asql="UPDATE user SET address='$addre' WHERE user_name='$username'";
							$aresult=mysql_query($asql);	
							header("Refresh:0");
							}
				?>
				<br>
					
				<!--Password Edit-->	
				<form action="" method="post"><font size="+1"> &nbsp&nbsp Password &nbsp&nbsp </font> 
				<button class="btn btn-success btn-small pull-center" name="pedit" > Edit </button></form>
				<?php if(isset($_POST["pedit"])){
							echo"<form action=\"\" method=\"post\">
								Enter your current password&nbsp&nbsp<input type=\"password\" name=\"cpass\"><br>
								Enter your new password&nbsp&nbsp<input type=\"password\" name=\"npass\"><br>
								&nbsp&nbsp<button class=\"btn btn-success btn-small pull-center\" name=\"pasave\" > Done </button>
								<button class=\"btn btn-success btn-small pull-center\" name=\"pacancel\" > Cancel </button></form>";
								}
						if(isset($_POST["pasave"])){
							$passw=$_POST["cpass"];
							$npass=$_POST["npass"];
							if($pass==$passw){
								$pasql="UPDATE user SET password='$npass' WHERE user_name='$username'";
								$paresult=mysql_query($pasql);
								}
								
							else if($pass!=$passw){
								echo"<font color=\"FF0000\" size=\"+1\" >Your current password does not match with the entered one</font>";
								}
							}
				?>
					   
			</div>
                
        </div>
                    <!-- /.row -->
	</div>
                
</div> 
        
	<?php include"includes/footer.php"; ?> <!-- /.container -->
	<script src="file:///C|/wamp/www/SLAAS/blog-post/js/jquery-1.11.0.js"></script>
	<!-- Bootstrap Core JavaScript -->
    <script src="file:///C|/wamp/www/SLAAS/blog-post/js/bootstrap.min.js"></script>

</body>

</html>
