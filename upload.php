<?php
	session_start();
			$username=$_SESSION["username"];
			
			echo '<link rel="stylesheet" href="styles/style.css" type="text/css">';
			
			$link=mysql_connect("localhost","root","") or die("Sorry. Did not connect");
			mysql_select_db("slaas") or die("Database not found");
				
			
					
			
    
    $allowedExts = array("gif", "jpeg", "jpg", "png");
    
    $temp        = explode(".", $_FILES["file"]["name"]);
    
    $fileName    = reset($temp);
    
    $extension   = end($temp);
    
    $maxSize     = 100000000; 
    
    if ((($_FILES["file"]["type"] == "image/gif")
        || ($_FILES["file"]["type"] == "image/jpeg")
        || ($_FILES["file"]["type"] == "image/jpg")
        || ($_FILES["file"]["type"] == "image/pjpeg")
        || ($_FILES["file"]["type"] == "image/x-png")
        || ($_FILES["file"]["type"] == "image/png"))
        && ($_FILES["file"]["size"] < $maxSize)
        && in_array($extension, $allowedExts))
    {
        if ($_FILES["file"]["error"] > 0)
        {
            echo "Return Code: " . $_FILES["file"]["error"] . "<br>";
        } else {
            
            
            $newName = $fileName."_".mt_rand(1000,9999).".".$extension;
            
           
            
            
            move_uploaded_file($_FILES["file"]["tmp_name"], "photos/".$newName);
            
			$newpic="photos/" . $newName;
			
			$chng = "UPDATE user SET photo = '".$newpic."' WHERE user_name = '$username'" ;
					
		
        }
    } else {
			echo '<div class="table_error">';
					echo '<ul> <li> Invalid file..! </li> </ul> 
						<a style="text-decoration: none;" href="profil.php" target="iframe-b">
						<input type="button" value= "Try Again"> </a>';
				echo '</div>';
			
    }
?>