<!DOCTYPE html>
<html class="no-js">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Image Gallery | SLAAS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- Le fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/logo.png">
    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="images/ico/apple-touch-icon-144-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="images/ico/apple-touch-icon-114-precomposed.png">
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="images/ico/apple-touch-icon-72-precomposed.png">
    <link rel="apple-touch-icon-precomposed" href="images/ico/apple-touch-icon-57-precomposed.png">
	

	
</head>

<body>
<?php include "includes/login_e.php";?>
<?php include"includes/header.php"; ?>
    
    

    <section class="title">
        <div class="container">
            <div class="row-fluid">
                <div class="span6">
                    <h1>Image Gallery</h1>
                </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                        <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                        <li><a href="#">Digital Library</a> <span class="divider">/</span></li>
                        <li class="active">Image Gallery</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
    <!-- / .title -->
    
    <?php 
    
    $link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
	mysql_select_db("slaas") or die("Database not found");  
        
        $search= mysql_query("SELECT * FROM digital ORDER BY imgID DESC" );
        
        //$username=$_SESSION["username"];
        
        echo " <section id=\"portfolio\" class=\"container main\">    
	
        <ul class=\"gallery col-4\">";
        
		while($row = mysql_fetch_array($search)) {
			$imgName=$row["name"];
			$imgPath=$row["path"];
			$Name=$row["userid"];
                        
                        echo "<li>";
                        echo " 
                        <div class=\"preview\">
                        <img alt=\" \" src=\"$imgPath\" >
                        <h5> $imgName </h5>
                        <small> $Name </small>
                        </div>";
                        echo "</li>";
        
        
                }  
          echo "</ul\">";
          echo "</section\">";
        ?>
    

		</ul>

		    </section>  
        <div class="container">
            <div class="row-fluid">			
            <div class="row-fluid">			
	
		<form name="imageupload" action="" method="post" enctype="multipart/form-data">
                <font color="#112222" size="+1" > Upload Image </font><input type="file" name="file" ><br/>
                File name*:<br>
                <input type="text" name="filename" required="required"><br>
                <input class="btn btn-success btn-large pull-center" type="submit" value="Upload" name="upload"> 
              	</form>	
		
		
	<!-- images upload -->
	<?php
		if(isset($_POST["upload"])){
		$allowedExts = array("gif", "jpeg", "jpg", "png");
    
		$temp = explode(".", $_FILES["file"]["name"]);
                $newImgName = $_POST["filename"];
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
							move_uploaded_file($_FILES["file"]["tmp_name"], "digital/images".$newName);
							$newpic="digital/images" . $newName;
							
						//	$chng = "UPDATE user SET photo = '".$newpic."' WHERE user_name = '$username'" ;
							
							$chng = "INSERT INTO digital (name,userid,path) VALUES('$newImgName','$username','$newpic')";
							$result=mysql_query($chng);			
							echo "<font color=\"#000000\" size=\"+1\" > Successfully uploaded..! </font>";
							header("Refresh:1");
														
						}
				}
		else {
				echo "<font color=\"#ff0000\" size=\"+1\" > Invalid upload..! </font>";
			}
		}
?>	
	<!-- end images upload-->
        


<?php include"includes/footer.php"?>    	



<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
