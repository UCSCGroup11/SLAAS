<!DOCTYPE html>
<html class="no-js"> 
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>Digital Library | SLAAS</title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/bootstrap-responsive.min.css">
    <link rel="stylesheet" href="css/font-awesome.min.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/sl-slide.css">

    <script src="js/vendor/modernizr-2.6.2-respond-1.1.0.min.js"></script>

    <!-- fav and touch icons -->
    <link rel="shortcut icon" href="images/ico/logo.png">
    
</head>

<body>

    <!--Header-->
    <?php include"includes/login_e.php";?>
    <?php include"includes/login_form.php";?>
    <?php include"includes/header.php"; ?>
    <section class="title">
        <div class="container">
          <div class="row-fluid">
            <div class="span6">
                <h1>Digital Library</h1>
            </div>
                <div class="span6">
                    <ul class="breadcrumb pull-right">
                    <li><a href="index.php">Home</a> <span class="divider">/</span></li>
                    <li><a href="#">Digital Library</a> <span class="divider">/</span></li>
                    <li class="active">Documents</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>
  <!-- / .title -->  

  <!-- Library Items-->
  <div class="hero-unit">
  <div class="tabbable tabs-left">
  <ul class="nav nav-tabs">
    <li class="active">
        <a href="#tab1" data-toggle="tab">Books</a></li>
    <li>
        <a href="#tab2" data-toggle="tab">Papers</a></li>
    <li>
        <a href="#tab3" data-toggle="tab">Upload</a></li>
    </ul>

  <div class="tab-content">
    <div class="tab-pane active" id="tab1">
      <section id="portfolio" class="container main">    
        <ul class="gallery col-4">
            <!--Item 1-->
            
                                    
    <?php
    $link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
    mysql_select_db("slaas") or die("Database not found");
        $search= mysql_query("SELECT * FROM library WHERE item_type='books' and approve='Yes' " );
        while($row = mysql_fetch_array($search)) {
            $bookname=$row["item_name"];
            $bookpath=$row["item_path"];
            $item_user=$row["item_user"];
            $item_description=$row["item_description"];
            echo"<li>";
            echo"<div class=\"preview\">
                    <img alt=\" \" src=\"images/library/books/ebook.png\">
                    <div class=\"overlay\">
                    </div>
                    <div class=\"links\">
                        <a data-toggle=\"modal\" target=\"_blank\" href=\"bookpath\"><i class=\"icon-book\"></i></a>
                </div>
                <div class=\"desc\">
                    <h5>$bookname</h5>
                    <small>Added by <a href\"#\">$item_user</a></small><br>
                    <small>Description: <a href\"#\">$item_description</a></small>
                </div>";
            echo"</li>";
            }
        
    ?>          
            
          </ul>
        </section>
    </div>

    <div class="tab-pane" id="tab2">
     <section id="portfolio" class="container main">    
        <ul class="gallery col-4">
            <!--Item 1-->
            
                                    
    <?php
        $searchp= mysql_query("SELECT * FROM library WHERE item_type='papers' " );
        while($row = mysql_fetch_array($searchp)) {
            $papername=$row["item_name"];
            $paperpath=$row["item_path"];
            $item_user=$row["item_user"];
            $item_description=$row["item_description"];
            echo"<li>";
            echo"<div class=\"preview\">
                    <img alt=\" \" src=\"images/library/books/ebook.png\">
                    <div class=\"overlay\">
                    </div>
                    <div class=\"links\">
                        <a data-toggle=\"modal\" target=\"_blank\" href=\"$paperpath\"><i class=\"icon-book\"></i></a>                               
                    </div>
                </div>
                <div class=\"desc\">
                    <h5>$papername</h5>
                    <small>Added by <a href\"#\">$item_user</a></small><br>
                    <small>Description: <a href\"#\">$item_description</a></small>
                </div>";
            echo"</li>";
            }
        
    ?>          
            
          </ul>
        </section>
    </div>
    
    <div class="tab-pane" id="tab3" >
    <form action="" method="POST" enctype="multipart/form-data">
        
        Select file type*:<br>
        <select name ="type"> 
            <option value="book" ><b>Digital Book</b></option>
            <option value="paper" ><b>Research Paper</b></option>
        </select><br>
        File name*:<br>
        <input type="text" name="filename" required="required"><br>
        Description:<br>
        <input type="text" name="desc" required="required"><br>
        <input class="btn btn-success btn-large pull-center" type="file" name="file">
        <input class="btn btn-success btn-large pull-center" type="submit" value="Upload" name="upload">        
    </form>
    </div> 
  </div>
<?php 
if(isset($_POST['upload'])){

    $link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
    mysql_select_db("slaas") or die("Database not found");

    $type=$_POST["type"];
    $item_name=$_POST["filename"];
    $i_description=$_POST["desc"];
    
    if($type=='book'){
        $allowedExts = array("pdf", "docx");
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileName = reset($temp);
        $extension = end($temp);
        $maxSize = 100000000; 
    
        if (($_FILES["file"]["size"] < $maxSize)
            && in_array($extension, $allowedExts)){
                
            if ($_FILES["file"]["error"] > 0){
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                }
                
            else {
                
                $newName = $fileName."_".mt_rand(1000,9999).".".$extension;
                move_uploaded_file($_FILES["file"]["tmp_name"], "files/library/books/".$newName);
                $newbook="files/library/books/". $newName;
                $item = "INSERT INTO library(item_type,item_name,item_description,item_path,item_user,approve) VALUES ('books','$item_name','$i_description','".$newbook."','$username','No')";
                $result=mysql_query($item,$link);       
                }
            } 
        else {
            echo "<font color=\"#FFF\" size=\"+1\" > Invalid upload..! </font>";
            }
        }
        
        if($type=='paper'){
        $allowedExts = array("pdf", "docx");
        $temp = explode(".", $_FILES["file"]["name"]);
        $fileName = reset($temp);
        $extension = end($temp);
        $maxSize = 100000000; 
    
        if (($_FILES["file"]["size"] < $maxSize)
            && in_array($extension, $allowedExts)){
                
            if ($_FILES["file"]["error"] > 0){
                echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
                }

            else {
                $newName = $fileName."_".mt_rand(1000,9999).".".$extension;
                move_uploaded_file($_FILES["file"]["tmp_name"], "files/library/papers/".$newName);
                $newpaper="files/library/papers/". $newName;
                $item = "INSERT INTO library(item_type,item_name,item_description,item_path,item_user) VALUES ('papers','$item_name','$i_description','".$newpaper."','$username')";
                $result=mysql_query($item,$link);       
                }
            } 
        else {
            echo "<font color=\"#FFF\" size=\"+1\" > Invalid upload..! </font>";
            }
            }
        }
?>

<script src="js/vendor/jquery-1.9.1.min.js"></script>
<script src="js/vendor/bootstrap.min.js"></script>
<script src="js/main.js"></script>

</body>
</html>
